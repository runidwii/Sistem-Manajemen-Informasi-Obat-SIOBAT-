<?php

namespace App\Http\Controllers;

use App\Models\Pemakaian;
use App\Models\Obat;
use Illuminate\Http\Request;

class PemakaianController extends Controller
{
    public function index()
    {
        $pemakaian = Pemakaian::with('obat')->get();

        return view('pemakaian.index', compact('pemakaian'));
    }

    public function create()
    {
        $obat = Obat::all();

        return view('pemakaian.create', compact('obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_resep' => 'required',
            'obat_id' => 'required',
            'jumlah_pemakaian' => 'required|numeric',
            'tanggal_pemakaian' => 'required|date'
        ]);

        $obat = Obat::findOrFail($request->obat_id);

        Pemakaian::create([
            'id_resep' => $request->id_resep,
            'nama_obat' => $obat->nama_obat,
            'obat_id' => $request->obat_id,
            'jumlah_pemakaian' => $request->jumlah_pemakaian,
            'tanggal_pemakaian' => $request->tanggal_pemakaian
        ]);

        return redirect('/pemakaian')
            ->with('success', 'Data pemakaian berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pemakaian = Pemakaian::findOrFail($id);

        $obat = Obat::all();

        return view('pemakaian.edit', compact('pemakaian', 'obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_resep' => 'required',
            'obat_id' => 'required',
            'jumlah_pemakaian' => 'required|numeric',
            'tanggal_pemakaian' => 'required|date'
        ]);

        $pemakaian = Pemakaian::findOrFail($id);
        
        $obat = Obat::findOrFail($request->obat_id);

        $pemakaian->update([
            'id_resep' => $request->id_resep,
            'nama_obat' => $obat->nama_obat,
            'obat_id' => $request->obat_id,
            'jumlah_pemakaian' => $request->jumlah_pemakaian,
            'tanggal_pemakaian' => $request->tanggal_pemakaian
        ]);

        return redirect('/pemakaian')
            ->with('success', 'Data pemakaian berhasil diupdate');
    }

    public function destroy($id)
    {
        $pemakaian = Pemakaian::findOrFail($id);

        $pemakaian->delete();

        return redirect('/pemakaian')
            ->with('success', 'Data pemakaian berhasil dihapus');
    }
}