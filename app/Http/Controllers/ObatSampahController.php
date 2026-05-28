<?php

namespace App\Http\Controllers;

use App\Models\ObatSampah;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatSampahController extends Controller
{
    public function index()
    {
        $obatSampah = ObatSampah::with('obat')->get();

        return view('obatsampah.index', compact('obatSampah'));
    }

    public function create()
    {
        $obat = Obat::all();

        return view('obatsampah.create', compact('obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required',
            'jumlah_sampah' => 'required|numeric',
            'tanggal_dibuang' => 'required|date',
            'peruntukan_bulan' => 'required',
            'jenis' => 'required'
        ]);

        ObatSampah::create([
            'obat_id' => $request->obat_id,
            'jumlah_sampah' => $request->jumlah_sampah,
            'tanggal_dibuang' => $request->tanggal_dibuang,
            'peruntukan_bulan' => $request->peruntukan_bulan,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/obat-sampah')
            ->with('success', 'Data obat sampah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $obatSampah = ObatSampah::findOrFail($id);

        $obat = Obat::all();

        return view('obatsampah.edit', compact('obatSampah', 'obat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'obat_id' => 'required',
            'jumlah_sampah' => 'required|numeric',
            'tanggal_dibuang' => 'required|date',
            'peruntukan_bulan' => 'required',
            'jenis' => 'required'
        ]);

        $obatSampah = ObatSampah::findOrFail($id);

        $obatSampah->update([
            'obat_id' => $request->obat_id,
            'jumlah_sampah' => $request->jumlah_sampah,
            'tanggal_dibuang' => $request->tanggal_dibuang,
            'peruntukan_bulan' => $request->peruntukan_bulan,
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/obat-sampah')
            ->with('success', 'Data obat sampah berhasil diupdate');
    }

    public function destroy($id)
    {
        $obatSampah = ObatSampah::findOrFail($id);

        $obatSampah->delete();

        return redirect('/obat-sampah')
            ->with('success', 'Data obat sampah berhasil dihapus');
    }
}