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
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id('id_kunjungan');
            $table->foreignId('pasien_id')->constrained('pasien', 'id_pasien');
            $table->foreignId('tenaga_medis_id')->constrained('tenaga_medis', 'id_tenaga_medis');
            $table->string('tipe_pasien');
            $table->string('nama_rs_perujuk')->nullable();
            $table->string('nama_dokter_perujuk')->nullable();
            $table->string('penjamin')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('jenis_kunjungan')->nullable();
            $table->string('jenis_perawatan')->nullable();
            $table->string('poli')->nullable();
            $table->date('tanggal_kunjungan');
            $table->time('jam_kunjungan');
            $table->string('slot')->nullable();
            $table->integer('lama_durasi_menit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungan');
    }
};
