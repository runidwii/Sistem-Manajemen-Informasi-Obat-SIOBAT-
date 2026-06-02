<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    public function index()
    {
        return redirect()->route('input.index');
    }

    public function create()
    {
        $permintaan = Permintaan::with('obat')->get();

        return view('penerimaan.create', compact('permintaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'permintaan_id'      => 'required|exists:permintaans,id',
            'kode_penerimaan'    => 'required',
            'pemasok'            => 'required',
            'dosis'              => 'required',
            'stok_awal'          => 'required|numeric',
            'jumlah_diterima'    => 'required|numeric',
            'tanggal_diterima'   => 'required|date',
            'peruntukan_bulan'   => 'required',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        Penerimaan::create([
            'permintaan_id'      => $request->permintaan_id,
            'kode_penerimaan'    => $request->kode_penerimaan,
            'pemasok'            => $request->pemasok,
            'dosis_obat'         => $request->dosis,
            'stok_awal'          => $request->stok_awal,
            'jumlah_diterima'    => $request->jumlah_diterima,
            'tanggal_diterima'   => $request->tanggal_diterima,
            'peruntukan_bulan'   => $request->peruntukan_bulan,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'catatan'            => $request->catatan,
        ]);

        return redirect()
            ->route('input.index')
            ->with('success', 'Data penerimaan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $penerimaan = Penerimaan::findOrFail($id);
        $permintaan = Permintaan::with('obat')->get();

        return view('penerimaan.edit', compact(
            'penerimaan',
            'permintaan'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'permintaan_id'      => 'required|exists:permintaans,id',
            'kode_penerimaan'    => 'required',
            'pemasok'            => 'required',
            'dosis'              => 'required',
            'stok_awal'          => 'required|numeric',
            'jumlah_diterima'    => 'required|numeric',
            'tanggal_diterima'   => 'required|date',
            'peruntukan_bulan'   => 'required',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        $penerimaan = Penerimaan::findOrFail($id);

        $penerimaan->update([
            'permintaan_id'      => $request->permintaan_id,
            'kode_penerimaan'    => $request->kode_penerimaan,
            'pemasok'            => $request->pemasok,
            'dosis_obat'         => $request->dosis,
            'stok_awal'          => $request->stok_awal,
            'jumlah_diterima'    => $request->jumlah_diterima,
            'tanggal_diterima'   => $request->tanggal_diterima,
            'peruntukan_bulan'   => $request->peruntukan_bulan,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'catatan'            => $request->catatan,
        ]);

        return redirect()
            ->route('input.index')
            ->with('success', 'Data penerimaan berhasil diupdate');
    }

    public function destroy($id)
    {
        $penerimaan = Penerimaan::findOrFail($id);

        $penerimaan->delete();

        return redirect()
            ->route('input.index')
            ->with('success', 'Data penerimaan berhasil dihapus');
    }
}