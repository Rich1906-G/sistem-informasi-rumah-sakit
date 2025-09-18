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
        Schema::create('data_obat', function (Blueprint $table) {
            $table->id('id_obat');
            $table->string('barcode')->nullable()->unique();
            $table->string('nama_obat');
            $table->string('nama_brand_farmasi')->nullable();
            $table->string('kategori_obat')->nullable();
            $table->string('jenis')->nullable();
            $table->string('satuan')->nullable();
            $table->decimal('dosis', 5, 2)->nullable();
            $table->integer('stok')->default(0);
            $table->date('expired_date')->nullable();
            $table->string('nomor_batch')->nullable();
            $table->decimal('harga_beli_satuan', 10, 2)->nullable();
            $table->decimal('harga_jual_umum', 10, 2)->nullable();
            $table->text('kandungan')->nullable();
            $table->boolean('is_kunci_harga')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_obat');
    }
};
