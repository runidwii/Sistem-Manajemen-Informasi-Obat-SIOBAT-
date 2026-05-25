<?php

namespace App\Http\Controllers;

use App\Models\Persediaan;
use App\Models\Obat;
use Illuminate\Http\Request;

class PersediaanController extends Controller
{
    public function index()
    {
        $persediaan = Persediaan::with('obat')->get();

        return view('persediaan.index', compact('persediaan'));
    }

    public function create()
    {
        $obat = Obat::all();

        return view('persediaan.create', compact('obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required',
            'stok_terkini' => 'required|numeric',
            'minimal_stok' => 'required|numeric',
            'tanggal_kadaluarsa' => 'required|date',
            'status_persediaan' => 'required'
        ]);

        Persediaan::create([
            'obat_id' => $request->obat_id,
            'stok_terkini' => $request->stok_terkini,
            'minimal_stok' => $request->minimal_stok,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'status_persediaan' => $request->status_persediaan
        ]);

        return redirect('/persediaan')
            ->with('success', 'Data persediaan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $persediaan = Persediaan::findOrFail($id);

        $obat = Obat::all();

        return view('persediaan.edit', compact('persediaan', 'obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'obat_id' => 'required',
            'stok_terkini' => 'required|numeric',
            'minimal_stok' => 'required|numeric',
            'tanggal_kadaluarsa' => 'required|date',
            'status_persediaan' => 'required'
        ]);

        $persediaan = Persediaan::findOrFail($id);

        $persediaan->update([
            'obat_id' => $request->obat_id,
            'stok_terkini' => $request->stok_terkini,
            'minimal_stok' => $request->minimal_stok,
            'tanggal_kadaluarsa' => $request->tanggal_kadaluarsa,
            'status_persediaan' => $request->status_persediaan
        ]);

        return redirect('/persediaan')
            ->with('success', 'Data persediaan berhasil diupdate');
    }

    public function destroy($id)
    {
        $persediaan = Persediaan::findOrFail($id);

        $persediaan->delete();

        return redirect('/persediaan')
            ->with('success', 'Data persediaan berhasil dihapus');
    }
}