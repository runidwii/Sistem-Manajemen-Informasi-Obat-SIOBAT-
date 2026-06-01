<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatSampah;
use App\Models\Obat;

class ObatSampahController extends Controller
{
    /**
     * Halaman index Obat "Sampah" — menampilkan 2 card pilihan.
     */
    public function index()
    {
        return view('obatsampah.index');
    }

    // ══════════════════════════════════════════════════════════
    // OBAT RUSAK
    // ══════════════════════════════════════════════════════════

    /**
     * Tampilkan tabel Obat Rusak.
     * Filter jenis = 'Rusak' dari tabel obat_sampahs.
     */
    public function rusak(Request $request)
    {
        $tanggalMulai = $request->query('tanggal_mulai', '2022-01-01');
        $tanggalAkhir = $request->query('tanggal_akhir', date('Y') . '-12-31');

        // Ambil data obat rusak beserta relasi obat
        $obatRusak = ObatSampah::with('obat')
            ->rusak()
            ->filterTanggal($tanggalMulai, $tanggalAkhir)
            ->orderBy('tanggal_dibuang', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'kode_obat'               => $item->obat->kode_obat ?? '-',
                    'nama_obat'               => $item->obat->nama_obat ?? '-',
                    'jumlah_obat'             => str_pad($item->jumlah_sampah, 2, '0', STR_PAD_LEFT) . ' strip',
                    'tanggal_teridentifikasi' => $item->tanggal_dibuang->format('d-m-Y'),
                    // Format peruntukan bulan menjadi MM-YYYY
                    'peruntukan_bulan'        => $this->formatPeruntukanBulan($item->peruntukan_bulan, $item->tanggal_dibuang->year),
                    'kode_masuk_obat'         => $item->obat->kode_masuk ?? '-',
                ];
            });

        return view('obatsampah.rusak', compact(
            'obatRusak',
            'tanggalMulai',
            'tanggalAkhir'
        ));
    }

    /**
     * Form input Obat Rusak.
     */
    public function rusakCreate()
    {
        return view('obatsampah.rusak-create');
    }

    // ══════════════════════════════════════════════════════════
    // OBAT KEDALUWARSA
    // ══════════════════════════════════════════════════════════

    /**
     * Tampilkan tabel Obat Kedaluwarsa.
     * Filter jenis = 'Kadaluarsa' dari tabel obat_sampahs.
     */
    public function kadaluwarsa(Request $request)
    {
        $tanggalMulai = $request->query('tanggal_mulai', '2022-01-01');
        $tanggalAkhir = $request->query('tanggal_akhir', date('Y') . '-12-31');

        // Ambil data obat kadaluarsa beserta relasi obat
        $obatKedaluwarsa = ObatSampah::with('obat')
            ->kadaluarsa()
            ->filterTanggal($tanggalMulai, $tanggalAkhir)
            ->orderBy('tanggal_dibuang', 'asc')
            ->get()
            ->map(function ($item) {
                return [
                    'kode_obat'           => $item->obat->kode_obat ?? '-',
                    'nama_obat'           => $item->obat->nama_obat ?? '-',
                    'jumlah_obat'         => str_pad($item->jumlah_sampah, 2, '0', STR_PAD_LEFT) . ' strip',
                    'tanggal_kadaluwarsa' => $item->tanggal_dibuang->format('d-m-Y'),
                    // Format peruntukan bulan menjadi MM-YYYY
                    'peruntukan_bulan'    => $this->formatPeruntukanBulan($item->peruntukan_bulan, $item->tanggal_dibuang->year),
                    'kode_masuk_obat'     => $item->obat->kode_masuk ?? '-',
                ];
            });

        return view('obatsampah.kadaluwarsa', compact(
            'obatKedaluwarsa',
            'tanggalMulai',
            'tanggalAkhir'
        ));
    }

    /**
     * Form input Obat Kedaluwarsa.
     */
    public function kedaluwarsaCreate()
    {
        return view('obatsampah.kedaluwarsa-create');
    }

    // ══════════════════════════════════════════════════════════
    // HELPER
    // ══════════════════════════════════════════════════════════

    /**
     * Konversi nama bulan ke format MM-YYYY.
     * Contoh: 'September', 2025 → '09-2025'
     */
    private function formatPeruntukanBulan(string $namaBulan, int $tahun): string
    {
        $bulanMap = [
            'Januari'   => '01', 'Februari' => '02', 'Maret'     => '03',
            'April'     => '04', 'Mei'      => '05', 'Juni'      => '06',
            'Juli'      => '07', 'Agustus'  => '08', 'September' => '09',
            'Oktober'   => '10', 'November' => '11', 'Desember'  => '12',
        ];

        $nomorBulan = $bulanMap[$namaBulan] ?? '00';

        return $nomorBulan . '-' . $tahun;
    }
}