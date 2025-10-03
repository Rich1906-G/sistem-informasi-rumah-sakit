<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesertaKegiatan extends Model
{
    use HasFactory;

    protected $table = 'detail_peserta_kegiatan';
    protected $primaryKey = 'id_detail_peserta';

    protected $guarded = [];

    // Relasi ke Kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(KegiatanKelompok::class, 'kegiatan_id', 'id_kegiatan');
    }

    // Relasi ke Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id_pasien');
    }
}
