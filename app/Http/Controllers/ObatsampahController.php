<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\ObatSampah;

class ObatsampahController extends Controller
{
    public function index()
    {
        return view('obatsampah.index');
    }

    public function kadaluwarsa()
    {
        $obatKedaluwarsa = ObatSampah::where('jenis', 'Kadaluwarsa')->get();
        $obat = Obat::all();

        return view(
            'obatsampah.kadaluwarsa',
            compact('obatKedaluwarsa', 'obat')
        );
    }

    public function storeKadaluwarsa(Request $request)
    {
        $request->validate([
            'cara_masuk_obat'     => 'required|in:Penerimaan,Permintaan,Relokasi',
            'kode_obat'           => 'required', 
            'nama_obat'           => 'required',
            'jumlah_obat'         => 'required|numeric|min:1',
            'peruntukan_bulan'    => 'required',
            'tanggal_kadaluwarsa' => 'required|date',
        ]);

        $obat = Obat::where('kode_obat', $request->kode_obat)->first();
        if (!$obat) {
            
            return redirect()->back()->withErrors(['kode_obat' => 'Kode obat tidak terdaftar di sistem!'])->withInput();
        }

        ObatSampah::create([
            'obat_id'           => $obat->id, 
            'jumlah_obat'       => $request->jumlah_obat,
            'cara_masuk_obat'   => $request->cara_masuk_obat,
            'nama_obat'         => $request->nama_obat,
            'tanggal'           => $request->tanggal_kadaluwarsa, 
            'peruntukan_bulan'  => $request->peruntukan_bulan,
            'jenis'             => 'Kadaluwarsa', 
            'keterangan'        => $request->keterangan,
        ]);

        return redirect()->back()->with('Berhasil', 'Data obat kadaluwarsa berhasil ditambahkan!');
    }

    public function rusak()
    {
        
        $obatRusak = ObatSampah::where('jenis', 'Rusak')->get();
        $obat = Obat::all();

        return view(
            'obatsampah.rusak',
            compact('obatRusak', 'obat')
        );
    }

    public function storeRusak(Request $request)
    {
        $request->validate([
            'cara_masuk_obat'          => 'required|in:Penerimaan,Permintaan,Relokasi',
            'kode_obat'                => 'required', 
            'nama_obat'                => 'required',
            'jumlah_obat'              => 'required|numeric|min:1',
            'peruntukan_bulan'         => 'required',
            'tanggal_teridentifikasi'  => 'required|date',
        ]);

        $obat = Obat::where('kode_obat', $request->kode_obat)->first();
        if (!$obat) {
            return redirect()->back()->withErrors(['kode_obat' => 'Kode obat tidak terdaftar di sistem!'])->withInput();
        }

        ObatSampah::create([
            'obat_id'           => $obat->id,
            'jumlah_obat'       => $request->jumlah_obat,
            'cara_masuk_obat'   => $request->cara_masuk_obat,
            'nama_obat'         => $request->nama_obat,
            'tanggal'           => $request->tanggal_teridentifikasi, 
            'peruntukan_bulan'  => $request->peruntukan_bulan,
            'jenis'             => 'Rusak', 
            'keterangan'        => $request->keterangan,
        ]);

        return redirect()->back()->with('Berhasil', 'Data obat rusak berhasil ditambahkan!');
    }
}