<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class DetailPesertaKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $records = [];
        $now = now();

        // Asumsi ID Kegiatan dan ID Pasien yang ada
        $maxKegiatanId = 20; // Sesuai dengan jumlah record di KegiatanKelompokSeeder
        $maxPasienId = 10;

        $kombinasi = [];

        for ($i = 1; $i <= 20; $i++) {
            $kegiatanId = $faker->numberBetween(1, $maxKegiatanId);
            $pasienId = $faker->numberBetween(1, $maxPasienId);

            // Logika untuk menghindari duplikasi peserta pada kegiatan yang sama
            while (in_array([$kegiatanId, $pasienId], $kombinasi)) {
                $kegiatanId = $faker->numberBetween(1, $maxKegiatanId);
                $pasienId = $faker->numberBetween(1, $maxPasienId);
            }
            $kombinasi[] = [$kegiatanId, $pasienId];

            // Dapatkan tanggal pelaksanaan dari Kegiatan (diperlukan untuk tanggal hadir)
            $kegiatan = DB::table('kegiatan_kelompok')->where('id_kegiatan', $kegiatanId)->first();

            // Tanggal Hadir harus sekitar tanggal pelaksanaan
            $tanggalPelaksanaan = Carbon::parse($kegiatan->tanggal_pelaksanaan);
            $tanggalHadir = $tanggalPelaksanaan->copy()->addMinutes($faker->numberBetween(0, 15)); // Sedikit terlambat dari jadwal

            // Status pembayaran: Lunas jika biayanya > 0 dan status kegiatan Selesai
            $statusPembayaran = ($kegiatan->biaya > 0 && $kegiatan->status == 'Selesai')
                ? $faker->boolean(80) // 80% lunas
                : true; // Gratis dianggap lunas

            $records[] = [
                'kegiatan_id' => $kegiatanId,
                'pasien_id' => $pasienId,
                'tanggal_hadir' => $tanggalHadir,
                'status_pembayaran' => $statusPembayaran,
                'catatan' => $faker->randomElement([null, 'Sangat antusias', 'Datang terlambat 10 menit', 'Membawa keluarga']),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('detail_peserta_kegiatan')->insert($records);
    }
}
