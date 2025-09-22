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

        $jobMedis = ['Dokter', 'Perawat', 'Apoteker', 'Bidan', 'Analis Kesehatan'];
        $spesialisasi = ['Penyakit Dalam', 'Anak', 'Bedah', 'Kandungan', 'Mata', 'Gigi', 'Umum'];
        $subspesialisasi = ['Kardiologi', 'Neonatologi', 'Ortopedi', 'Onkologi', 'Endokrinologi', null];
        $gelarDepan = ['dr.', 'drg.', 'Ns.', 'Apt.', 'AmKeb.'];
        $gelarBelakang = ['Sp.PD', 'Sp.A', 'Sp.B', 'Sp.OG', 'Sp.M', 'Sp.KG', null];
        $jenisKelamin = ['Laki-laki', 'Perempuan'];

        for ($i = 0; $i < 20; $i++) {
            $jenisKelaminAcak = $faker->randomElement($jenisKelamin);
            $jobMedisAcak = $faker->randomElement($jobMedis);
            $namaLengkap = ($jenisKelaminAcak === 'Laki-laki') ? $faker->name('male') : $faker->name('female');

            $gelarDepanAcak = null;
            $spesialisasiAcak = null;
            $subspesialisasiAcak = null;
            $gelarBelakangAcak = null;

            if ($jobMedisAcak === 'Dokter') {
                $gelarDepanAcak = $faker->randomElement(['dr.', 'drg.']);
                $spesialisasiAcak = $faker->randomElement($spesialisasi);
                $subspesialisasiAcak = $faker->randomElement($subspesialisasi);
                $gelarBelakangAcak = $faker->randomElement($gelarBelakang);
            } elseif ($jobMedisAcak === 'Perawat') {
                $gelarDepanAcak = 'Ns.';
            } elseif ($jobMedisAcak === 'Apoteker') {
                $gelarDepanAcak = 'Apt.';
            } elseif ($jobMedisAcak === 'Bidan') {
                $gelarDepanAcak = 'Bd.';
            }

            DB::table('tenaga_medis')->insert([
                'foto_profile' => null,
                'nama_lengkap' => $namaLengkap,
                'jenis_kelamin' => $jenisKelaminAcak,
                'no_tlp' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'no_ktp' => $faker->unique()->nik(),
                'lembaga_registrasi_str' => 'IDI',
                'nomor_registrasi_str' => $faker->unique()->uuid(),
                'masa_berlaku_str' => $faker->dateTimeBetween('+1 year', '+5 years'),
                'lembaga_registrasi_sip' => 'Dinkes',
                'nomor_registrasi_sip' => $faker->unique()->uuid(),
                'masa_berlaku_sip' => $faker->dateTimeBetween('+1 year', '+5 years'),
                'gelar_depan' => $gelarDepanAcak,
                'gelar_belakang' => $gelarBelakangAcak,
                'job_medis' => $jobMedisAcak,
                'spesialis' => $spesialisasiAcak,
                'subspesialis' => $subspesialisasiAcak,
                'kode_antrian' => $faker->lexify('????'),
                'estimasi_waktu_menit' => $faker->numberBetween(5, 30),
                'tanda_tangan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
