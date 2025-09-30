<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class RegistrasiController extends Controller
{
    public function index()
    {
        $kunjunganData = Kunjungan::with([
            'pasien',
            'tenagaMedis',
            'poli',
            'rekamMedis',
            'vitalSign',
            'pengantar',
            'pembayaran',

        ])->get();

        $responJson = @json_decode($kunjunganData);

        // dd($responJson);
        return view('registrasi', ['dataKunjungan' => $responJson]);
    }

    public function getAllKunjunganData()
    {
        $kunjunganData = Kunjungan::with([
            'pasien',
            'tenagaMedis',
            'poli',
            'rekamMedis',
            'vitalSign',
            'pengantar',
            'pembayaran',

        ])->get();


        return response()->json($kunjunganData);
    }
}
