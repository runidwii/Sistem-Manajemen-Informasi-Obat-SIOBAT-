<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    protected $fillable = [
        'permintaan_id',
        'kode_penerimaan',
        'pemasok',
        'dosis_obat',
        'stok_awal',
        'jumlah_diterima',
        'tanggal_diterima',
        'peruntukan_bulan',
        'tanggal_kadaluarsa',
        'catatan'
    ];

    public function permintaan()
    {
        return $this->belongsTo(Permintaan::class);
    }
}