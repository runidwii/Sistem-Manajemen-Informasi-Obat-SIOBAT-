<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    protected $fillable = [
        'id_penerimaan',
        'stok_terkini',
        'minimal_stok',
        'status_persediaan'
    ];

    public function penerimaan()
    {
        return $this->belongsTo(Penerimaan::class, 'id_penerimaan');
    }
}