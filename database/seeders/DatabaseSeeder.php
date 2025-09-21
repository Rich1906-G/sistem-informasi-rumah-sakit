<?php

namespace Database\Seeders;

use App\Models\KategoriObat;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // no fk
        $this->call([
            PasienSeeder::class,
            TenagaMedisSeeder::class,
            KategoriObatSeeder::class,
            SatuanObatSeeder::class,
            DataObatSeeder::class,
            PoliSeeder::class,
            SupplierSeeder::class,
        ]);


        $this->call([
            PenanggungJawabSeeder::class,
            KunjunganSeeder::class,
            RekamMedisSeeder::class,
            VitalSignSeeder::class,
            RiwayatPasienSeeder::class,
            PsikososialSpiritualSeeder::class,
            PengantarSeeder::class,
            JadwalPraktikSeeder::class,
            PembayaranSeeder::class,
            PembelianObatSeeder::class,
            DetailPembelianObatSeeder::class,
            ResepObatSeeder::class,
            DetailPembayaranSeeder::class,
            TenagaMedisPoliSeeder::class,
        ]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
