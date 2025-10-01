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
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{
    /**
     * Ambil data tenaga medis berikut jadwal & poli terkait
     */
    public function getDataTenagaMedis()
    {
        $tenagaMedis = TenagaMedis::with(['poli', 'jadwalPraktik'])->get();

        $data = $tenagaMedis->map(function ($tm) {
            // Ambil specialty (parent) dan subspecialty (child) jika ada
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
                        ($tm->nama_lengkap ?? '') .
                        ' ' . ($tm->gelar_belakang ?? '')
                ),
                'specialty' => $specialty
                    ? str_replace('Poli ', '', $specialty->nama_poli)
                    : ($tm->spesialis ?? '-'),
                'subspecialty' => $subspecialty
                    ? str_replace('Poli ', '', $subspecialty->nama_poli)
                    : ($tm->subspesialis ?? '-'),
                'rating' => rand(3, 5),
                'image_url' => $tm->foto_profile ?? null,
                'experience' => rand(1, 20) . ' tahun',
                'patients' => rand(50, 200),
                'description' => 'Dokter ahli di bidang ' . ($specialty ? $specialty->nama_poli : ($tm->spesialis ?? '-')),
                'schedules' => $schedules,
            ];
        });

        return response()->json($data);
    }

    /**
     * Ambil daftar spesialisasi/poli unik (bersih dari awalan 'Poli ')
     */
    public function getSpecialties()
    {
        // Ambil semua nama_poli unik
        $poliNames = \App\Models\Poli::select('nama_poli')->distinct()->pluck('nama_poli')->toArray();

        // Hapus awalan 'Poli ' dan buat unik
        $specialties = array_map(function ($name) {
            return str_replace('Poli ', '', $name);
        }, $poliNames);

        $uniqueSpecialties = array_values(array_unique($specialties));
        array_unshift($uniqueSpecialties, 'Semua');

        return response()->json($uniqueSpecialties);
    }

    /**
     * Ambil data rekam medis / kunjungan berdasarkan id_kunjungan
     */
    public function getDataRekamMedis($id_kunjungan)
    {
        $dataRekamMedis = Kunjungan::with(['rekamMedis', 'pasien', 'tenagaMedis', 'detailPenjaminan'])->where('id_kunjungan', $id_kunjungan)->first();

        if (!$dataRekamMedis) {
            return response()->json(['status' => 'error', 'message' => 'Kunjungan tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'success', 'data' => $dataRekamMedis]);
    }

    /**
     * Booking schedule yang lebih lengkap:
     * - support field 'day' (dikonversi jadi tanggal_kunjungan)
     * - mapping penjamin, pembuatan DataPenjamin, DetailPenjaminanKunjungan, RekamMedis
     */
    public function bookSchedule(Request $request)
    {
        try {
            Log::info('=== BOOKING REQUEST ===');
            Log::info('Request data: ' . json_encode($request->all()));

            // mapping 'day' => 'tanggal_kunjungan' jika ada
            if ($request->has('day') && !$request->has('tanggal_kunjungan')) {
                $request->merge(['tanggal_kunjungan' => $request->day]);
            }

            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not authenticated'
                ], 401);
            }

            // validasi dasar
            $request->validate([
                'doctor_id' => 'required|exists:tenaga_medis,id_tenaga_medis',
                'keluhan' => 'required|string',
                'tanggal_kunjungan' => 'required|date',
            ]);

            // ambil pasien dari user
            $pasien = Pasien::where('email', $user->email)->first();
            if (!$pasien) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data pasien tidak ditemukan'
                ], 404);
            }

            // tentukan poli_id (dari request atau dari tenaga medis)
            $poliId = $request->poli_id;
            if (!$poliId || $poliId == 0) {
                $tenagaMedisTmp = TenagaMedis::with('poli')->find($request->doctor_id);
                $poliId = ($tenagaMedisTmp && $tenagaMedisTmp->poli->isNotEmpty()) ? $tenagaMedisTmp->poli->first()->id_poli : 1;
            }

            // validasi keberadaan poli
            $poliExists = DB::table('poli')->where('id_poli', $poliId)->exists();
            if (!$poliExists) {
                return response()->json(['status' => 'error', 'message' => 'Invalid poli_id'], 400);
            }

            $tenagaMedis = TenagaMedis::findOrFail($request->doctor_id);

            // Hitung nomor urut hari tersebut untuk dokter tsb
            $tanggalKunjungan = Carbon::parse($request->tanggal_kunjungan)->format('Y-m-d');
            $jumlahHariIni = Kunjungan::where('tenaga_medis_id', $tenagaMedis->id_tenaga_medis)
                ->whereDate('tanggal_kunjungan', $tanggalKunjungan)
                ->count();

            $nomorUrut = str_pad($jumlahHariIni + 1, 2, '0', STR_PAD_LEFT);
            // kode_antrian: contoh: KODE-20230901-01
            $kodeAntrian = ($tenagaMedis->kode_antrian ?? 'DR') . '-' . date('Ymd', strtotime($tanggalKunjungan)) . '-' . $nomorUrut;

            // ambil jadwal praktik jika ada untuk jam_kunjungan default
            $jadwalPraktik = $tenagaMedis->jadwalPraktik()
                ->whereDate('tanggal_praktik', $tanggalKunjungan)
                ->first();

            // tipe pasien: Rujuk jika mengisi nama rs/dokter perujuk
            $tipePasien = ($request->filled('nama_rs_perujuk') || $request->filled('nama_dokter_perujuk'))
                ? 'Rujuk'
                : 'Non Rujuk';

            // mapping penjamin input ke tipe yang konsisten
            $penjaminInput = $request->filled('penjamin') ? strtolower($request->penjamin) : 'pribadi';
            $mapping = [
                'pribadi' => 'Pribadi',
                'asuransi' => 'Asuransi',
                'bpjs' => 'Pemerintah',
                'pemerintah' => 'Pemerintah',
                'perusahaan' => 'Perusahaan',
                'lainnya' => 'Lainnya',
            ];
            $tipePenjamin = $mapping[$penjaminInput] ?? 'Pribadi';

            // Buat atau update DataPenjamin
            $dataPenjamin = DataPenjamin::updateOrCreate(
                ['nama_penjamin' => ucfirst($penjaminInput)],
                ['tipe_penjamin' => $tipePenjamin]
            );

            // Simpan kunjungan
            $kunjungan = Kunjungan::create([
                'pasien_id' => $pasien->id_pasien,
                'penjamin_id' => $dataPenjamin->id_penjamin,
                'tenaga_medis_id' => $tenagaMedis->id_tenaga_medis,
                'poli_id' => $poliId,
                'kode_antrian' => $kodeAntrian,
                'tanggal_kunjungan' => $tanggalKunjungan,
                'tipe_pasien' => $tipePasien,
                'nama_rs_perujuk' => $request->nama_rs_perujuk,
                'nama_dokter_perujuk' => $request->nama_dokter_perujuk,
                'status' => $request->status ?? 'pending',
                'jam_kunjungan' => $jadwalPraktik ? $jadwalPraktik->jam_mulai : null,
                'jenis_kunjungan' => $request->jenis_kunjungan ?? 'Rawat Jalan Poli',
                'jenis_perawatan' => $request->jenis_perawatan ?? 'Rawat Jalan',
                'metode_pembayaran' => $request->metode_pembayaran ?? null,
            ]);

            Log::info('Kunjungan created: ' . $kunjungan->id_kunjungan);

            // Simpan detail penjaminan jika ada
            $detailPenjaminan = DetailPenjaminanKunjungan::create([
                'kunjungan_id' => $kunjungan->id_kunjungan,
                'penjamin_id' => $dataPenjamin->id_penjamin,
                'nomor_kartu_asuransi' => $request->bpjs_number ?? $request->nomor_kartu_asuransi ?? null,
                'nama_pemegang_kartu' => $request->nama_pemegang_kartu ?? null,
                'tanggal_berlaku' => $request->tanggal_berlaku ?? null,
                'catatan' => $request->catatan ?? null,
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
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Exception: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return response()->json([
                'status' => 'error',
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update status kunjungan (pending, confirmed, waiting, engaged, succeed)
     */
    public function updateStatus(Request $request, $id_kunjungan)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,waiting,engaged,succeed',
        ]);

        $kunjungan = Kunjungan::findOrFail($id_kunjungan);

        // Simpan dengan format enum/case yang sesuai (misal: ucfirst)
        $status = ucfirst(strtolower($request->status)); // Pending, Confirmed, Waiting, Engaged, Succeed

        if ($status === 'Waiting' && !$kunjungan->jam_kunjungan) {
            $kunjungan->jam_kunjungan = now()->format('H:i:s');
        }

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

    /**
     * Ambil EMR pasien (semua kunjungan pasien)
     */
    public function getEmrPasien($pasienId)
    {
        try {
            $kunjunganList = Kunjungan::with([
                'pasien',
                'tenagaMedis',
                'detailPenjaminan.penjamin',
                'rekamMedis',
            ])
            ->where('pasien_id', $pasienId)
            ->orderBy('tanggal_kunjungan', 'desc')
            ->get();

            if ($kunjunganList->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'data' => []
                ]);
            }

            $emrDataList = $kunjunganList->map(function($kunjungan) {
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
                    'waktu_mulai_pemeriksaan' => $kunjungan->waktu_mulai_pemeriksaan ? $kunjungan->waktu_mulai_pemeriksaan->format('H:i:s') : '-',
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

            Log::info('EMR Data retrieved for pasien_id: ' . $pasienId, ['count' => $emrDataList->count()]);

            return response()->json([
                'status' => 'success',
                'data' => $emrDataList
            ]);
        } catch (\Exception $e) {
            Log::error('Error getting EMR data: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data EMR: ' . $e->getMessage()
            ], 500);
        }
    }
}
