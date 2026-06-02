<?php

namespace App\Http\Controllers;

use App\Models\Relokasi;
use App\Models\Obat;
use Illuminate\Http\Request;

class RelokasiController extends Controller
{
    public function index()
    {
        return redirect()->route('input.index');
    }

    public function create()
    {
        $obat = Obat::all();

        return view('relokasi.create', compact('obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required',
            'jumlah_relokasi' => 'required|numeric',
            'tanggal_relokasi' => 'required|date',
            'peruntukan_bulan' => 'required',
            'asal' => 'required',
            'tujuan' => 'required'
        ]);

        Relokasi::create([
            'obat_id' => $request->obat_id,
            'jumlah_relokasi' => $request->jumlah_relokasi,
            'tanggal_relokasi' => $request->tanggal_relokasi,
            'peruntukan_bulan' => $request->peruntukan_bulan,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('input.index')
    ->with('success', 'Data relokasi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $relokasi = Relokasi::findOrFail($id);

        $obat = Obat::all();

        return view('relokasi.edit', compact('relokasi', 'obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'obat_id' => 'required',
            'jumlah_relokasi' => 'required|numeric',
            'tanggal_relokasi' => 'required|date',
            'peruntukan_bulan' => 'required',
            'asal' => 'required',
            'tujuan' => 'required'
        ]);

        $relokasi = Relokasi::findOrFail($id);

        $relokasi->update([
            'obat_id' => $request->obat_id,
            'jumlah_relokasi' => $request->jumlah_relokasi,
            'tanggal_relokasi' => $request->tanggal_relokasi,
            'peruntukan_bulan' => $request->peruntukan_bulan,
            'asal' => $request->asal,
            'tujuan' => $request->tujuan,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('input.index')
            ->with('success', 'Data relokasi berhasil diupdate');
        }

    public function destroy($id)
    {
        $relokasi = Relokasi::findOrFail($id);

        $relokasi->delete();

        return redirect()->route('input.index')
            ->with('success', 'Data relokasi berhasil dihapus');
    }

    public function show($id)
    {
        $relokasi = Relokasi::with('obat')
                        ->findOrFail($id);

        return view('relokasi.show', compact('relokasi'));
    }
}