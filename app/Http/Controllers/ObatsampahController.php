<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatsampahController extends Controller
{
    public function index()
    {
        return view('obatsampah.index');
    }

    public function kadaluwarsa()
{
    $obatKedaluwarsa = [];
    $obat = Obat::all();

    return view(
        'obatsampah.kadaluwarsa',
        compact('obatKedaluwarsa', 'obat')
    );
}

    public function kadaluwarsaStore(Request $request)
{
        $request->validate([
            'obat_id'           => 'required',
            'jumlah_sampah'     => 'required|numeric|min:1',
            'peruntukan_bulan'  => 'required',
            'tanggal_kadaluwarsa' => 'required|date',
        ]);

        // Kode untuk simpan ke database taruh di sini nantinya

        return redirect()->back()->with('success', 'Data obat kadaluwarsa berhasil ditambahkan!');
}

    public function rusak()
{
    $obatRusak = [];
    $obat = Obat::all();

    return view(
        'obatsampah.rusak',
        compact('obatRusak', 'obat')
    );
}

    public function rusakStore(Request $request)
    {
        // 1. Validasi inputan dari form pop-up modal
        $request->validate([
            'obat_id'          => 'required',
            'jumlah_sampah'    => 'required|numeric|min:1',
            'peruntukan_bulan' => 'required',
            'tanggal_dibuang'  => 'required|date',
        ]);
    return redirect()->back()->with('success', 'Data obat rusak berhasil ditambahkan!');
    }
}