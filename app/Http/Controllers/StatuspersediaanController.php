<?php

namespace App\Http\Controllers;

use App\Models\Persediaan;
use App\Models\Obat;
use Illuminate\Http\Request;

class StatuspersediaanController extends Controller
{
    public function index()
    {
        $persediaan = Persediaan::with('obat')->get();

        return view('statuspersediaan.index', compact('persediaan'));
    }

    public function create()
    {
        $obat = Obat::all();

        return view('statuspersediaan.create', compact('obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required',
            'stok_terkini' => 'required|integer',
            'minimal_stok' => 'required|integer',
            'status_persediaan' => 'required',
        ]);

        $obat = Obat::findOrFail($request->obat_id);

        Persediaan::create([
            'nama_obat' => $obat->nama_obat,
            'obat_id' => $request->obat_id,
            'stok_terkini' => $request->stok_terkini,
            'minimal_stok' => $request->minimal_stok,
            'status_persediaan' => $request->status_persediaan,
        ]);

        return redirect()->route('statuspersediaan.index')
        ->with('success', 'Data Persediaan Berhasil Ditambahkan!');
    }

    public function show($id)
    {
        $persediaan = Persediaan::with('obat')->findOrFail($id);

        return view('statuspersediaan.show', compact('persediaan'));
    }

    public function edit($id)
    {
        $persediaan = Persediaan::findOrFail($id);
        $obat = Obat::all();

        return view('statuspersediaan.edit', compact('persediaan', 'obat'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'obat_id' => 'required',
        'stok_terkini' => 'required|integer',
        'minimal_stok' => 'required|integer',
        'status_persediaan' => 'required',
    ]);

    $persediaan = Persediaan::findOrFail($id);

    $obat = Obat::findOrFail($request->obat_id);

    $persediaan->update([
        'nama_obat' => $obat->nama_obat,
        'obat_id' => $request->obat_id,
        'stok_terkini' => $request->stok_terkini,
        'minimal_stok' => $request->minimal_stok,
        'status_persediaan' => $request->status_persediaan,
    ]);

    return redirect()->route('statuspersediaan.index')
        ->with('success', 'Data berhasil diupdate');
}

    public function destroy($id)
    {
        $persediaan = Persediaan::findOrFail($id);
        $persediaan->delete();

        return redirect()->route('statuspersediaan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}