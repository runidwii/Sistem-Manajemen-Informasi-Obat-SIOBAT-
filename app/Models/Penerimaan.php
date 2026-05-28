<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    protected $fillable = [
        'permintaan_id',
        'jumlah_diterima',
        'tanggal_penerimaan',
        'tanggal_kadaluarsa',
        'keterangan'
    ];

    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class);
    }
}