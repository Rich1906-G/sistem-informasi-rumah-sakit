<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengantar extends Model
{
    use HasFactory;

    protected $table = 'pengantar';
    protected $primaryKey = 'id_pengantar';
    protected $guarded = ['id_pengantar'];

    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'kunjungan_id', 'id_kunjungan');
    }
}
