<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RiwayatPasienSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pasienIds = DB::table('pasien')->pluck('id_pasien')->toArray();

        foreach ($pasienIds as $pasienId) {
            DB::table('riwayat_pasien')->insert([
                'pasien_id' => $pasienId,
                'nama_alergi' => $faker->randomElement([null, 'Udang', 'Debu', 'Dingin']),
                'riwayat_penyakit_pasien' => $faker->randomElement([null, 'Diabetes', 'Hipertensi', 'Asma']),
                'riwayat_penyakit_keluarga' => $faker->randomElement([null, 'Diabetes', 'Jantung']),
                'riwayat_penggunaan_obat' => $faker->text(150),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
