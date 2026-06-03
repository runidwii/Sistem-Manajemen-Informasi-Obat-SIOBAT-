<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permintaan;

class PemantauanPermintaanController extends Controller
{
    /**
     * Tampilkan halaman Pemantauan Permintaan.
     * Data diambil dari tabel permintaans dengan relasi obat & penerimaan.
     */
    public function index(Request $request)
    {
        // ── Filter tanggal dari query string (default: seluruh tahun ini) ──
        $tanggalMulai = $request->query('tanggal_mulai', date('Y') . '-01-01');
        $tanggalAkhir = $request->query('tanggal_akhir', date('Y') . '-12-31');

        // ── Ambil data dari database ─────────────────────────────────────
        // with('obat')       → nama obat dari tabel obats
        // with('penerimaan') → data penerimaan dari tabel penerimaans
        $permintaan = Permintaan::with(['obat', 'penerimaan'])
            ->whereBetween('tanggal_permintaan', [$tanggalMulai, $tanggalAkhir]) // <-- GANTI BARIS INI
            ->orderBy('tanggal_permintaan', 'asc')
            ->get()
            ->map(function ($item) {

                $estimasiTiba = $item->penerimaan
                    ? $item->penerimaan->tanggal_penerimaan->format('d-m-Y')
                    : $item->tanggal_permintaan->copy()->addDays(2)->format('d-m-Y');

                return [
                    // Kode pengajuan: ID diformat 6 digit (000001, 000002, dst)
                    'kode_pengajuan' => str_pad($item->id, 6, '0', STR_PAD_LEFT),

                    // Nama obat dari relasi tabel obats
                    'nama_obat'      => $item->obat->nama_obat ?? '-',

                    // Jumlah permintaan + satuan
                    'jumlah_obat'    => $item->jumlah_permintaan . ' strip',

                    'tanggal_order'  => $item->tanggal_permintaan->format('d-m-Y'),
                    'estimasi_tiba'  => $estimasiTiba,

                    // Status langsung dari kolom status_permintaan
                    'status'         => $item->status_permintaan,
                ];
            });

        return view('pemantauanpermintaan.index', compact(
            'permintaan',
            'tanggalMulai',
            'tanggalAkhir'
        ));
    }
}
