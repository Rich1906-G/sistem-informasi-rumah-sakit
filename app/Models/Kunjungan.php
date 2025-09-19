<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    use HasFactory;

    protected $table = 'kunjungan';
    protected $primaryKey = 'id_kunjungan';
    protected $guarded = ['id_kunjungan'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function tenagaMedis()
    {
        return $this->belongsTo(TenagaMedis::class, 'tenaga_medis_id');
    }

    public function rekamMedis()
    {
        return $this->hasOne(RekamMedis::class, 'kunjungan_id');
    }

    public function vitalSign()
    {
        return $this->hasOne(VitalSign::class, 'kunjungan_id');
    }

    public function pengantar()
    {
        return $this->hasOne(Pengantar::class, 'kunjungan_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'kunjungan_id');
    }
}
