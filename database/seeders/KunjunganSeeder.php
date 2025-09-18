<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KunjunganSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $pasienIds = DB::table('pasien')->pluck('id_pasien')->toArray();
        $tenagaMedisIds = DB::table('tenaga_medis')->pluck('id_tenaga_medis')->toArray();

        foreach ($pasienIds as $pasienId) {
            DB::table('kunjungan')->insert([
                'pasien_id' => $pasienId,
                'tenaga_medis_id' => $faker->randomElement($tenagaMedisIds),
                'tipe_pasien' => $faker->randomElement(['Umum', 'BPJS', 'Asuransi']),
                'nama_rs_perujuk' => $faker->randomElement([null, $faker->company]),
                'nama_dokter_perujuk' => $faker->randomElement([null, $faker->name('male')]),
                'penjamin' => $faker->randomElement(['diri sendiri', 'penanggung jawab']),
                'metode_pembayaran' => $faker->randomElement(['Tunai', 'Kartu Debit', 'Transfer Bank']),
                'jenis_kunjungan' => $faker->randomElement(['Rawat Jalan', 'Konsultasi']),
                'jenis_perawatan' => 'Rawat Jalan',
                'poli' => $faker->randomElement(['Poli Umum', 'Poli Anak', 'Poli Gigi']),
                'tanggal_kunjungan' => $faker->date(),
                'jam_kunjungan' => $faker->time(),
                'slot' => $faker->randomElement(['09:00', '10:00', '11:00', '13:00']),
                'lama_durasi_menit' => $faker->randomElement([15, 20, 30]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
