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
        Schema::create('kegiatan_kelompok', function (Blueprint $table) {
            $table->id('id_kegiatan');
            $table->string('nama_club');
            $table->text('deskripsi')->nullable();
            $table->string('pembicara');

            // Kolom untuk Tanggal Dibuat dan Pelaksanaan
            $table->dateTime('tanggal_pelaksanaan');

            $table->decimal('biaya', 10, 2)->default(0);

            // Foreign Key ke Tenaga Medis (sebagai penanggung jawab/penyelenggara)
            // Asumsi tabel tenagaMedis sudah ada
            $table->foreignId('tenaga_medis_id')->nullable()->constrained('tenaga_medis', 'id_tenaga_medis')->nullOnDelete();

            // Status kegiatan (misalnya: 'Rencana', 'Selesai', 'Batal')
            $table->enum('status', ['Rencana', 'Selesai', 'Batal'])->default('Rencana');

            // Menggunakan timestamps() untuk created_at (Tanggal Dibuat) dan updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_kelompok');
    }
};
