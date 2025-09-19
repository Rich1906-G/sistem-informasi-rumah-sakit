<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JadwalPraktikSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $tenagaMedisIds = DB::table('tenaga_medis')->pluck('id_tenaga_medis')->toArray();

        foreach ($tenagaMedisIds as $tenagaMedisId) {
            DB::table('jadwal_praktik')->insert([
                'tenaga_medis_id' => $tenagaMedisId,
                'hari_praktik' => $faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']),
                'jam_mulai' => $faker->randomElement(['08:00:00', '09:00:00', '13:00:00']),
                'jam_selesai' => $faker->randomElement(['12:00:00', '16:00:00', '17:00:00']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
