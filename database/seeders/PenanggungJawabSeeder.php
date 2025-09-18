<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenanggungJawabSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pasienIds = DB::table('pasien')->pluck('id_pasien')->toArray();

        foreach ($pasienIds as $pasienId) {
            DB::table('penanggung_jawab')->insert([
                'pasien_id' => $pasienId,
                'nama_lengkap' => $faker->name,
                'hubungan_dengan_pasien' => $faker->randomElement(['Istri', 'Suami', 'Anak', 'Orang Tua', 'Saudara Kandung']),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'golongan_darah' => $faker->randomElement(['A', 'B', 'AB', 'O']),
                'pekerjaan' => $faker->jobTitle,
                'tanggal_lahir' => $faker->date(),
                'no_tlp' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'alamat_sama_dengan_pasien' => $faker->boolean,
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
