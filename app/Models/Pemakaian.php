<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    protected $fillable = [
        'id_resep',
        'nama_obat',
        'obat_id',
        'jumlah_pemakaian',
        'tanggal_pemakaian'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}