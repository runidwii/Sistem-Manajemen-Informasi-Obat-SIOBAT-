<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obatsampah extends Model
{
    protected $table = 'obat_sampahs';

    protected $fillable = [
        'obat_id',
        'jumlah_sampah',
        'tanggal_dibuang',
        'peruntukan_bulan',
        'jenis',
        'keterangan'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}