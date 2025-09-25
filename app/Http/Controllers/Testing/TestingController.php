<?php

namespace App\Http\Controllers\Testing;

use Carbon\Carbon;
use App\Models\TenagaMedis;
use Illuminate\Http\Request;
use App\Models\JadwalPraktik;
use Illuminate\Routing\Controller;

class TestingController extends Controller
{
    /**
     * Menampilkan halaman utama Rawat Jalan.
     * Mengirimkan daftar semua dokter untuk sidebar.
     */
    public function index(Request $request)
    {
        // Ambil data dasar semua dokter untuk sidebar
        $dataDokter = TenagaMedis::where('job_medis', 'LIKE', '%Dokter%')->get();

        // View 'rawat_jalan.index' harus dibuat di resources/views/rawat_jalan/index.blade.php
        return view('testing.testing_jimy', compact('dataDokter'));
    }

    /**
     * Mengambil data JSON untuk membangun GRID jadwal (4 hari ke depan).
     * Dipanggil melalui AJAX.
     */
    public function getJadwalDokter(Request $request)
    {
        // Ambil filter ID dari URL (?filter_id=X)
        $filterId = $request->query('filter_id');

        // Tentukan rentang tanggal
        $jumlah_hari_tampil = 4; // Sesuai tampilan screenshot
        $start_date = Carbon::today()->toDateString();
        $end_date = Carbon::today()->addDays($jumlah_hari_tampil - 1)->toDateString();

        // 1. Generate Header Tanggal Awal (Semua 4 hari)
        $tanggal_header_semua = [];
        for ($i = 0; $i < $jumlah_hari_tampil; $i++) {
            $date = Carbon::today()->addDays($i);

            $tanggal_header_semua[$date->toDateString()] = [
                'header_display' => $date->locale('id')->dayName . ', ' . $date->format('d F'),
                'db_format' => $date->toDateString()
            ];
        }

        // 2. Ambil Data Tenaga Medis dan Jadwal Praktik (Eager Loading dan Filtering)
        $fields_tenaga_medis = ['id_tenaga_medis', 'nama_lengkap', 'job_medis', 'gelar_depan', 'gelar_belakang', 'spesialis'];
        $fields_jadwal_praktik = ['id_jadwal', 'tenaga_medis_id', 'tanggal_praktik', 'jam_mulai', 'jam_selesai'];

        // Inisialisasi query builder
        $query = TenagaMedis::select($fields_tenaga_medis)
            ->where('job_medis', 'LIKE', '%Dokter%');

        // Terapkan filter berdasarkan ID jika filterId tersedia
        if ($filterId) {
            $query->where('id_tenaga_medis', $filterId);
        }

        // Terapkan eager loading dan whereHas
        $tenaga_medis_dan_jadwal = $query->with(['jadwalPraktik' => function ($query) use ($start_date, $end_date, $fields_jadwal_praktik) {
            $query->whereBetween('tanggal_praktik', [$start_date, $end_date])
                ->select($fields_jadwal_praktik)
                ->orderBy('tanggal_praktik')
                ->orderBy('jam_mulai');
        }])
            ->whereHas('jadwalPraktik', function ($query) use ($start_date, $end_date) {
                $query->whereBetween('tanggal_praktik', [$start_date, $end_date]);
            })
            ->get();

        // 3. Filter Header Kolom Berdasarkan Data yang Tersedia (Dipertahankan)
        $tanggal_aktif_unik = $tenaga_medis_dan_jadwal
            ->pluck('jadwalPraktik')->flatten()
            ->pluck('tanggal_praktik')->unique()->toArray();

        $tanggal_header_terfilter = array_filter(
            $tanggal_header_semua,
            fn($key) => in_array($key, $tanggal_aktif_unik),
            ARRAY_FILTER_USE_KEY
        );

        // 4. Kembalikan data dalam format JSON
        return response()->json([
            'data_dokter' => $tenaga_medis_dan_jadwal,
            'tanggal_header' => $tanggal_header_terfilter,
        ]);
    }

    /**
     * Mengambil semua jadwal praktik untuk satu dokter (30 hari ke depan) berdasarkan ID.
     * Dipanggil melalui AJAX saat nama dokter diklik.
     */
    public function getDetailJadwalDokter($id)
    {
        $start_date = Carbon::today()->toDateString();
        $end_date = Carbon::today()->addDays(30)->toDateString();

        $fields_tenaga_medis = ['id_tenaga_medis', 'nama_lengkap', 'spesialis', 'gelar_depan', 'gelar_belakang', 'job_medis'];
        $fields_jadwal_praktik = ['id_jadwal', 'tenaga_medis_id', 'tanggal_praktik', 'jam_mulai', 'jam_selesai'];

        $dokter_detail = TenagaMedis::select($fields_tenaga_medis)
            ->where('id_tenaga_medis', $id)
            ->with(['jadwalPraktik' => function ($query) use ($start_date, $end_date, $fields_jadwal_praktik) {
                $query->whereBetween('tanggal_praktik', [$start_date, $end_date])
                    ->select($fields_jadwal_praktik)
                    ->orderBy('tanggal_praktik')
                    ->orderBy('jam_mulai');
            }])
            ->first();

        if (!$dokter_detail) {
            return response()->json(['error' => 'Dokter tidak ditemukan.'], 404);
        }

        return response()->json([
            'dokter' => $dokter_detail,
        ]);
    }
}
