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
        Schema::create('detail_peserta_kegiatan', function (Blueprint $table) {
            $table->id('id_detail_peserta');

            // Foreign Key ke Kegiatan Kelompok
            $table->foreignId('kegiatan_id')->constrained('kegiatan_kelompok', 'id_kegiatan')->cascadeOnDelete();

            // Foreign Key ke Pasien
            $table->foreignId('pasien_id')->constrained('pasien', 'id_pasien')->cascadeOnDelete();

            $table->dateTime('tanggal_hadir');
            $table->boolean('status_pembayaran')->default(false);
            $table->text('catatan')->nullable();

            // Mencegah duplikasi: satu pasien hanya bisa terdaftar satu kali per kegiatan
            $table->unique(['kegiatan_id', 'pasien_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_peserta_kegiatan');
    }
};
