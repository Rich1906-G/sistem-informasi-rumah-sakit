<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PsikososialSpiritualSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pasienIds = DB::table('pasien')->pluck('id_pasien')->toArray();

        foreach ($pasienIds as $pasienId) {
            DB::table('psikososial_spiritual')->insert([
                'pasien_id' => $pasienId,
                'kondisi_psikologis' => $faker->randomElement(['Baik', 'Stabil', 'Cemas']),
                'status_menikah' => $faker->randomElement(['Menikah', 'Belum Menikah', 'Cerai', 'Janda/Duda']),
                'tinggal_dengan' => $faker->randomElement(['Keluarga', 'Sendiri', 'Teman']),
                'pekerjaan' => $faker->jobTitle,
                'kegiatan_keagamaan_rutin' => $faker->text(100),
                'kegiatan_spiritual_dibutuhkan' => $faker->text(100),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
