<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPraktik extends Model
{
    use HasFactory;

    protected $table = 'jadwal_praktik';
    protected $primaryKey = 'id_jadwal';
    protected $guarded = ['id_jadwal'];

    public function tenagaMedis()
    {
        return $this->belongsTo(TenagaMedis::class, 'tenaga_medis_id', 'id_tenaga_medis');
    }
}
