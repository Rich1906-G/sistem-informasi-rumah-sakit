<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;

class TestingController extends Controller
{
    public function Testing(Request $request){
        return $request;
    }

    public function HalamanTesting(){
        return view('testing');
    }

    public function getEmrPasien($kunjunganId)
{
    try {
        // Ambil kunjungan + relasi pasien, dokter, detail penjaminan, rekam medis
        $kunjungan = Kunjungan::with([
            'pasien',                  // relasi ke pasien
            'tenagaMedis',             // relasi ke dokter
            'detailPenjaminan',        // relasi ke detail penjaminan
            'rekamMedis'               // relasi ke rekam medis
        ])->findOrFail($kunjunganId);

        $emrData = [
            'nama' => $kunjungan->pasien-> nama_lengkap ?? '-',
            'no_rm' => $kunjungan->pasien->id_pasien ?? '-',
            'tgl_lahir' => $kunjungan->pasien->tgl_lahir ?? '-',
            'jenis_kelamin' => $kunjungan->pasien->jenis_kelamin ?? '-',
            'nama_rs_perujuk' => $kunjungan->nama_rs_perujuk ?? '_',
            'nama_dokter_perujuk' => $kunjungan->nama_dokter_perujuk ?? '_',
            'tenaga_medis' => $kunjungan->tenagaMedis->nama_lengkap ?? '-',
            'spesialisasi' => $kunjungan->tenagaMedis->spesialis ?? '-',
            'tanggal_kunjungan' => $kunjungan->tanggal_kunjungan ?? '-',
            'kode_antrian' => $kunjungan->kode_antrian ?? '-',
            'penjamin' => $kunjungan->detailPenjaminan->penjamin->nama_penjamin ?? '-',
            'tipe_penjamin' => $kunjungan->detailPenjaminan->penjamin->tipe_penjamin ?? '-',
            'nomor_kartu' => $kunjungan->detailPenjaminan->nomor_kartu_asuransi ?? '-',
            'catatan_penjamin' => $kunjungan->detailPenjaminan->catatan ?? '-',
            'keluhan' => $kunjungan->rekamMedis->keluhan ?? '-',
            'prosedur_rencana' => $kunjungan->rekamMedis->prosedur_rencana ?? '-',
            'informasi_kondisi_pasien'=>$kunjungan->rekamMedis->informasi_kondisi_pasien ?? '-'
        ];

        return response()->json([
            'status' => 'success',
            'data' => $emrData
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'EMR pasien tidak ditemukan: ' . $e->getMessage()
        ], 404);
    }
}
}
