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

    public function dokter()
    {
        return TenagaMedis::where('job_medis', 'Dokter')->get();
    }

    public function kunjungan(Request $request)
    {
        return $bookings = Kunjungan::with('tenagaMedis')
            ->whereHas('tenagaMedis', function ($q) {
                $q->where('job_medis', 'Dokter');
            })
            ->get()
            ->map(function ($booking) {
                return [
                    'id'         => $booking->id,
                    'title'      => 'Pasien: ' . $booking->pasien_id,
                    'start'      => $booking->tanggal_kunjungan . ' ' . $booking->waktu_mulai_pemeriksaan,
                    'end'        => $booking->tanggal_kunjungan . ' ' . $booking->waktu_selesai_pemeriksaan, // pastikan ada kolom ini
                    'resourceId' => $booking->tenaga_medis_id,
                    'status'     => $booking->status,
                ];
            });
    }

    public function store(Request $request)
    {
        $booking = Kunjungan::create([
            'tenaga_medis_id' => $request->doctor_id,
            'pasien_id'       => $request->patient_name, // sesuaikan dengan field yang benar
            'tanggal_kunjungan' => \Carbon\Carbon::parse($request->start)->toDateString(),
            'waktu_mulai_pemeriksaan' => \Carbon\Carbon::parse($request->start)->toTimeString(),
            'waktu_selesai_pemeriksaan' => \Carbon\Carbon::parse($request->end)->toTimeString(),
            'status'          => 'Pending',
        ]);

        return response()->json($booking, 201);
    }
}
