<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    protected $guarded = ['id_pasien'];

    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'pasien_id');
    }

    public function penanggungJawab()
    {
        return $this->hasOne(PenanggungJawab::class, 'pasien_id');
    }

    public function riwayatPasien()
    {
        return $this->hasOne(RiwayatPasien::class, 'pasien_id');
    }

    public function psikososialSpiritual()
    {
        return $this->hasOne(PsikososialSpiritual::class, 'pasien_id');
    }
}
