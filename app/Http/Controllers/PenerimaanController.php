<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use App\Models\Permintaan;
use Illuminate\Http\Request;

class PenerimaanController extends Controller
{
    public function index()
    {
        $penerimaan = Penerimaan::with('permintaan')->get();

        return view('penerimaan.index', compact('penerimaan'));
    }

    public function create()
    {
        $permintaan = Permintaan::all();

        return view('penerimaan.create', compact('permintaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'permintaan_id' => 'required',
            'jumlah_diterima' => 'required|numeric',
            'tanggal_penerimaan' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date'
        ]);

        Penerimaan::create([
            'permintaan_id' => $request->permintaan_id,
            'jumlah_diterima' => $request->jumlah_diterima,
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/penerimaan')
            ->with('success', 'Data penerimaan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $penerimaan = Penerimaan::findOrFail($id);

        $permintaan = Permintaan::all();

        return view('penerimaan.edit', compact('penerimaan', 'permintaan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'permintaan_id' => 'required',
            'jumlah_diterima' => 'required|numeric',
            'tanggal_penerimaan' => 'required|date',
            'tanggal_kadaluarsa' => 'required|date'
        ]);

        $penerimaan = Penerimaan::findOrFail($id);

        $penerimaan->update([
            'permintaan_id' => $request->permintaan_id,
            'jumlah_diterima' => $request->jumlah_diterima,
            'tanggal_penerimaan' => $request->tanggal_penerimaan,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/penerimaan')
            ->with('success', 'Data penerimaan berhasil diupdate');
    }

    public function destroy($id)
    {
        $penerimaan = Penerimaan::findOrFail($id);

        $penerimaan->delete();

        return redirect('/penerimaan')
            ->with('success', 'Data penerimaan berhasil dihapus');
    }
}