<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    protected $fillable = [
        'obat_id',
        'nama_obat',
        'stok_terkini',
        'minimal_stok',
        'tanggal_kadaluarsa',
        'status_persediaan'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}