<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenanggungJawab extends Model
{
    use HasFactory;

    protected $table = 'penanggung_jawap';
    protected $primaryKey = 'id_penanggung_jawap';
    protected $guarded = [];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id_pasien');
    }
}
