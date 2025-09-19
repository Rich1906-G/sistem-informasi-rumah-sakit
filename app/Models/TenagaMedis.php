<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenagaMedis extends Model
{
    use HasFactory;

    protected $table = 'tenaga_medis';
    protected $primaryKey = 'id_tenaga_medis';
    protected $guarded = ['id_tenaga_medis'];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'tenaga_medis_id', 'id_tenaga_medis');
    }

    public function jadwalPraktik()
    {
        return $this->hasMany(JadwalPraktik::class, 'tenaga_medis_id', 'id_tenaga_medis');
    }
}
