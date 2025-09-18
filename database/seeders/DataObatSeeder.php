<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DataObatSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            DB::table('data_obat')->insert([
                'barcode' => $faker->unique()->isbn13,
                'nama_obat' => $faker->randomElement(['Amoxicillin', 'Paracetamol', 'Ibuprofen', 'Cetirizine', 'Omeprazole']),
                'nama_brand_farmasi' => $faker->company,
                'kategori_obat' => $faker->randomElement(['Analgesik', 'Antibiotik', 'Antihistamin']),
                'jenis' => $faker->randomElement(['Tablet', 'Sirup', 'Kapsul']),
                'satuan' => $faker->randomElement(['strip', 'botol', 'box']),
                'dosis' => $faker->randomFloat(2, 100, 500),
                'stok' => $faker->numberBetween(10, 500),
                'expired_date' => $faker->date,
                'nomor_batch' => $faker->unique()->lexify('###-??'),
                'harga_beli_satuan' => $faker->randomFloat(2, 5000, 20000),
                'harga_jual_umum' => $faker->randomFloat(2, 25000, 50000),
                'kandungan' => $faker->text(100),
                'is_kunci_harga' => $faker->boolean,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
