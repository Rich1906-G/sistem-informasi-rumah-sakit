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
        $jenisKelamin = ['Laki-laki', 'Perempuan'];
        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        $statusKawin = ['Belum Menikah', 'Menikah', 'Cerai Hidup', 'Cerai Mati'];
        $golonganDarah = ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'];
        $pendidikan = ['SMP dan Sebelumnya', 'SMA', 'Diploma(D3)', 'Sarjana(S1)', 'Master(2)'];
        $jobTitle = ['Pengacara', 'Notaris', 'Dokter', 'Bidan', 'perawat', 'Apoteker', 'Psikiater', 'Psikolog', 'Petani', 'Nelayan', 'Honorer', 'Lainnya', 'Tidak Bekerja'];

        for ($i = 0; $i < 20; $i++) {
            $jenisKelaminAcak = $faker->randomElement($jenisKelamin);
            $namaLengkap = ($jenisKelaminAcak === 'Laki-laki') ? $faker->name('male') : $faker->name('female');

            DB::table('pasien')->insert([
                'pas_foto' => $faker->imageUrl(),
                'nama_lengkap' => $namaLengkap,
                'nomor_rm' => $faker->unique()->randomNumber(8),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2000-01-01'),
                'nomor_ktp' => $faker->unique()->nik(),
                'jenis_kelamin' => $jenisKelaminAcak,
                'agama' => $faker->randomElement($agama),
                'status' => $faker->randomElement($statusKawin),
                'golongan_darah' => $faker->randomElement($golonganDarah),
                'pendidikan_terakhir' => $faker->randomElement($pendidikan),
                'pekerjaan' => $faker->randomElement($jobTitle),
                'no_tlp' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'tanggal_pendaftaran' => $faker->dateTimeThisYear(), // Tanggal pendaftaran di tahun ini
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
