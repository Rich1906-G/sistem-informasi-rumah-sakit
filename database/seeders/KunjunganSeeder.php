<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kunjungan;
use App\Models\RekamMedis;
use App\Models\Pembayaran;

class KunjunganSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil data dari tabel terkait (KOREKSI: Menggunakan 'data_pasien')
        $pasienIds = DB::table('pasien')->pluck('id_pasien');
        $tenagaMedisData = DB::table('tenaga_medis')->select('id_tenaga_medis', 'kode_antrian')->get();
        $poliIds = DB::table('poli')->pluck('id_poli');

        // Pastikan ada data di tabel terkait
        if ($pasienIds->isEmpty() || $tenagaMedisData->isEmpty() || $poliIds->isEmpty()) {
            $this->command->info('Tidak ada data di tabel data_pasien, tenaga_medis, atau poli. Silakan jalankan seeder terkait terlebih dahulu.');
            return;
        }

        $tipePasien = ['Umum', 'BPJS', 'Rujuk'];
        $penjamin = ['Diri Sendiri', 'Perusahaan', 'Asuransi'];
        $metodePembayaran = ['Tunai', 'Kartu Debit', 'Transfer Bank'];
        $jenisKunjungan = ['Rawat Jalan Poli', 'Antri Cepat', 'Gawat Darurat', 'Kunjungan Sehat', 'Promotif Preventif'];
        $jenisPerawatan = ['Rawat Jalan', 'Rawat Inap', 'IGD'];
        $statusKunjungan = ['Pending', 'Confirmed', 'Waiting', 'Engaged', 'Succeed'];
        $slot = ['Pagi', 'Siang', 'Sore', 'Malam'];

        // Inisialisasi counter antrian harian (per prefix/dokter)
        $antrianCounter = [];

        for ($i = 0; $i < 50; $i++) { // HANYA SATU LOOP
            $currentTipePasien = $faker->randomElement($tipePasien);

            // 1. Pilih Tenaga Medis dan Ambil Data Kunci
            $selectedTenagaMedis = $faker->randomElement($tenagaMedisData);
            $tenagaMedisId = $selectedTenagaMedis->id_tenaga_medis;
            $kodeAntrianPrefix = $selectedTenagaMedis->kode_antrian;

            // 2. LOGIKA PENGHITUNG KODE ANTRIAN LENGKAP (Dikerjakan di setiap iterasi)
            if (!isset($antrianCounter[$kodeAntrianPrefix])) {
                $antrianCounter[$kodeAntrianPrefix] = 1;
            } else {
                $antrianCounter[$kodeAntrianPrefix]++;
            }

            // Bentuk kode antrian lengkap (misal: DR-U01-005)
            $nomorAntrianUrut = str_pad($antrianCounter[$kodeAntrianPrefix], 3, '0', STR_PAD_LEFT);
            $kodeAntrianLengkap = $kodeAntrianPrefix . '-' . $nomorAntrianUrut;

            // ---- LOGIKA WAKTU BERURUTAN ----

            // Waktu Kunjungan: dari 30 hari yang lalu hingga sekarang
            $waktuKunjungan = $faker->dateTimeBetween('-30 days', 'now');

            // Logika default untuk kunjungan yang belum/baru terjadi
            $waktuMulaiPemeriksaan = null;
            $waktuResepSelesai = null;
            $waktuObatDiserahkan = null;
            $status = $faker->randomElement(['Pending', 'Confirmed', 'Waiting']);
            $lamaDurasiMenit = $faker->numberBetween(5, 30); // Estimasi Durasi

            // Tentukan apakah kunjungan sudah selesai (sekitar 70% selesai)
            if ($faker->boolean(70)) {
                $status = 'Succeed';

                // Set waktu berurutan hanya jika status Selesai
                $waktuKunjungan = $faker->dateTimeBetween('-30 days', '-1 day'); // Kunjungan lama
                $waktuMulaiPemeriksaan = Carbon::parse($waktuKunjungan)->addMinutes($faker->numberBetween(5, 20));
                $waktuResepSelesai = Carbon::parse($waktuMulaiPemeriksaan)->addMinutes($faker->numberBetween(15, 40));
                $waktuObatDiserahkan = Carbon::parse($waktuResepSelesai)->addMinutes($faker->numberBetween(5, 30));
                $lamaDurasiMenit = Carbon::parse($waktuMulaiPemeriksaan)->diffInMinutes($waktuResepSelesai);
            }

            // Data Perujuk (Hanya ada jika tipe pasien 'Rujuk')
            $namaRsPerujuk = ($currentTipePasien === 'Rujuk') ? $faker->company() : null;
            $namaDokterPerujuk = ($currentTipePasien === 'Rujuk') ? $faker->name() : null;

            // Buat entri kunjungan
            $kunjungan = Kunjungan::create([
                'pasien_id' => $faker->randomElement($pasienIds),
                'tenaga_medis_id' => $tenagaMedisId,
                'poli_id' => $faker->randomElement($poliIds),
                'kode_antrian' => $kodeAntrianLengkap, // FIELD BARU
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

            // Hanya buat Rekam Medis dan Pembayaran jika kunjungan berstatus Selesai (Succeed)
            if ($status === 'Succeed') {
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
                    'tanggal_pembayaran' => $waktuObatDiserahkan,
                    'total_biaya' => $faker->randomFloat(2, 50000, 2500000),
                    'waktu_obat_diserahkan' => $waktuObatDiserahkan,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
