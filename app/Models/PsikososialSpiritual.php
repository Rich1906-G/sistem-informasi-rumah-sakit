<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsikososialSpiritual extends Model
{
    use HasFactory;

    protected $table = 'psikososial_spiritual';
    protected $primaryKey = 'id_psikososial';
    protected $guarded = ['id_psikososial'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id_pasien');
    }
}
