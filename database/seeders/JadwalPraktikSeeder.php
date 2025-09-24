<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\TenagaMedis;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JadwalPraktikSeeder extends Seeder
{
    // public function run(): void
    // {
    //     $faker = Faker::create('id_ID');

    //     // Get the IDs of all existing medical staff
    //     $tenagaMedisIds = DB::table('tenaga_medis')->pluck('id_tenaga_medis');

    //     // Check if there are any medical staff to link to
    //     if ($tenagaMedisIds->isEmpty()) {
    //         $this->command->info('No medical staff found. Please run the tenaga_medis seeder first.');
    //         return;
    //     }

    //     // List of days of the week
    //     $hariPraktik = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    //     // Create 20 dummy records
    //     for ($i = 0; $i < 20; $i++) {
    //         // Select a random medical staff ID and day of the week
    //         $tenagaMedisId = $faker->randomElement($tenagaMedisIds);
    //         $hari = $faker->randomElement($hariPraktik);

    //         // Generate a realistic start time and end time
    //         $jamMulai = $faker->dateTimeBetween('08:00', '16:00')->format('H:00:00');
    //         $jamSelesai = $faker->dateTimeBetween($jamMulai, '19:00')->format('H:00:00');

    //         // Insert the data into the table
    //         DB::table('jadwal_praktik')->insert([
    //             'tenaga_medis_id' => $tenagaMedisId,
    //             'hari_praktik' => $hari,
    //             'jam_mulai' => $jamMulai,
    //             'jam_selesai' => $jamSelesai,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ]);
    //     }
    // }

    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID dan Job Medis dari tabel tenaga_medis
        // Job Medis diperlukan untuk membuat jadwal yang lebih realistis (misalnya dokter = 3-5 hari, perawat = 5-7 hari)
        $tenagaMedisData = DB::table('tenaga_medis')
            ->select('id_tenaga_medis', 'job_medis')
            ->get();

        if ($tenagaMedisData->isEmpty()) {
            $this->command->info('Tidak ada data tenaga medis ditemukan. Silakan jalankan seeder tenaga medis terlebih dahulu.');
            return;
        }

        $hariPraktik = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $jadwalData = [];

        // Loop melalui SETIAP tenaga medis untuk membuat jadwal yang unik
        foreach ($tenagaMedisData as $tenagaMedis) {
            $id = $tenagaMedis->id_tenaga_medis;
            $job = $tenagaMedis->job_medis;
            $jadwalPerluDibuat = 0;

            // Logika realistis untuk jumlah hari praktik:
            if (str_contains($job, 'Dokter')) {
                // Dokter/Spesialis: 3-5 hari seminggu
                $jadwalPerluDibuat = $faker->numberBetween(3, 5);
            } else {
                // Tenaga Medis lain (Perawat/Bidan): 5-7 hari seminggu (termasuk shift)
                $jadwalPerluDibuat = $faker->numberBetween(5, 7);
            }

            $hariYangSudahDipakai = [];

            for ($j = 0; $j < $jadwalPerluDibuat; $j++) {
                // 1. Pilih hari yang UNIK
                do {
                    $hari = $faker->randomElement($hariPraktik);
                } while (in_array($hari, $hariYangSudahDipakai));

                $hariYangSudahDipakai[] = $hari;

                // 2. Tentukan jam praktik realistis (Pagi, Siang, atau Malam)
                $shift = $faker->randomElement(['Pagi', 'Siang', 'Malam']);

                if ($shift === 'Pagi') {
                    $jamMulai = Carbon::createFromTime($faker->numberBetween(7, 9), 0, 0);
                    $durasiJam = $faker->numberBetween(3, 5); // Durasi 3-5 jam
                } elseif ($shift === 'Siang') {
                    $jamMulai = Carbon::createFromTime($faker->numberBetween(13, 15), 0, 0);
                    $durasiJam = $faker->numberBetween(3, 4); // Durasi 3-4 jam
                } else { // Malam (khusus staf non-Dokter atau IGD)
                    $jamMulai = Carbon::createFromTime($faker->numberBetween(19, 21), 0, 0);
                    $durasiJam = $faker->numberBetween(4, 8); // Shift malam lebih panjang (4-8 jam)
                }

                $jamSelesai = Carbon::parse($jamMulai)->addHours($durasiJam);

                $jadwalData[] = [
                    'tenaga_medis_id' => $id,
                    'hari_praktik' => $hari,
                    'jam_mulai' => $jamMulai->format('H:i:s'),
                    'jam_selesai' => $jamSelesai->format('H:i:s'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert semua data sekaligus
        DB::table('jadwal_praktik')->insert($jadwalData);
        $this->command->info('Berhasil membuat ' . count($jadwalData) . ' jadwal praktik yang realistis.');
    }
}
