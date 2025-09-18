<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory;

    protected $table = 'vital_sign';
    protected $primaryKey = 'id_vital_sign';
    protected $guarded = ['id_vital_sign'];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id', 'id_kunjungan');
    }
}
