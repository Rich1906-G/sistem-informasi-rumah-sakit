<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPasien extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pasien';
    protected $primaryKey = 'id_riwayat_pasien';
    protected $guarded = ['id_riwayat_pasien'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id_pasien');
    }
}
