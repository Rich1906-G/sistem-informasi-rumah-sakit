<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    use HasFactory;

    protected $table = 'detail_pembayaran';
    protected $primaryKey = 'id_detail';
    protected $guarded = ['id_detail'];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id', 'id_pembayaran');
    }

    public function dataObat()
    {
        return $this->belongsTo(DataObat::class, 'obat_id', 'id_obat');
    }
}
