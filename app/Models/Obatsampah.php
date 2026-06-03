<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ObatSampah extends Model
{
    use HasFactory;

    protected $table = 'obat_sampahs';

    protected $fillable = [
        'obat_id',
        'jumlah_obat',
        'cara_masuk_obat',
        'nama_obat',
        'tanggal',
        'peruntukan_bulan',  
        'jenis',             
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }

    public function scopeRusak($query)
    {
        return $query->where('jenis', 'Rusak');
    }

    public function scopeKadaluarsa($query)
    {
        return $query->where('jenis', 'Kadaluwarsa');
    }

    public function scopeFilterTanggal($query, $mulai, $akhir)
    {
        return $query->whereDate('tanggal', '>=', $mulai)
                     ->whereDate('tanggal', '<=', $akhir);
    }
}