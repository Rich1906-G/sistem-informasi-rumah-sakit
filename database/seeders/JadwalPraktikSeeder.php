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
        $tenagaMedisData = DB::table('tenaga_medis')
            ->select('id_tenaga_medis', 'job_medis')
            ->get();

        if ($tenagaMedisData->isEmpty()) {
            $this->command->info('Tidak ada data tenaga medis ditemukan. Silakan jalankan seeder tenaga medis terlebih dahulu.');
            return;
        }

        $jadwalData = [];
        // Rentang waktu pembuatan dummy data (Hari ini hingga 30 hari ke depan)
        $jumlahHariKeDepan = 30;
        $tanggalMulai = Carbon::today();

        $this->command->info("Membuat jadwal praktik dari {$tanggalMulai->format('d M')} hingga {$tanggalMulai->copy()->addDays($jumlahHariKeDepan)->format('d M')}...");

        // Loop melalui SETIAP tenaga medis
        foreach ($tenagaMedisData as $tenagaMedis) {
            $id = $tenagaMedis->id_tenaga_medis;
            $job = $tenagaMedis->job_medis;

            // Tentukan jumlah hari praktik yang direncanakan per minggu (sebagai pola)
            if (str_contains($job, 'Dokter')) {
                // Dokter/Spesialis: 3-5 hari seminggu
                $hariPraktikPerMinggu = $faker->numberBetween(3, 5);
            } else {
                // Tenaga Medis lain (Perawat/Bidan): 5-7 hari seminggu
                $hariPraktikPerMinggu = $faker->numberBetween(5, 7);
            }

            // Randomly pilih hari-hari dalam seminggu yang akan menjadi "pola" jadwal dokter ini
            $hariPola = $faker->randomElements(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], $hariPraktikPerMinggu);

            // Tentukan shift dan durasi jam untuk tenaga medis ini
            $shiftPola = $faker->randomElement(['Pagi', 'Siang', 'Malam']);
            $jamMulaiPola = null;
            $durasiJamPola = 0;

            if ($shiftPola === 'Pagi') {
                $jamMulaiPola = $faker->dateTimeBetween('07:00', '09:00')->format('H:i:s');
                $durasiJamPola = $faker->numberBetween(3, 5);
            } elseif ($shiftPola === 'Siang') {
                $jamMulaiPola = $faker->dateTimeBetween('13:00', '15:00')->format('H:i:s');
                $durasiJamPola = $faker->numberBetween(3, 4);
            } else { // Malam
                $jamMulaiPola = $faker->dateTimeBetween('19:00', '21:00')->format('H:i:s');
                $durasiJamPola = $faker->numberBetween(4, 8);
            }

            // Loop melalui setiap hari dalam rentang 30 hari
            for ($i = 0; $i <= $jumlahHariKeDepan; $i++) {
                $tanggalSaatIni = $tanggalMulai->copy()->addDays($i);
                $namaHariInggris = $tanggalSaatIni->format('l'); // 'Monday', 'Tuesday', dll.

                // Cek apakah hari saat ini termasuk dalam pola hari praktik dokter ini
                if (in_array($namaHariInggris, $hariPola)) {
                    // Jadwal didasarkan pada pola yang sudah ditetapkan
                    $jamMulai = Carbon::parse($jamMulaiPola);
                    $jamSelesai = Carbon::parse($jamMulai)->addHours($durasiJamPola);

                    // Tambahkan variasi jam mulai (misalnya 50% kemungkinan) agar terlihat lebih acak
                    if ($faker->boolean(50)) {
                        $jamMulai->addMinutes($faker->randomElement([0, 15, 30]));
                        $jamSelesai->addMinutes($faker->randomElement([0, 15, 30]));
                    }

                    $jadwalData[] = [
                        'tenaga_medis_id' => $id,
                        // GUNAKAN KOLOM BARU TANGGAL PRAKTIK
                        'tanggal_praktik' => $tanggalSaatIni->toDateString(),
                        'jam_mulai' => $jamMulai->format('H:i:s'),
                        'jam_selesai' => $jamSelesai->format('H:i:s'),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        // Insert semua data sekaligus
        DB::table('jadwal_praktik')->insert($jadwalData);
        $this->command->info('Berhasil membuat ' . count($jadwalData) . ' jadwal praktik spesifik tanggal.');
    }
}
