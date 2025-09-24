<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasi');
    }

    public function getDataRawatJalanPoli()
    {

        $dataRawatJalanPoli = Kunjungan::query()
            ->join('rekam_medis', 'kunjungan.id_kunjungan', '=', 'rekam_medis.kunjungan_id');

        return response()->json($dataRawatJalanPoli);
    }
}
