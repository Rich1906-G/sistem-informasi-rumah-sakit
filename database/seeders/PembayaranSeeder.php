<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Kunjungan;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Get the IDs of all existing visits
        $kunjunganIds = DB::table('kunjungan')->pluck('id_kunjungan');

        // Stop if no visits are found
        if ($kunjunganIds->isEmpty()) {
            $this->command->info('Tidak ada kunjungan ditemukan. Silakan jalankan seeder kunjungan terlebih dahulu.');
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            $kunjunganId = $faker->unique()->randomElement($kunjunganIds);

            // Get the visit date to ensure the payment date is after it
            $kunjungan = DB::table('kunjungan')->where('id_kunjungan', $kunjunganId)->first();
            $tanggalKunjungan = $kunjungan->tanggal_kunjungan;

            // Generate a realistic payment date/time
            $tanggalPembayaran = $faker->dateTimeBetween($tanggalKunjungan, 'now');

            // Generate a realistic total cost
            $totalBiaya = $faker->randomFloat(2, 50000, 2500000);

            // 80% chance that the medication was dispensed
            $waktuObatDiserahkan = $faker->boolean(80) ? $faker->dateTimeBetween($tanggalPembayaran, 'now') : null;

            DB::table('pembayaran')->insert([
                'kunjungan_id' => $kunjunganId,
                'tanggal_pembayaran' => $tanggalPembayaran,
                'total_biaya' => $totalBiaya,
                'waktu_obat_diserahkan' => $waktuObatDiserahkan,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
