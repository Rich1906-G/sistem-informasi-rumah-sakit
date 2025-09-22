<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        $jenisKunjungan = ['Kunjungan Sakit', 'Kunjungan Sehat', 'Kunjungan Kontrol', 'Kunjungan Rujukan', 'Kunjungan Gawat Darurat'];
        $jenisPerawatan = ['Rawat Jalan', 'Rawat Inap', 'IGD'];
        $statusKunjungan = ['Antri', 'Diperiksa', 'Selesai', 'Batal'];
        $slot = ['Pagi', 'Siang', 'Sore', 'Malam'];

        for ($i = 0; $i < 50; $i++) {
            $currentTipePasien = $faker->randomElement($tipePasien);

            $waktuKunjungan = $faker->dateTimeThisMonth();
            $durasiRandom = $faker->numberBetween(1, 120);
            $waktuTungguRandom = $faker->numberBetween(5, 60);

            $waktuMulaiPemeriksaan = Carbon::parse($waktuKunjungan)->addMinutes($waktuTungguRandom);
            $status = ($waktuMulaiPemeriksaan < now()) ? 'Selesai' : 'Antri';

            // Atur nilai null
            $namaRsPerujuk = ($currentTipePasien === 'Rujuk') ? $faker->company() : null;
            $namaDokterPerujuk = ($currentTipePasien === 'Rujuk') ? $faker->name() : null;

            DB::table('kunjungan')->insert([
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
                'lama_durasi_menit' => $durasiRandom,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
