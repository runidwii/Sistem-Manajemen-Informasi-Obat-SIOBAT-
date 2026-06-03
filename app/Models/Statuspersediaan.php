<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statuspersediaan extends Model
{
    protected $fillable = [
        'obat_id',
        'nama_obat',
        'stok_terkini',
        'minimal_stok',
        'status_persediaan'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }
}