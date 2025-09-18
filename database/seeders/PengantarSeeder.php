<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PengantarSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kunjunganIds = DB::table('kunjungan')->pluck('id_kunjungan')->toArray();

        foreach ($kunjunganIds as $kunjunganId) {
            DB::table('pengantar')->insert([
                'kunjungan_id' => $kunjunganId,
                'nama_lengkap' => $faker->name,
                'hubungan_dengan_pasien' => $faker->randomElement(['Orang Tua', 'Saudara', 'Teman']),
                'alamat' => $faker->address,
                'no_tlp' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
