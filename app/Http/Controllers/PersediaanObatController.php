<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersediaanObatController extends Controller
{
    /**
     * Tampilkan halaman index Persediaan Obat
     * berisi empat card menu navigasi.
     */
    public function index()
    {
        return view('statuspersediaanobat.index');
    }
}
