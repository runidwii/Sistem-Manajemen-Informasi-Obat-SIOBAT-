<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;

    protected $table = 'permintaans';

    protected $fillable = [
        'kode_permintaan',
        'obat_id',
        'jumlah_permintaan',
        'tanggal_permintaan',
        'stok_awal',
        'peruntukan_bulan',
        'supplier',
        'keterangan'
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}   