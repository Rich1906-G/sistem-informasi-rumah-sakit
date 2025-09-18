<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DetailPembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pembayaranIds = DB::table('pembayaran')->pluck('id_pembayaran')->toArray();
        $obatIds = DB::table('data_obat')->pluck('id_obat')->toArray();

        foreach ($pembayaranIds as $pembayaranId) {
            $jumlahItem = $faker->numberBetween(1, 3);
            for ($i = 0; $i < $jumlahItem; $i++) {
                $obatId = $faker->randomElement($obatIds);
                $jumlahObat = $faker->numberBetween(1, 5);
                $hargaSatuan = DB::table('data_obat')->where('id_obat', $obatId)->value('harga_jual_umum');
                $totalHargaItem = $hargaSatuan * $jumlahObat;

                DB::table('detail_pembayaran')->insert([
                    'pembayaran_id' => $pembayaranId,
                    'obat_id' => $obatId,
                    'jumlah_obat' => $jumlahObat,
                    'harga_satuan' => $hargaSatuan,
                    'total_harga_item' => $totalHargaItem,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
