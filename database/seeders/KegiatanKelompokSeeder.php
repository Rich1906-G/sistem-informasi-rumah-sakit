<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class KegiatanKelompokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $records = [];
        $now = now();

        // Asumsi ID Tenaga Medis yang ada
        $maxTenagaMedisId = 4;

        // Daftar nama kegiatan yang realistis
        $kegiatanList = [
            ['Grup Senam Jantung Sehat', 20000, 'Senam rutin untuk pasien jantung dan manula.', 'dr. Budi Setiawan, Sp.JP'],
            ['Edukasi Gizi Seimbang Anak', 0, 'Sesi tanya jawab dengan ahli gizi tentang MPASI dan pertumbuhan anak.', 'Ahli Gizi, Ns. Rina'],
            ['Klub Diabetes: Hidup Manis Tanpa Gula', 15000, 'Pertemuan bulanan membahas kontrol gula darah dan resep sehat.', 'dr. Siti Rahma, Sp.PD'],
            ['Pelatihan P3K Dasar untuk Keluarga', 50000, 'Workshop praktis penanganan cedera ringan dan kegawatdaruratan di rumah.', 'Perawat Senior, Ns. Adi'],
            ['Workshop Kesehatan Mental dan Stres Kerja', 30000, 'Sesi mindfulness dan tips manajemen stres bagi pekerja kantoran.', 'Psikolog Klinis'],
        ];

        for ($i = 1; $i <= 20; $i++) {
            $baseKegiatan = $faker->randomElement($kegiatanList);

            // Tanggal Pelaksanaan: 10 hari ke depan (rencana) hingga 10 hari ke belakang (selesai)
            $tanggalPelaksanaan = $faker->dateTimeBetween('-10 days', '+10 days');


            // Status: Selesai jika tanggal pelaksanaan sudah lewat, Rencana jika masih di masa depan
            $status = (Carbon::parse($tanggalPelaksanaan)->isPast()) ? 'Selesai' : 'Rencana';

            $records[] = [
                'nama_club' => $baseKegiatan[0],
                'deskripsi' => $baseKegiatan[2],
                'pembicara' => $baseKegiatan[3],

                'tanggal_pelaksanaan' => $tanggalPelaksanaan,
                'biaya' => $baseKegiatan[1],
                'tenaga_medis_id' => $faker->numberBetween(1, $maxTenagaMedisId),
                'status' => $status,
                'created_at' => $faker->dateTimeBetween('-30 days', '-1 day'),
                'updated_at' => $now,
            ];

            // Tambahkan variasi kegiatan yang sama
            if ($i % 4 == 0) {
                $kegiatanList = array_merge($kegiatanList, [
                    ['Grup Senam Jantung Sehat - Sesi 2', 20000, 'Sesi lanjutan senam jantung.', 'dr. Budi Setiawan, Sp.JP'],
                ]);
            }
        }

        DB::table('kegiatan_kelompok')->insert($records);
    }
}
