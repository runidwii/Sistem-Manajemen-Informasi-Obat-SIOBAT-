<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relokasi extends Model
{
    protected $fillable = [
        'obat_id',
        'jumlah_relokasi',
        'tanggal_relokasi',
        'peruntukan_bulan',
        'asal',
        'tujuan',
        'keterangan'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}