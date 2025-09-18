<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataObat extends Model
{
    use HasFactory;

    protected $table = 'data_obat';
    protected $primaryKey = 'id_obat';
    protected $guarded = ['id_obat'];

    public function detailPembayaran()
    {
        return $this->hasMany(DetailPembayaran::class, 'obat_id', 'id_obat');
    }
}
