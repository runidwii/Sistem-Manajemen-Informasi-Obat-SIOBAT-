<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    protected $fillable = [
        'obat_id',
        'jumlah_permintaan',
        'tanggal_permintaan',
        'peruntukan_bulan',
        'keterangan',
        'status_permintaan'
    ];

    // app/Models/Permintaan.php

public function scopeFilterTanggal($query, $mulai, $akhir)
{
    return $query->whereBetween('tanggal_permintaan', [
        $mulai,
        $akhir
    ]);
}
    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function penerimaan()
    {
        return $this->hasOne(Penerimaan::class);
    }
}
