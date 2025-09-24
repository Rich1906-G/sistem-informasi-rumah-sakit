<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Kunjungan;
use App\Models\RekamMedis;
use App\Models\Pembayaran;

class KunjunganSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID yang diperlukan dari tabel lain
        $pasienIds = DB::table('pasien')->pluck('id_pasien');
        $tenagaMedisIds = DB::table('tenaga_medis')->pluck('id_tenaga_medis');
        $poliIds = DB::table('poli')->pluck('id_poli');

        // Pastikan ada data di tabel terkait
        if ($pasienIds->isEmpty() || $tenagaMedisIds->isEmpty() || $poliIds->isEmpty()) {
            $this->command->info('Tidak ada data di tabel pasien, tenaga_medis, atau poli. Silakan jalankan seeder terkait terlebih dahulu.');
            return;
        }

        $tipePasien = ['Umum', 'BPJS', 'Rujuk'];
        $penjamin = ['Diri Sendiri', 'Perusahaan', 'Asuransi'];
        $metodePembayaran = ['Tunai', 'Kartu Debit', 'Transfer Bank'];
        $jenisKunjungan = ['Antri Cepat', 'Kunjungan Sakit', 'Kunjungan Sehat', 'Kunjungan Kontrol', 'Kunjungan Rujukan', 'Kunjungan Gawat Darurat'];
        $jenisPerawatan = ['Rawat Jalan', 'Rawat Inap', 'IGD'];
        $statusKunjungan = ['Pending', 'Confirmed', 'Waiting', 'Engaged', 'Succeed'];
        $slot = ['Pagi', 'Siang', 'Sore', 'Malam'];

        for ($i = 0; $i < 50; $i++) {
            $currentTipePasien = $faker->randomElement($tipePasien);

            // ---- LOGIKA PENTING: PENGATURAN WAKTU BERURUTAN ----

            // 1. Waktu Kunjungan (awal dari semua alur waktu)
            $waktuKunjungan = $faker->dateTimeThisMonth();

            // 2. Waktu Mulai Pemeriksaan (5-20 menit setelah jam_kunjungan)
            $waktuMulaiPemeriksaan = Carbon::parse($waktuKunjungan)->addMinutes($faker->numberBetween(5, 20));

            // 3. Waktu Resep Selesai (15-40 menit setelah waktu mulai pemeriksaan)
            $waktuResepSelesai = Carbon::parse($waktuMulaiPemeriksaan)->addMinutes($faker->numberBetween(15, 40));

            // 4. Waktu Obat Diserahkan (5-30 menit setelah waktu resep selesai)
            $waktuObatDiserahkan = Carbon::parse($waktuResepSelesai)->addMinutes($faker->numberBetween(5, 30));

            // ---- END LOGIKA PENGATURAN WAKTU ----

            // Hitung durasi
            $lamaDurasiMenit = Carbon::parse($waktuMulaiPemeriksaan)->diffInMinutes($waktuResepSelesai);
            $status = ($waktuObatDiserahkan < now()) ? 'Succeed' : 'Pending';
            $namaRsPerujuk = ($currentTipePasien === 'Rujuk') ? $faker->company() : null;
            $namaDokterPerujuk = ($currentTipePasien === 'Rujuk') ? $faker->name() : null;

            // Buat entri kunjungan
            $kunjungan = Kunjungan::create([
                'pasien_id' => $faker->randomElement($pasienIds),
                'tenaga_medis_id' => $faker->randomElement($tenagaMedisIds),
                'poli_id' => $faker->randomElement($poliIds),
                'tipe_pasien' => $currentTipePasien,
                'nama_rs_perujuk' => $namaRsPerujuk,
                'nama_dokter_perujuk' => $namaDokterPerujuk,
                'penjamin' => $faker->randomElement($penjamin),
                'metode_pembayaran' => $faker->randomElement($metodePembayaran),
                'jenis_kunjungan' => $faker->randomElement($jenisKunjungan),
                'jenis_perawatan' => $faker->randomElement($jenisPerawatan),
                'tanggal_kunjungan' => $waktuKunjungan->format('Y-m-d'),
                'jam_kunjungan' => $waktuKunjungan->format('H:i:s'),
                'waktu_mulai_pemeriksaan' => $waktuMulaiPemeriksaan,
                'status' => $status,
                'slot' => $faker->randomElement($slot),
                'lama_durasi_menit' => $lamaDurasiMenit,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Buat entri rekam medis
            RekamMedis::create([
                'kunjungan_id' => $kunjungan->id_kunjungan,
                'waktu_resep_selesai' => $waktuResepSelesai,
                'keluhan' => $faker->sentence(10, true),
                'prosedur_rencana' => $faker->paragraph(3, true),
                'informasi_kondisi_pasien' => $faker->paragraph(2, true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Buat entri pembayaran
            Pembayaran::create([
                'kunjungan_id' => $kunjungan->id_kunjungan,
                'tanggal_pembayaran' => $waktuObatDiserahkan, // Menggunakan waktu yang sama
                'total_biaya' => $faker->randomFloat(2, 50000, 2500000),
                'waktu_obat_diserahkan' => $waktuObatDiserahkan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
