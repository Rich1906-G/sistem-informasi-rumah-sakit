<?php

namespace App\Http\Controllers;

use App\Models\TenagaMedis;
use App\Models\Kunjungan;
use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\DataPenjamin;
use App\Models\DetailPenjaminanKunjungan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    public function getDataTenagaMedis()
    {
        $tenagaMedis = TenagaMedis::with(['poli', 'jadwalPraktik'])->get();

        $data = $tenagaMedis->map(function ($tm) {
            $specialty = $tm->poli->where('parent_id', null)->first();
            $subspecialty = $tm->poli->where('parent_id', '!=', null)->first();

            $schedules = $tm->jadwalPraktik
                ->groupBy('tanggal_praktik')
                ->map(function ($jadwals) {
                    $times = [];
                    $fullTimes = [];
                    foreach ($jadwals as $jadwal) {
                        $jamMulai = substr($jadwal->jam_mulai, 0, 5);
                        $jamSelesai = substr($jadwal->jam_selesai, 0, 5);
                        $times[] = $jamMulai;
                        $fullTimes[] = "$jamMulai - $jamSelesai";
                    }

                    return [
                        'day' => $jadwals->first()->tanggal_praktik,
                        'times' => $times,
                        'full_times' => $fullTimes,
                    ];
                })
                ->values();

            return [
                'id' => $tm->id_tenaga_medis,
                'poli_id' => $specialty ? $specialty->id_poli : ($tm->poli->first()->id_poli ?? 1),
                'name' => trim(
                    ($tm->gelar_depan ? $tm->gelar_depan . ' ' : '') .
                        $tm->nama_lengkap .
                        ' ' . ($tm->gelar_belakang ?? '')
                ),
                'specialty' => $specialty
                    ? str_replace('Poli ', '', $specialty->nama_poli)
                    : ($tm->spesialis ?? '-'),
                'subspecialty' => $subspecialty
                    ? str_replace('Poli ', '', $subspecialty->nama_poli)
                    : ($tm->subspesialis ?? '-'),
                'rating' => rand(3, 5),
                'image_url' => $tm->foto_profile,
                'experience' => rand(1, 20) . ' tahun',
                'patients' => rand(50, 200),
                'description' => 'Dokter ahli di bidang ' . ($specialty ? $specialty->nama_poli : ($tm->spesialis ?? '-')),
                'schedules' => $schedules,
            ];
        });

        return response()->json($data);
    }

    public function getSpecialties()
    {
        $specialties = \App\Models\Poli::select('nama_poli')
            ->distinct()
            ->get()
            ->pluck('nama_poli')
            ->map(function ($poliName) {
                return str_replace('Poli ', '', $poliName);
            })
            ->toArray();

        $uniqueSpecialties = array_values(array_unique($specialties));
        array_unshift($uniqueSpecialties, 'Semua');

        return response()->json($uniqueSpecialties);
    }

    public function getDataRekamMedis($id_kunjungan)
    {
        $dataRekamMedis = Kunjungan::where('id_kunjungan', $id_kunjungan)->get();
        return response()->json($dataRekamMedis);
    }

    public function bookSchedule(Request $request)
    {
        try {
            Log::info('=== BOOKING REQUEST ===');
            Log::info('Request data: ' . json_encode($request->all()));

            // Mapping "day" ke "tanggal_kunjungan"
            if ($request->has('day')) {
                $request->merge(['tanggal_kunjungan' => $request->day]);
            }

            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not authenticated'
                ], 401);
            }

            $request->validate([
                'doctor_id' => 'required|exists:tenaga_medis,id_tenaga_medis',
                'keluhan' => 'required|string',
                'tanggal_kunjungan' => 'required|date',
            ]);

            $pasien = Pasien::where('email', $user->email)->first();
            if (!$pasien) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data pasien tidak ditemukan'
                ], 404);
            }

            // Ambil poli_id dari request atau fallback
            $poliId = $request->poli_id;
            if (!$poliId || $poliId == 0) {
                $tenagaMedis = TenagaMedis::with('poli')->find($request->doctor_id);
                $poliId = $tenagaMedis && $tenagaMedis->poli->isNotEmpty()
                    ? $tenagaMedis->poli->first()->id_poli
                    : 1;
            }

            $tenagaMedis = TenagaMedis::findOrFail($request->doctor_id);

            $jumlahHariIni = Kunjungan::where('tenaga_medis_id', $tenagaMedis->id_tenaga_medis)
                ->whereDate('tanggal_kunjungan', $request->tanggal_kunjungan)
                ->count();

            $nomorUrut = str_pad($jumlahHariIni + 1, 2, '0', STR_PAD_LEFT);
            $kodeAntrian = $tenagaMedis->kode_antrian . '-' . date('Ymd', strtotime($request->tanggal_kunjungan)) . '-' . $nomorUrut;

            $jadwalPraktik = $tenagaMedis->jadwalPraktik()
                ->whereDate('tanggal_praktik', $request->tanggal_kunjungan)
                ->first();

            $tipePasien = ($request->filled('nama_rs_perujuk') || $request->filled('nama_dokter_perujuk'))
                ? 'Rujuk'
                : 'Non Rujuk';

            // Mapping penjamin
            $penjaminInput = strtolower($request->penjamin);
            $mapping = [
                'pribadi' => 'Pribadi',
                'asuransi' => 'Asuransi',
                'bpjs' => 'Pemerintah',
                'pemerintah' => 'Pemerintah',
                'perusahaan' => 'Perusahaan',
                'lainnya' => 'Lainnya',
            ];
            $tipePenjamin = $mapping[$penjaminInput] ?? 'Pribadi';

            // 🔹 Pastikan dataPenjamin dibuat dulu
            $dataPenjamin = DataPenjamin::updateOrCreate(
                ['nama_penjamin' => ucfirst($penjaminInput)],
                ['tipe_penjamin' => $tipePenjamin]
            );

            // Simpan kunjungan
            $kunjungan = Kunjungan::create([
                'pasien_id' => $pasien->id_pasien,
                'penjamin_id' => $dataPenjamin->id_penjamin,
                'tenaga_medis_id' => $request->doctor_id,
                'poli_id' => $poliId,
                'kode_antrian' => $kodeAntrian,
                'tanggal_kunjungan' => $request->tanggal_kunjungan,
                'tipe_pasien' => $tipePasien,
                'nama_rs_perujuk' => $request->nama_rs_perujuk,
                'nama_dokter_perujuk' => $request->nama_dokter_perujuk,
                'status' => $request->status ?? 'pending',
                'jam_kunjungan' => $jadwalPraktik ? $jadwalPraktik->jam_mulai : null,
            ]);

            Log::info('Kunjungan created: ' . $kunjungan->id_kunjungan);

            // Simpan detail penjaminan
            $detailPenjaminan = DetailPenjaminanKunjungan::create([
                'kunjungan_id' => $kunjungan->id_kunjungan,
                'penjamin_id' => $dataPenjamin->id_penjamin,
                'nomor_kartu_asuransi' => $request->bpjs_number ?? $request->nomor_kartu_asuransi,
                'nama_pemegang_kartu' => $request->nama_pemegang_kartu,
                'tanggal_berlaku' => $request->tanggal_berlaku,
                'catatan' => $request->catatan,
            ]);

            Log::info('Detail penjaminan created: ' . $detailPenjaminan->id_detail_penjaminan);

            // Buat rekam medis otomatis
            $rekamMedis = RekamMedis::create([
                'kunjungan_id' => $kunjungan->id_kunjungan,
                'keluhan' => $request->keluhan,
            ]);

            Log::info('Rekam medis created: ' . $rekamMedis->id_rekam_medis);

            return response()->json([
                'status' => 'success',
                'message' => 'Jadwal berhasil dipesan dan rekam medis dibuat',
                'data' => [
                    'kunjungan_id' => $kunjungan->id_kunjungan,
                    'kode_antrian' => $kunjungan->kode_antrian,
                    'pasien' => $pasien->nama_lengkap,
                    'rekam_medis_id' => $rekamMedis->id_rekam_medis,
                    'keluhan' => $rekamMedis->keluhan,
                    'penjamin' => $dataPenjamin->nama_penjamin,
                    'tipe_penjamin' => $dataPenjamin->tipe_penjamin,
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    public function updateStatus(Request $request, $id_kunjungan)
{
    $request->validate([
        'status' => 'required|in:pending,confirmed,waiting,engaged,succeed', // gunakan lowercase
    ]);

    $kunjungan = Kunjungan::findOrFail($id_kunjungan);

    // Pastikan format status sama dengan database enum
    $status = ucfirst(strtolower($request->status)); // Pending, Confirmed, Waiting, Engaged, Succeed

    // Jika status Waiting dan jam_kunjungan belum ada, set jam_kunjungan sekarang
    if ($status === 'Waiting' && !$kunjungan->jam_kunjungan) {
        $kunjungan->jam_kunjungan = now()->format('H:i:s');
    }

    // Jika status Engaged dan waktu_mulai_pemeriksaan belum ada, set sekarang
    if ($status === 'Engaged' && !$kunjungan->waktu_mulai_pemeriksaan) {
        $kunjungan->waktu_mulai_pemeriksaan = now();
    }

    $kunjungan->status = $status;
    $kunjungan->save();

    return response()->json([
        'status' => 'success',
        'message' => "Status kunjungan diperbarui ke $status",
        'data' => $kunjungan,
    ]);
}


   public function getEmrPasien($pasienId)
{
    try {
        // ✅ Ambil SEMUA kunjungan dari pasien ini
        $kunjunganList = Kunjungan::with([
            'pasien',
            'tenagaMedis',
            'detailPenjaminan.penjamin',
            'rekamMedis',
        ])
        ->where('pasien_id', $pasienId) // ✅ Filter by pasien_id
        ->orderBy('tanggal_kunjungan', 'desc') // Urutkan dari terbaru
        ->get();

        if ($kunjunganList->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'data' => []
            ]);
        }

        // ✅ Map semua kunjungan ke array
        $emrDataList = $kunjunganList->map(function($kunjungan) {
            
            // Menggabungkan Gelar Depan, Nama, dan Gelar Belakang
            $tenagaMedisName = trim(
                ($kunjungan->tenagaMedis->gelar_depan ?? '') . ' ' .
                ($kunjungan->tenagaMedis->nama_lengkap ?? '-') . ' ' .
                ($kunjungan->tenagaMedis->gelar_belakang ?? '')
            );

            return [
                'kunjungan_id' => $kunjungan->id_kunjungan,
                'nama' => $kunjungan->pasien->nama_lengkap ?? '-',
                'no_rm' => $kunjungan->pasien->nomor_rm ?? '-',
                'tgl_lahir' => $kunjungan->pasien->tanggal_lahir ?? '-',
                'jenis_kelamin' => $kunjungan->pasien->jenis_kelamin ?? '-',
                'foto_profil' => $kunjungan->pasien->foto_profil ?? null,
                'nama_rs_perujuk' => $kunjungan->nama_rs_perujuk ?? '-',
                'nama_dokter_perujuk' => $kunjungan->nama_dokter_perujuk ?? '-',
                'gelar_depan' => $kunjungan->tenagaMedis->gelar_depan ?? null, 
                'gelar_belakang' => $kunjungan->tenagaMedis->gelar_belakang ?? null,
                'tenaga_medis' => $tenagaMedisName, 
                'spesialisasi' => $kunjungan->tenagaMedis->spesialis ?? '-',
                'tanggal_kunjungan' => $kunjungan->tanggal_kunjungan ?? '-',
                'jam_kunjungan' => $kunjungan->jam_kunjungan ?? '-',
                'waktu_mulai_pemeriksaan' => $kunjungan->waktu_mulai_pemeriksaan
                    ? $kunjungan->waktu_mulai_pemeriksaan->format('H:i:s')
                    : '-',
                'kode_antrian' => $kunjungan->kode_antrian ?? '-',
                'penjamin' => $kunjungan->detailPenjaminan->penjamin->nama_penjamin ?? '-',
                'tipe_penjamin' => $kunjungan->detailPenjaminan->penjamin->tipe_penjamin ?? '-',
                'nomor_kartu' => $kunjungan->detailPenjaminan->nomor_kartu_asuransi ?? '-',
                'catatan_penjamin' => $kunjungan->detailPenjaminan->catatan ?? '-',
                'keluhan' => $kunjungan->rekamMedis->keluhan ?? '-',
                'prosedur_rencana' => $kunjungan->rekamMedis->prosedur_rencana ?? '-',
                'informasi_kondisi_pasien' => $kunjungan->rekamMedis->informasi_kondisi_pasien ?? '-',
                'jenis_perawatan' => $kunjungan->jenis_perawatan ?? '-',
                'jenis_kunjungan' => $kunjungan->jenis_kunjungan ?? '-',
                'status' => $kunjungan->status ?? '-',
            ];
        });

        \Log::info('EMR Data retrieved for pasien_id: ' . $pasienId, ['count' => $emrDataList->count()]);

        return response()->json([
            'status' => 'success',
            'data' => $emrDataList
        ]);

    } catch (\Exception $e) {
        \Log::error('Error getting EMR data: ' . $e->getMessage());
        return response()->json([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat mengambil data EMR: ' . $e->getMessage()
        ], 500);
    }
}

// public function Getdatapasien (Request $request) {
//     $datates = Kunjungan::get();

//     return response()->json($datates);
// }
}
