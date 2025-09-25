<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Carbon\Carbon;
=======
use App\Models\JadwalPraktik;
use App\Models\Kunjungan;
>>>>>>> 0ada33c40adead0809502099d2b60dbcbc23992c
use App\Models\TenagaMedis;
use Illuminate\Http\Request;
use App\Models\JadwalPraktik;

class RawatJalanController extends Controller
{
    public function index(Request $request)
    {
        $dataDokter = TenagaMedis::where('job_medis', 'Dokter')->get();

        $tanggal = $request->query('date', now()->toDateString());

        $namaHari = \Carbon\Carbon::parse($tanggal)->isoFormat('dddd');

        $jadwalPraktik = JadwalPraktik::with('tenagaMedis')
            ->where('hari_praktik', $namaHari)
            ->get();

        return view('rawat_jalan', compact('dataDokter', 'tanggal', 'jadwalPraktik'));
    }

    public function getJadwalDokter(Request $request)
    {

        // Tentukan jumlah hari yang ingin ditampilkan
        $jumlah_hari_tampil = 7;
        // Tanggal mulai dan akhir untuk filter jadwal praktik
        $start_date = Carbon::today()->toDateString();
        // tanggal akhir adalah tanggal mulai + jumlah hari - 1
        $end_date = Carbon::today()->addDays($jumlah_hari_tampil - 1)->toDateString();

        // Generate tanggal header awal (semua 7 hari)
        $tanggal_header = [];
        for ($i = 0; $i < $jumlah_hari_tampil; $i++) {
            $date = Carbon::today()->addDays($i);

            $tanggal_header[$date->toDateString()] = [
                'header_display' => $date->locale('id')->dayName . ',' . $date->format('d F'),
                'db_format' => $date->toDateString()
            ];
        }

        //pilih field yang akan diambil
        $fields_tenaga_medis = ['id_tenaga_medis', 'nama_lengkap', 'job_medis', 'gelar_depan', 'gelar_belakang'];
        $fields_jadwal_praktik = ['id_jadwal', 'tenaga_medis_id', 'tanggal_praktik', 'jam_mulai', 'jam_selesai'];

        // Ambil data tenaga medis dengan job_medis 'Dokter' beserta jadwal praktiknya dalam rentang tanggal yang ditentukan
        $tenaga_medis_dan_jadwal = TenagaMedis::select($fields_tenaga_medis)
            ->where('job_medis', 'LIKE',  '%Dokter%')
            ->with(['jadwalPraktik' => function ($query) use ($fields_jadwal_praktik, $start_date, $end_date) {
                $query->whereBetween('tanggal_praktik', [$start_date, $end_date])
                    ->select($fields_jadwal_praktik)
                    ->orderBy('tanggal_praktik')
                    ->orderBy('jam_mulai');
            }])
            // Pastikan hanya mengambil tenaga medis yang memiliki jadwal praktik dalam rentang tanggal tersebut
            ->whereHas('jadwalPraktik', function ($query) use ($start_date, $end_date) {
                $query->whereBetween('tanggal_praktik', [$start_date, $end_date]);
            })
            ->get();

        return response()->json($tenaga_medis_dan_jadwal);
    }
}
