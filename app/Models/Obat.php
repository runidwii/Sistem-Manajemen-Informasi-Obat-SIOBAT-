<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = [
        'nama_obat',
        'kode_obat',
        'dosis',
        'satuan',
        'kategori_obat'
    ];

    public function permintaan()
    {
        return $this->hasMany(Permintaan::class, 'obat_id');
    }

    public function penerimaan()
    {
        return $this->hasMany(Penerimaan::class, 'obat_id');
    }

    public function relokasi()
    {
        return $this->hasMany(Relokasi::class, 'obat_id');
    }

    public function pemakaian()
    {
        return $this->hasMany(Pemakaian::class, 'obat_id');
    }

    public function obatSampah()
    {
        return $this->hasMany(ObatSampah::class, 'obat_id');
    }

    public function persediaan()
    {
        return $this->hasOne(Persediaan::class, 'obat_id');
    }
}
