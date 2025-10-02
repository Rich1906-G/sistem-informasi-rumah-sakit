<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApotekController extends Controller
{
    public function index()
    {
        // Contoh data (ini biasanya dari database)
        $totalAntrian = 10;
        $sudahDitangani = 4;

        // Hitung persentase progress
        $progress = $totalAntrian > 0 ? ($sudahDitangani / $totalAntrian) * 100 : 0;

        return view('apotek', compact('totalAntrian', 'sudahDitangani', 'progress'), ['title'  => 'Apotek || Royal Klinikl', 'header'  => 'Apotek', 'subHeader'  => 'Royal Klinik']);
    }
}
