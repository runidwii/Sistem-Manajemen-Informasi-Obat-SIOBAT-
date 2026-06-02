<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\Penerimaan;
use App\Models\Relokasi;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function index(Request $request)
    {
        // TOTAL CARD
        $totalPermintaan = Permintaan::count();
        $totalPenerimaan = Penerimaan::count();
        $totalRelokasi = Relokasi::count();

        // RIWAYAT GABUNGAN
        $riwayat = collect();

        // PERMINTAAN
        $permintaan = Permintaan::with('obat')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_obat' => $item->obat->nama_obat,
                'jenis' => 'Permintaan',
                'jumlah' => $item->jumlah_permintaan,
                'tanggal' => $item->tanggal_permintaan,
                'pemasok' => $item->keterangan
            ];
        });

        // PENERIMAAN
        $penerimaan = Penerimaan::with('permintaan.obat')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_obat' => $item->permintaan->obat->nama_obat,
                'jenis' => 'Penerimaan',
                'jumlah' => $item->jumlah_diterima,
                'tanggal' => $item->tanggal_diterima,
                'pemasok' => $item->pemasok,
                'jumlah' => $item->jumlah_penerimaan,
                'tanggal' => $item->tanggal_penerimaan,
                'keterangan' => $item->keterangan
            ];
        });

        // RELOKASI
        $relokasi = Relokasi::with('obat')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_obat' => $item->obat->nama_obat,
                'jenis' => 'Relokasi',
                'jumlah' => $item->jumlah_relokasi,
                'tanggal' => $item->tanggal_relokasi,
                'pemasok' => $item->asal,
                'url' => route('relokasi.show', $item->id),
                'edit_url' => route('relokasi.edit', $item->id),
                'delete_url' => route('relokasi.destroy', $item->id)
            ];
        });

        $riwayat = $riwayat
            ->merge($permintaan)
            ->merge($penerimaan)
            ->merge($relokasi)
            ->sortByDesc('tanggal');

        return view('input.index', compact(
            'totalPermintaan',
            'totalPenerimaan',
            'totalRelokasi',
            'riwayat'
        ));
    }
}