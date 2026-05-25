<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obat = Obat::all();

        return view('obat.index', compact('obat'));
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kode_obat' => 'required',
            'dosis' => 'required',
            'satuan' => 'required',
            'kategori_obat' => 'required'
        ]);

        Obat::create([
            'nama_obat' => $request->nama_obat,
            'kode_obat' => $request->kode_obat,
            'dosis' => $request->dosis,
            'satuan' => $request->satuan,
            'kategori_obat' => $request->kategori_obat
        ]);

        return redirect('/obat')
            ->with('success', 'Data obat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $obat = Obat::findOrFail($id);

        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kode_obat' => 'required',
            'dosis' => 'required',
            'satuan' => 'required',
            'kategori_obat' => 'required'
        ]);

        $obat = Obat::findOrFail($id);

        $obat->update([
            'nama_obat' => $request->nama_obat,
            'kode_obat' => $request->kode_obat,
            'dosis' => $request->dosis,
            'satuan' => $request->satuan,
            'kategori_obat' => $request->kategori_obat
        ]);

        return redirect('/obat')
            ->with('success', 'Data obat berhasil diupdate');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);

        $obat->delete();

        return redirect('/obat')
            ->with('success', 'Data obat berhasil dihapus');
    }
}