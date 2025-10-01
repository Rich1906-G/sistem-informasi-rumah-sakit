<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Kunjungan;

use App\Models\TenagaMedis;
use App\Models\DataPenjamin;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RegistrasiController extends Controller
{
    public function index()
    {
        $tenagaMedis   = TenagaMedis::all();
        $penjamin      = DataPenjamin::all();
        $poli          = Poli::all();
        return view('registrasi', compact('tenagaMedis', 'penjamin', 'poli'));
    }

    public function getDataRawatJalanPoli(Request $request)
    {
        $query = Kunjungan::with('pasien', 'tenagaMedis', 'poli', 'dataPenjamin')
            ->select(['id_kunjungan', 'pasien_id', 'tenaga_medis_id', 'poli_id', 'penjamin_id', 'status', 'tanggal_kunjungan', 'created_at', 'kode_antrian', 'jenis_perawatan',]);


        if ($request->filled('tanggal_dari')) {
            $query->whereDate('tanggal_kunjungan', '>=', $request->tanggal_dari);
        }
        if ($request->filled('tanggal_hingga')) {
            $query->whereDate('tanggal_kunjungan', '<=', $request->tanggal_hingga);
        }

        // 2. Filter Tenaga Medis
        if ($request->filled('tenaga_medis_id') && $request->tenaga_medis_id != 'Semua Tenaga Medis') {
            $query->where('tenaga_medis_id', $request->tenaga_medis_id);
        }

        // 3. Filter Metode Pembayaran (Asumsi ini adalah penjamin_id)
        if ($request->filled('metode_pembayaran_id') && $request->metode_pembayaran_id != 'Semua Metode Pembayaran') {
            $query->where('penjamin_id', $request->metode_pembayaran_id);
        }

        // 4. Filter Poli
        if ($request->filled('poli_id') && $request->poli_id != 'Semua Poli') {
            $query->where('poli_id', $request->poli_id);
        }

        // 5. Filter Nama Pasien atau Nomor MR
        if ($request->filled('nama_pasien_mr')) {
            $searchTerm = '%' . $request->nama_pasien_mr . '%';
            $query->whereHas('pasien', function ($q) use ($searchTerm) {
                $q->where('nama_lengkap', 'like', $searchTerm)
                    ->orWhere('nomor_rm', 'like', $searchTerm);
            });
        }

        return DataTables::of($query)
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


    public function getDataAntriCepat(Request $request)
    {
        $query = Kunjungan::with('pasien', 'tenagaMedis', 'poli', 'dataPenjamin')
            ->select(['id_kunjungan', 'pasien_id', 'tenaga_medis_id', 'poli_id', 'penjamin_id', 'status', 'tanggal_kunjungan', 'kode_antrian', 'jenis_perawatan',]);


        if ($request->filled('tanggal_dari')) {
            $query->whereDate('tanggal_kunjungan', '>=', $request->tanggal_dari);
        }
        if ($request->filled('tanggal_hingga')) {
            $query->whereDate('tanggal_kunjungan', '<=', $request->tanggal_hingga);
        }


        // 4. Filter Poli
        if ($request->filled('poli_id') && $request->poli_id != 'Semua Poli') {
            $query->where('poli_id', $request->poli_id);
        }

        return DataTables::of($query)
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
