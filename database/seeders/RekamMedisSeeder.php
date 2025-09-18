<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RekamMedisSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kunjunganIds = DB::table('kunjungan')->pluck('id_kunjungan')->toArray();

        foreach ($kunjunganIds as $kunjunganId) {
            DB::table('rekam_medis')->insert([
                'kunjungan_id' => $kunjunganId,
                'keluhan' => 'Pasien mengeluh ' . $faker->sentence(5),
                'prosedur_rencana' => $faker->sentence(10),
                'informasi_kondisi_pasien' => $faker->text(200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
