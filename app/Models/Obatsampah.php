<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obatsampah extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database.
     */
    protected $table = 'obat_sampahs';

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'obat_id',
        'jumlah_sampah',
        'tanggal_dibuang',
        'peruntukan_bulan',  // 'Januari' s/d 'Desember'
        'jenis',             // 'Kadaluarsa' | 'Rusak'
        'keterangan',
    ];

    /**
     * Cast kolom tanggal otomatis ke Carbon.
     */
    protected $casts = [
        'tanggal_dibuang' => 'date',
    ];

    // ── Relasi ───────────────────────────────────────────────────────

    /**
     * Setiap obat sampah milik satu obat.
     */
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }

    // ── Scope: filter berdasarkan jenis ─────────────────────────────

    /**
     * Hanya ambil obat yang rusak.
     * Contoh: ObatSampah::rusak()->get();
     */
    public function scopeRusak($query)
    {
        return $query->where('jenis', 'Rusak');
    }

    /**
     * Hanya ambil obat yang kadaluarsa.
     * Contoh: ObatSampah::kadaluarsa()->get();
     */
    public function scopeKadaluarsa($query)
    {
        return $query->where('jenis', 'Kadaluarsa');
    }

    // ── Scope: filter berdasarkan rentang tanggal dibuang ────────────

    /**
     * Contoh: ObatSampah::filterTanggal('2022-01-01', '2026-12-31')->get();
     */
    public function scopeFilterTanggal($query, $mulai, $akhir)
    {
        return $query
            ->whereDate('tanggal_dibuang', '>=', $mulai)
            ->whereDate('tanggal_dibuang', '<=', $akhir);
    }
}