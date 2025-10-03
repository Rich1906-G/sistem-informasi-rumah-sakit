<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanKelompok extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_kelompok';
    protected $primaryKey = 'id_kegiatan';

    protected $guarded = [];

    // Relasi ke Tenaga Medis (Penanggung Jawab)
    public function tenagaMedis()
    {
        return $this->belongsTo(TenagaMedis::class, 'tenaga_medis_id', 'id_tenaga_medis');
    }

    // Relasi ke Peserta
    public function peserta()
    {
        return $this->hasMany(DetailPesertaKegiatan::class, 'kegiatan_id', 'id_kegiatan');
    }
}
