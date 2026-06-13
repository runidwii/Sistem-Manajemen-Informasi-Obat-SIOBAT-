<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permintaan;

class PemantauanPermintaanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalMulai = $request->query('tanggal_mulai', date('Y') . '-01-01');
        $tanggalAkhir = $request->query('tanggal_akhir', date('Y') . '-12-31');

        $permintaan = Permintaan::with(['obat', 'penerimaan'])
            ->whereBetween('tanggal_permintaan', [$tanggalMulai, $tanggalAkhir])
            ->orderBy('tanggal_permintaan', 'asc')
            ->get()
            ->map(function ($item) {

            $estimasiTiba = $item->penerimaan
                ? date('d-m-Y', strtotime($item->penerimaan->tanggal_diterima))
                : date('d-m-Y', strtotime($item->tanggal_permintaan . ' +2 days'));

                return [
                    'kode_pengajuan' => str_pad($item->id, 6, '0', STR_PAD_LEFT),
                    'nama_obat'      => $item->obat->nama_obat ?? '-',
                    'jumlah_obat'    => $item->jumlah_permintaan . ' strip',
                    'tanggal_order'  => $item->tanggal_permintaan->format('d-m-Y'),
                    'estimasi_tiba'  => $estimasiTiba,
                    'status'         => $item->status_permintaan,
                ];
            });

        return view('pemantauanpermintaan.index', compact(
            'permintaan',
            'tanggalMulai',
            'tanggalAkhir'
        ));
    }
}
