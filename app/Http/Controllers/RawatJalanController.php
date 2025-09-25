<?php

namespace App\Http\Controllers;

use App\Models\JadwalPraktik;
use App\Models\Kunjungan;
use App\Models\TenagaMedis;
use Illuminate\Http\Request;

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

        // Get all medical staff
        $tenagaMedis = TenagaMedis::where('job_medis', 'Dokter')
            ->select('id_tenaga_medis', 'nama_lengkap', 'job_medis')
            ->get();

        $jadwalPraktik = JadwalPraktik::with('tenagaMedis')
            ->get()
            ->groupBy('tenaga_medis_id');



        // // Prepare data to be sent to the view
        $data = [
            'tenagaMedis' => $tenagaMedis,
            'jadwalPraktik' => $jadwalPraktik,
        ];
        return response()->json($data);
    }
}
