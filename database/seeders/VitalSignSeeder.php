<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class VitalSignSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kunjunganIds = DB::table('kunjungan')->pluck('id_kunjungan')->toArray();

        foreach ($kunjunganIds as $kunjunganId) {
            DB::table('vital_sign')->insert([
                'kunjungan_id' => $kunjunganId,
                'tinggi_badan' => $faker->randomFloat(2, 150, 190),
                'berat_badan' => $faker->randomFloat(2, 50, 90),
                'gula_darah' => $faker->randomFloat(2, 80, 150),
                'suhu_tubuh' => $faker->randomFloat(2, 36.0, 37.5),
                'sistole' => $faker->numberBetween(90, 140),
                'diastole' => $faker->numberBetween(60, 90),
                'laju_pernapasan' => $faker->numberBetween(12, 20),
                'lingkar_perut' => $faker->randomFloat(2, 70, 100),
                'denyut_nadi' => $faker->numberBetween(60, 100),
                'oksigen' => $faker->numberBetween(95, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
