<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Models\Obat;
use Illuminate\Http\Request;

class PermintaanController extends Controller
{
    public function index()
    {
        $permintaan = Permintaan::with('obat')->get();

        return view('permintaan.index', compact('permintaan'));
    }

    public function create()
    {
        $obat = Obat::all();

        return view('permintaan.create', compact('obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required',
            'jumlah_permintaan' => 'required|numeric',
            'tanggal_permintaan' => 'required|date',
            'peruntukan_bulan' => 'required',
            'status_permintaan' => 'required'
        ]);

        Permintaan::create([
            'obat_id' => $request->obat_id,
            'jumlah_permintaan' => $request->jumlah_permintaan,
            'tanggal_permintaan' => $request->tanggal_permintaan,
            'peruntukan_bulan' => $request->peruntukan_bulan,
            'keterangan' => $request->keterangan,
            'status_permintaan' => $request->status_permintaan
        ]);

        return redirect('/permintaan')
            ->with('success', 'Data permintaan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $permintaan = Permintaan::findOrFail($id);

        $obat = Obat::all();

        return view('permintaan.edit', compact('permintaan', 'obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'obat_id' => 'required',
            'jumlah_permintaan' => 'required|numeric',
            'tanggal_permintaan' => 'required|date',
            'peruntukan_bulan' => 'required',
            'status_permintaan' => 'required'
        ]);

        $permintaan = Permintaan::findOrFail($id);

        $permintaan->update([
            'obat_id' => $request->obat_id,
            'jumlah_permintaan' => $request->jumlah_permintaan,
            'tanggal_permintaan' => $request->tanggal_permintaan,
            'peruntukan_bulan' => $request->peruntukan_bulan,
            'keterangan' => $request->keterangan,
            'status_permintaan' => $request->status_permintaan
        ]);

        return redirect('/permintaan')
            ->with('success', 'Data permintaan berhasil diupdate');
    }

    public function destroy($id)
    {
        $permintaan = Permintaan::findOrFail($id);

        $permintaan->delete();

        return redirect('/permintaan')
            ->with('success', 'Data permintaan berhasil dihapus');
    }
}