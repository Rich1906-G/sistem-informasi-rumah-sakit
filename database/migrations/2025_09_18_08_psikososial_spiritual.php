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
        Schema::create('psikososial_spiritual', function (Blueprint $table) {
            $table->id('id_psikososial');
            $table->foreignId('pasien_id')->constrained('pasien', 'id_pasien');
            $table->string('kondisi_psikologis')->nullable();
            $table->string('status_menikah')->nullable();
            $table->string('tinggal_dengan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->text('kegiatan_keagamaan_rutin')->nullable();
            $table->text('kegiatan_spiritual_dibutuhkan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psikososial_spiritual');
    }
};
