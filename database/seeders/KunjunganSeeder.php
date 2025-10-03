<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KunjunganSeeder extends Seeder
{
    /**
     * Run the migrations.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $records = [];
        $now = now();

        // Asumsi ID yang sudah ada di tabel relasi
        $maxPasienId = 10;
        $maxTenagaMedisId = 4;
        $poliIds = [1, 2, 3, 4, 5]; // ID Poli umum (misalnya 1=Umum, 2=Gigi, dst.)
        $poliUgdId = 21; // ID Poli UGD
        $poliKunjunganSehatId = 1; // Asumsi Kunjungan Sehat sering di Poli Umum (ID 1)
        $penjaminIds = [1, 2, 3, 4, 5];

        $totalRecords = 30; // Meningkatkan jumlah total untuk variasi data UGD dan Sehat

        for ($i = 1; $i <= $totalRecords; $i++) {

            // Tentukan jenis kunjungan dengan bobot (Rawat Jalan Biasa paling banyak)
            $kunjunganType = $faker->randomElement([
                'UGD',
                'Sehat',
                'Biasa',
                'Biasa',
                'Biasa',
                'Biasa',
                'Biasa',
                'Promotif Preventif'
            ]);

            $pasienId = $faker->numberBetween(1, $maxPasienId);
            $tenagaMedisId = $faker->numberBetween(1, $maxTenagaMedisId);
            $status = $faker->randomElement(['Succeed', 'Succeed', 'Confirmed', 'Pending', 'Waiting']);
            $isDone = ($status == 'Succeed');

            $tingkatTriase = null;
            $aktivitasKunjungan = null; // Inisialisasi field baru

            // --- Logika Penentuan Jenis Kunjungan & Poli ---
            if ($kunjunganType == 'UGD') {
                $poliId = $poliUgdId;
                $jenisKunjungan = 'Gawat Darurat';
                $jenisPerawatan = 'IGD';
                $tingkatTriase = $faker->randomElement(['Merah', 'Kuning', 'Hijau', 'Hitam', 'Putih']);
            } elseif ($kunjunganType == 'Sehat') {
                $poliId = $poliKunjunganSehatId;
                $jenisKunjungan = 'Kunjungan Sehat';
                $jenisPerawatan = 'Rawat Jalan';
                $aktivitasKunjungan = $faker->randomElement(['Check-up Rutin', 'Imunisasi', 'Konsultasi Gizi', 'Skrining']); // Isi aktivitas

            } elseif ($kunjunganType == 'Promotif Preventif') {
                $poliId = $poliKunjunganSehatId;
                $jenisKunjungan = 'Promotif Preventif';
                $jenisPerawatan = 'Rawat Jalan';
            } else { // Biasa (Rawat Jalan Poli atau Antri Cepat)
                $poliId = $faker->randomElement($poliIds);
                $jenisKunjungan = $faker->randomElement(['Rawat Jalan Poli', 'Antri Cepat']);
                $jenisPerawatan = 'Rawat Jalan';
            }


            // Logika Tipe Pasien
            $tipePasien = $faker->randomElement(['Non Rujuk', 'Non Rujuk', 'Rujuk']);
            $isRujuk = ($tipePasien == 'Rujuk');

            $namaRSPerujuk = $isRujuk ? $faker->randomElement(['RSUD Bunda', 'Puskesmas Sehat', 'Klinik Medika']) : null;
            $namaDokterPerujuk = $isRujuk ? 'Dr. ' . $faker->lastName . ', Sp.' . $faker->randomElement(['A', 'PD', 'THT']) : null;

            // Logika Penjamin
            $penjaminId = $faker->randomElement([1, 1, 1, 2, 2, 3, 4, 5]);

            // Logika Waktu
            $waktuKunjungan = Carbon::parse($faker->dateTimeBetween('-5 days', 'now'));
            $jamKunjungan = $waktuKunjungan->format('H:i:s');

            $waktuMulaiPemeriksaan = ($status == 'Confirmed' || $isDone)
                ? Carbon::parse($waktuKunjungan)->addMinutes($faker->numberBetween(5, 30))
                : null;

            $tanggalPulang = $isDone
                ? Carbon::parse($waktuMulaiPemeriksaan)->addMinutes($faker->numberBetween(30, 120))
                : null;

            // Pastikan kunjungan yang belum selesai tidak punya tanggal pulang
            if ($status != 'Succeed') {
                $tanggalPulang = null;
            }

            $records[] = [
                'pasien_id' => $pasienId,
                'tenaga_medis_id' => $tenagaMedisId,
                'poli_id' => $poliId,
                'kode_antrian' => strtoupper($faker->randomLetter) . str_pad($i, 3, '0', STR_PAD_LEFT),
                'tipe_pasien' => $tipePasien,
                'nama_rs_perujuk' => $namaRSPerujuk,
                'nama_dokter_perujuk' => $namaDokterPerujuk,
                'penjamin_id' => $penjaminId,
                'jenis_kunjungan' => $jenisKunjungan,
                'jenis_perawatan' => $jenisPerawatan,
                'tanggal_kunjungan' => $waktuKunjungan->toDateString(),
                'jam_kunjungan' => $jamKunjungan,
                'waktu_mulai_pemeriksaan' => $waktuMulaiPemeriksaan,
                'status' => $status,
                'slot' => $faker->randomElement(['Pagi', 'Siang', 'Sore']),
                'lama_durasi_menit' => $faker->numberBetween(15, 60),
                'tingkat_triase' => $tingkatTriase,
                'tanggal_pulang' => $tanggalPulang,
                'aktivitas_kunjungan' => $aktivitasKunjungan, // FIELD BARU UNTUK KUNJUNGAN SEHAT
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('kunjungan')->insert($records);
    }
}
