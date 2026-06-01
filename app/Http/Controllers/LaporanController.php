<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Permintaan;
use App\Models\Penerimaan;
use App\Models\Pemakaian;
use App\Models\Relokasi;
use App\Models\ObatSampah;
use App\Models\Persediaan;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $laporanbulan = $request->input('laporanbulan');
        $permintaanbulan = $request->input('permintaanbulan');
        $tahun = $request->input('tahun');

        $laporan = $this->getLaporan($laporanbulan, $permintaanbulan, $tahun);

        return view('laporan.index', compact('laporan', 'laporanbulan', 'permintaanbulan', 'tahun'));
    }

    private function getLaporan($laporanbulan, $permintaanbulan, $tahun)
    {
        $laporan = [];
        $nama_obat = Obat::all();

        foreach ($nama_obat as $obat) {
            $stok_awal = Permintaan::where('obat_id', $obat->id)
                ->whereMonth('tanggal_permintaan', $laporanbulan)
                ->whereYear('tanggal_permintaan', $tahun)
                ->sum('stok_awal');
            $pemberian = Penerimaan::whereHas('permintaan', function ($q) use ($obat) {
                    $q->where('obat_id', $obat->id);
                })
                ->when($laporanbulan, function ($q) use ($laporanbulan) {
                    $q->whereMonth('tanggal_penerimaan', $laporanbulan);
                })
                ->when($tahun, function ($q) use ($tahun) {
                    $q->whereYear('tanggal_penerimaan', $tahun);
                })
                ->sum('jumlah_diterima');
            $pemberian_lain = Relokasi::where('obat_id', $obat->id)
                ->when($laporanbulan, function ($q) use ($laporanbulan) {
                    $q->whereMonth('tanggal_relokasi', $laporanbulan);
                })
                ->when($tahun, function ($q) use ($tahun) {
                    $q->whereYear('tanggal_relokasi', $tahun);
                })
                ->sum('jumlah_relokasi');
            $persediaan = $stok_awal + $pemberian + $pemberian_lain;
            $pemakaian = Pemakaian::where('obat_id', $obat->id)
                ->when($laporanbulan, function ($q) use ($laporanbulan) {
                    $q->whereMonth('tanggal_pemakaian', $laporanbulan);
                })
                ->when($tahun, function ($q) use ($tahun) {
                    $q->whereYear('tanggal_pemakaian', $tahun);
                })
                ->sum('jumlah_pemakaian');
            $ed_rusak = ObatSampah::where('obat_id', $obat->id)
                ->when($laporanbulan, function ($q) use ($laporanbulan) {
                    $q->whereMonth('tanggal_dibuang', $laporanbulan);
                })
                ->when($tahun, function ($q) use ($tahun) {
                    $q->whereYear('tanggal_dibuang', $tahun);
                })
                ->sum('jumlah_sampah');
            $sisa_stok = $persediaan - $pemakaian - $ed_rusak;
            $permintaan = Permintaan::where('obat_id', $obat->id)
                ->when($permintaanbulan, function ($q) use ($permintaanbulan) {
                    $q->whereMonth('tanggal_permintaan', $permintaanbulan);
                })
                ->when($tahun, function ($q) use ($tahun) {
                    $q->whereYear('tanggal_permintaan', $tahun);
                })
                ->sum('jumlah_permintaan');
            $laporan[] = [
                'nama_obat' => $obat->nama_obat,
                'dosis' => $obat->dosis,
                'satuan' => $obat->satuan,
                'stok_awal' => $stok_awal,
                'pemberian' => $pemberian,
                'pemberian_lain' => $pemberian_lain,
                'persediaan' => $persediaan,
                'pemakaian' => $pemakaian,
                'ed_rusak' => $ed_rusak,
                'sisa_stok' => $sisa_stok,
                'permintaan' => $permintaan
            ];
        }
        return $laporan;
    }

    public function exportExcel(Request $request)
    {
        $laporanbulan = $request->input('laporanbulan');
        $permintaanbulan = $request->input('permintaanbulan');
        $tahun = $request->input('tahun');

        return Excel::download(new LaporanExport($laporanbulan, $permintaanbulan, $tahun), 'laporan.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $laporanbulan = $request->input('laporanbulan');
        $permintaanbulan = $request->input('permintaanbulan');
        $tahun = $request->input('tahun');

        $laporan = $this->getLaporan($laporanbulan, $permintaanbulan, $tahun);

        $pdf = Pdf::loadView('laporan.pdf', compact('laporan', 'laporanbulan', 'permintaanbulan', 'tahun'))
            ->setPaper('a4', 'landscape');
        return $pdf->download('laporan.pdf');
    }
}