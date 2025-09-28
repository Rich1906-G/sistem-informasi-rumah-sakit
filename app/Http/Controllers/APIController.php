<?php

namespace App\Http\Controllers;

use App\Models\TenagaMedis;
use App\Models\Kunjungan;
use App\Models\RekamMedis;
use App\Models\Pasien;
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
                // PERBAIKAN: Pastikan selalu ada poli_id yang valid
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
        // 1. Ambil semua nama poli yang unik dari tabel 'poli'.
        // Atau, jika Anda yakin hanya poli tingkat atas/spesialisasi yang relevan,
        // Anda bisa memfilter berdasarkan struktur tabel `poli` Anda (misal: `parent_id` = null)

        // Asumsi: Semua entri di PoliSeeder adalah spesialisasi tingkat atas yang relevan.
        $specialties = \App\Models\Poli::select('nama_poli')
            ->distinct()
            // Kita bisa filter hanya yang relevan untuk Dokter (misal: yang ada di TenagaMedis)
            // Namun, cara termudah adalah mengambil semua dari PoliSeeder, lalu memfilter di FE.
            ->get()
            ->pluck('nama_poli')
            ->map(function ($poliName) {
                // Hapus awalan 'Poli ' untuk mendapatkan nama spesialisasi yang bersih
                return str_replace('Poli ', '', $poliName);
            })
            ->toArray();

        // Hapus duplikat yang mungkin timbul setelah menghapus 'Poli ' (misal 'Poli Gigi' dan 'Poli Gigi dan Mulut')
        $uniqueSpecialties = array_values(array_unique($specialties));

        // Tambahkan item 'Semua' secara manual di awal daftar
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

            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not authenticated'
                ], 401);
            }

            // Validasi request
            $request->validate([
                'doctor_id' => 'required|exists:tenaga_medis,id_tenaga_medis',
                'keluhan' => 'required|string',
            ]);

            // Ambil data pasien dari user
            $pasien = Pasien::where('email', $user->email)->first();
            if (!$pasien) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data pasien tidak ditemukan'
                ], 404);
            }

            // Ambil poli_id dari request atau dari tenaga medis
            $poliId = $request->poli_id;
            if (!$poliId || $poliId == 0) {
                $tenagaMedis = TenagaMedis::with('poli')->find($request->doctor_id);
                if ($tenagaMedis && $tenagaMedis->poli->isNotEmpty()) {
                    $poliId = $tenagaMedis->poli->first()->id_poli;
                } else {
                    $poliId = 1; // fallback
                }
            }

            // Pastikan poli_id valid
            $poliExists = \DB::table('poli')->where('id_poli', $poliId)->exists();
            if (!$poliExists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid poli_id'
                ], 400);
            }

            // Buat kunjungan
            $kunjungan = Kunjungan::create([
                'pasien_id' => $pasien->id_pasien,
                'tenaga_medis_id' => $request->doctor_id,
                'poli_id' => $poliId,
                'kode_antrian' => 'A' . date('His') . rand(10, 99),
                'tipe_pasien' => 'Umum',
                'tanggal_kunjungan' => now()->addDay()->format('Y-m-d'),
                'jam_kunjungan' => '08:00:00',
                'penjamin' => $request->penjamin ?? 'Diri Sendiri',
                'metode_pembayaran' => $request->metode_pembayaran,
                'nama_rs_perujuk' => $request->nama_rs_perujuk,
                'nama_dokter_perujuk' => $request->nama_dokter_perujuk,
                'jenis_kunjungan' => 'Rawat Jalan Poli',
                'jenis_perawatan' => 'Rawat Jalan',
                'status' => 'Pending',
            ]);

            Log::info('Kunjungan created: ' . $kunjungan->id_kunjungan);

            // Buat rekam medis otomatis terkait kunjungan
            $rekamMedis = RekamMedis::create([
                'kunjungan_id' => $kunjungan->id_kunjungan,
                'keluhan' => $request->keluhan,
                // Tambahkan field lain jika perlu, misal diagnosa awal, tindakan awal
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
}
