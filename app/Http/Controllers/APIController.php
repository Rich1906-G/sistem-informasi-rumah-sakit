<?php

namespace App\Http\Controllers;

use App\Models\TenagaMedis;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getDataDokter()
    {
        $dataDokter = TenagaMedis::where('job_medis', 'Dokter')->get();

        // dd($dataDokter);

        return response()->json(['dataDokter' => $dataDokter]);
    }
}
