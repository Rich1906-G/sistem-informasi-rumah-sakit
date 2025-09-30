<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;

use function Pest\Laravel\json;
use Yajra\DataTables\Facades\DataTables;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('registrasi');
    }

    public function getDataRawatJalanPoli()
    {
        $Data = Kunjungan::with('pasien', 'tenagaMedis', 'poli', 'dataPenjamin')
            ->select(['id_kunjungan', 'pasien_id', 'tenaga_medis_id', 'poli_id', 'penjamin_id', 'status', 'tanggal_kunjungan', 'created_at', 'kode_antrian', 'jenis_perawatan',])
            ->get();

        return DataTables::of($Data)
            ->addIndexColumn()
            ->addColumn('status', function ($kunjungan) {
                return $kunjungan->status;
            })
            ->addColumn('tanggal_kunjungan', function ($kunjungan) {
                return $kunjungan->tanggal_kunjungan;
            })
            ->addColumn('tanggal_dibuat', function ($kunjungan) {
                return $kunjungan->created_at;
            })
            ->addColumn('no', function ($kunjungan) {
                return $kunjungan->kode_antrian;
            })
            ->addColumn('poli', function ($kunjungan) {
                return $kunjungan->poli->nama_poli;
            })
            ->addColumn('nama_pasien', function ($kunjungan) {
                return $kunjungan->pasien->nama_lengkap;
            })
            ->addColumn('rencana_tindakan', function ($kunjungan) {
                return $kunjungan->jenis_perawatan;
            })
            // ->addColumn('rencana_paket', function ($kunjungan) {
            //     return $kunjungan->;
            // })
            ->addColumn('tenaga_medis', function ($kunjungan) {
                return $kunjungan->tenagaMedis->nama_lengkap;
            })
            ->addColumn('tipe_bayar', function ($kunjungan) {
                return $kunjungan->dataPenjamin->nama_penjamin;
            })
            // ->addColumn('rujuk_bpjs', function ($kunjungan) {
            //     return $kunjungan->code_antrian;
            // })
            ->make(true);
    }


    public function getDataAntriCepat()
    {
        $Data = Kunjungan::with('pasien', 'tenagaMedis', 'poli', 'dataPenjamin')
            ->select(['id_kunjungan', 'pasien_id', 'tenaga_medis_id', 'poli_id', 'penjamin_id', 'status', 'tanggal_kunjungan', 'kode_antrian', 'jenis_perawatan',])
            ->get();

        return DataTables::of($Data)
            ->addIndexColumn()
            ->addColumn('tanggal_kunjungan', function ($kunjungan) {
                return $kunjungan->tanggal_kunjungan;
            })
            ->addColumn('no', function ($kunjungan) {
                return $kunjungan->kode_antrian;
            })
            ->addColumn('poli', function ($kunjungan) {
                return $kunjungan->poli->nama_poli;
            })
            ->addColumn('nama_pasien', function ($kunjungan) {
                return $kunjungan->pasien->nama_lengkap;
            })
            ->addColumn('rencana_tindakan', function ($kunjungan) {
                return $kunjungan->jenis_perawatan;
            })
            // ->addColumn('rencana_paket', function ($kunjungan) {
            //     return $kunjungan->;
            // })
            ->addColumn('tenaga_medis', function ($kunjungan) {
                return $kunjungan->tenagaMedis->nama_lengkap;
            })
            ->addColumn('tipe_bayar', function ($kunjungan) {
                return $kunjungan->dataPenjamin->nama_penjamin;
            })
            ->addColumn('status', function ($kunjungan) {
                return $kunjungan->status;
            })
            ->make(true);
    }
}
