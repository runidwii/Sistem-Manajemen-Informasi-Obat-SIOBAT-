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
        $totalPermintaan = Permintaan::count();
        $totalPenerimaan = Penerimaan::count();
        $totalRelokasi = Relokasi::count();

        $riwayat = collect();

        $permintaan = Permintaan::with('obat')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_obat' => $item->obat->nama_obat,
                'jenis' => 'Permintaan',
                'jumlah' => $item->jumlah_permintaan,
                'tanggal' => $item->tanggal_permintaan,
                'pemasok' => $item->supplier,
                 'url' => route('permintaan.show', $item->id),
                 'edit_url' => route('permintaan.edit', $item->id),
                 'delete_url' => route('permintaan.destroy', $item->id),
            ];
        });

        $penerimaan = Penerimaan::with('permintaan.obat')->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'nama_obat' => $item->permintaan->obat->nama_obat,
                'jenis' => 'Penerimaan',
                'jumlah' => $item->jumlah_diterima,
                'tanggal' => $item->tanggal_diterima,
                'pemasok' => $item->pemasok,
                'url' => route('penerimaan.show', $item->id),
                'edit_url' => route('penerimaan.edit', $item->id),
                'delete_url' => route('penerimaan.destroy', $item->id)
            ];
        });

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
        ->merge($relokasi);

        if ($request->filled('search')) {

            $search = strtolower($request->search);

            $riwayat = $riwayat->filter(function ($item) use ($search) {
                return str_contains(
                    strtolower($item['nama_obat']),
                    $search
                );
            });
        }

        if ($request->filled('jenis')) {

            $riwayat = $riwayat->filter(function ($item) use ($request) {
                return $item['jenis'] === $request->jenis;
            });

        }


        $riwayat = $riwayat->sortByDesc('tanggal');

        return view('input.index', compact(
            'totalPermintaan',
            'totalPenerimaan',
            'totalRelokasi',
            'riwayat'
        ));
    }
}