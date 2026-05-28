<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Obat;
use App\Models\Permintaan;
use App\Models\Penerimaan;
use App\Models\Pemakaian;
use App\Models\Persediaan;

class DashboardController extends Controller
{
    public function index()
    {
        $totalObat = Obat::count();

        $stokMenipis = Persediaan::whereColumn(
            'stok_terkini',
            '<=',
            'minimal_stok'
        )->count();

        $permintaan = Permintaan::where(
            'status_permintaan',
            'Diproses'
        )->count();

        $kadaluarsa = Penerimaan::whereDate(
            'tanggal_kadaluarsa',
            '<=',
            now()->addMonths(3)
        )->count();

        $obatKeluar = Pemakaian::sum('jumlah_pemakaian');

        $grafikObat = Pemakaian::join(
            'obats',
            'pemakaians.obat_id',
            '=',
            'obats.id'
        )
        ->select(
            'obats.nama_obat',
            DB::raw('SUM(pemakaians.jumlah_pemakaian) as total_pemakaian')
        )
        ->groupBy('obats.nama_obat')
        ->orderByDesc('total_pemakaian')
        ->limit(5)
        ->get();

        $permintaanTerbaru = Permintaan::with('obat')
        ->latest()
        ->take(5)
        ->get();

        return view('dashboard.index', compact(
            'totalObat',
            'stokMenipis',
            'permintaan',
            'kadaluarsa',
            'obatKeluar',
            'grafikObat',
            'permintaanTerbaru'
        ))->with('pageTitle', 'Dashboard');
    }
}
