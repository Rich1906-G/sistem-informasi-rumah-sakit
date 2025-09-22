<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\TenagaMedis;

class JadwalPraktikSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Get the IDs of all existing medical staff
        $tenagaMedisIds = DB::table('tenaga_medis')->pluck('id_tenaga_medis');

        // Check if there are any medical staff to link to
        if ($tenagaMedisIds->isEmpty()) {
            $this->command->info('No medical staff found. Please run the tenaga_medis seeder first.');
            return;
        }

        // List of days of the week
        $hariPraktik = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        // Create 20 dummy records
        for ($i = 0; $i < 20; $i++) {
            // Select a random medical staff ID and day of the week
            $tenagaMedisId = $faker->randomElement($tenagaMedisIds);
            $hari = $faker->randomElement($hariPraktik);

            // Generate a realistic start time and end time
            $jamMulai = $faker->dateTimeBetween('08:00', '16:00')->format('H:00:00');
            $jamSelesai = $faker->dateTimeBetween($jamMulai, '19:00')->format('H:00:00');

            // Insert the data into the table
            DB::table('jadwal_praktik')->insert([
                'tenaga_medis_id' => $tenagaMedisId,
                'hari_praktik' => $hari,
                'jam_mulai' => $jamMulai,
                'jam_selesai' => $jamSelesai,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
