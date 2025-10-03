<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('pas_foto')->nullable();
            $table->string('nama_lengkap');
            $table->string('nomor_rm')->unique();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nomor_ktp')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu', 'Lainnya'])->nullable();
            $table->enum('status', ['Belum Menikah', 'Menikah', 'Cerai Hidup', 'Cerai Mati', 'Lainnya'])->nullable();
            $table->enum('golongan_darah', ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-', 'Lainnya'])->nullable();
            $table->enum('pendidikan_terakhir', ['SMP dan Sebelumnya', 'SMA', 'Diploma(D3)', 'Sarjana(S1)', 'Master(2)', 'Lainnya'])->nullable();
            $table->enum('pekerjaan', ['Pengacara', 'Notaris', 'Dokter', 'Bidan', 'perawat', 'Apoteker', 'Psikiater', 'Psikolog', 'Petani', 'Nelayan', 'Honorer', 'Lainnya', 'Tidak Bekerja'])->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('email')->nullable();
            $table->date('tanggal_pendaftaran')->nullable();
            $table->string('alamat_rumah')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kota_kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kode_pos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
