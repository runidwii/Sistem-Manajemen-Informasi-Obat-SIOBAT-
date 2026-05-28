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
                'keterangan' => $item->keterangan
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
                'keterangan' => $item->keterangan
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