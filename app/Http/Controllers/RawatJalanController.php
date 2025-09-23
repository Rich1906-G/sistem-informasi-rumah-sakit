<?php

namespace App\Http\Controllers;

use App\Models\JadwalPraktik;
use App\Models\TenagaMedis;
use Illuminate\Http\Request;

class RawatJalanController extends Controller
{
    public function index(Request $request)
    {
        $dataDokter = TenagaMedis::get();

        $tanggal = $request->query('date', now()->toDateString());

        $jadwalPraktik = JadwalPraktik::whereDate('hari_praktik', $tanggal)->date();

        return view('rawat_jalan', compact('dataDokter', 'tanggal', 'jadwalPraktik'));
    }
}
