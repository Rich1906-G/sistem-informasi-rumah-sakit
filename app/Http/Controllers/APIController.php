<?php

namespace App\Http\Controllers;
use App\Models\TenagaMedis;
use Illuminate\Http\Request;
use Carbon\Carbon;

class APIController extends Controller
{
    public function getDataTenagaMedis () {
        $tenagaMedis = TenagaMedis::with(['poli', 'jadwalPraktik'])->get();

        $data = $tenagaMedis->map(function($tm) {
            
            // Ambil poli spesialis dan subspesialis jika ada
            $specialty = $tm->poli->where('parent_id', null)->first();
            $subspecialty = $tm->poli->where('parent_id', '!=', null)->first();

            $schedules = $tm->jadwalPraktik->groupBy('hari_praktik')->map(function ($jadwals) {
                $times = [];
                $fullTimes = [];
                foreach ($jadwals as $jadwal) {
                    $jamMulai = substr($jadwal->jam_mulai, 0, 5);
                    $jamSelesai = substr($jadwal->jam_selesai, 0, 5);
                    $times[] = $jamMulai;
                    $fullTimes[] = "$jamMulai - $jamSelesai";
                }

                return [
                    'day' => $jadwals->first()->hari_praktik,
                    'times' => $times,
                    'full_times' => $fullTimes,
                ];
            })->values();

            return [
                'id' => $tm->id_tenaga_medis,
                'name' => trim(($tm->gelar_depan ? $tm->gelar_depan.' ' : '').$tm->nama_lengkap.' '.($tm->gelar_belakang ?? '')),
                'specialty' => $specialty ? $specialty->nama_poli : ($tm->spesialis ?? '-'),
                'subspecialty' => $subspecialty ? $subspecialty->nama_poli : ($tm->subspesialis ?? '-'),
                'rating' => rand(3,5), // contoh rating dummy
                'image_url' => $tm->foto_profile,
                'experience' => rand(1,20).' tahun', // contoh pengalaman dummy
                'patients' => rand(50,200), // dummy pasien
                'description' => 'Dokter ahli di bidang '.($specialty ? $specialty->nama_poli : ($tm->spesialis ?? '-')),
                'schedules' => $schedules,
            ];
        });

        return response()->json($data);
    }
}
