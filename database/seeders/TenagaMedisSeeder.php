<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TenagaMedisSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            DB::table('tenaga_medis')->insert([
                'foto_profile' => 'https://via.placeholder.com/150',
                'nama_lengkap' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'no_tlp' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'no_ktp' => $faker->unique()->nik(),
                'lembaga_registrasi_str' => $faker->company,
                'nomor_registrasi_str' => $faker->randomNumber(9),
                'masa_berlaku_str' => $faker->date,
                'lembaga_registrasi_sip' => $faker->company,
                'nomor_registrasi_sip' => $faker->randomNumber(9),
                'masa_berlaku_sip' => $faker->date,
                'gelar_depan' => $faker->randomElement(['dr.', 'drg.']),
                'gelar_belakang' => $faker->randomElement(['Sp.A', 'Sp.PD', 'Sp.OG']),
                'job_medis' => $faker->randomElement(['Dokter Umum', 'Dokter Gigi', 'Perawat']),
                'spesialis' => $faker->randomElement(['Anak', 'Penyakit Dalam', 'Kandungan']),
                'subspesialis' => null,
                'kode_antrian' => $faker->unique()->lexify('??-###'),
                'estimasi_waktu_menit' => $faker->randomElement([15, 20, 30]),
                'tanda_tangan' => 'https://via.placeholder.com/150',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
