<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kunjunganIds = DB::table('kunjungan')->pluck('id_kunjungan')->toArray();

        foreach ($kunjunganIds as $kunjunganId) {
            $totalBiaya = $faker->randomFloat(2, 50000, 500000);
            DB::table('pembayaran')->insert([
                'kunjungan_id' => $kunjunganId,
                'tanggal_pembayaran' => $faker->dateTimeThisMonth(),
                'total_biaya' => $totalBiaya,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
