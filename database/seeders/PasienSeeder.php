<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PasienSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            DB::table('pasien')->insert([
                'pas_foto' => 'https://via.placeholder.com/150',
                'nama_lengkap' => $faker->name,
                'nomor_rm' => $faker->unique()->randomNumber(8),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date(),
                'nomor_ktp' => $faker->unique()->nik(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'status' => $faker->randomElement(['Menikah', 'Belum Menikah']),
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'pendidikan_terakhir' => $faker->randomElement(['SMA', 'D3', 'S1', 'S2']),
                'pekerjaan' => $faker->jobTitle,
                'no_tlp' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'tanggal_pendaftaran' => $faker->date(),
                'alamat_rumah' => $faker->address,
                'provinsi' => $faker->state,
                'kota_kabupaten' => $faker->city,
                'kecamatan' => $faker->city,
                'kelurahan' => $faker->city,
                'kode_pos' => $faker->postcode,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
