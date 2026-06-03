<?php

namespace App\Exports;

use App\Models\Obat;
use App\Models\Permintaan;
use App\Models\Penerimaan;
use App\Models\Pemakaian;
use App\Models\Relokasi;
use App\Models\ObatSampah;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    protected $laporanbulan;
    protected $permintaanbulan;
    protected $tahun;

    public function __construct($laporanbulan, $permintaanbulan, $tahun)
    {
        $this->laporanbulan = $laporanbulan;
        $this->permintaanbulan = $permintaanbulan;
        $this->tahun = $tahun;
    }

    public function collection(): Collection
    {
        $laporan = [];

        $nama_obat = Obat::all();

        foreach ($nama_obat as $obat) {

            $stok_awal = Permintaan::where('obat_id', $obat->id)
                ->when($this->laporanbulan, function ($q) {
                    $q->whereMonth('tanggal_permintaan', $this->laporanbulan);
                })
                ->when($this->tahun, function ($q) {
                    $q->whereYear('tanggal_permintaan', $this->tahun);
                })
                ->sum('stok_awal');

            $pemberian = Penerimaan::whereHas('permintaan', function ($q) use ($obat) {
                    $q->where('obat_id', $obat->id);
                })
                ->when($this->laporanbulan, function ($q) {
                    $q->whereMonth('tanggal_diterima', $this->laporanbulan);
                })
                ->when($this->tahun, function ($q) {
                    $q->whereYear('tanggal_diterima', $this->tahun);
                })
                ->sum('jumlah_diterima');

            $pemberian_lain = Relokasi::where('obat_id', $obat->id)
                ->when($this->laporanbulan, function ($q) {
                    $q->whereMonth('tanggal_relokasi', $this->laporanbulan);
                })
                ->when($this->tahun, function ($q) {
                    $q->whereYear('tanggal_relokasi', $this->tahun);
                })
                ->sum('jumlah_relokasi');

            $persediaan = $stok_awal + $pemberian + $pemberian_lain;

            $pemakaian = Pemakaian::where('obat_id', $obat->id)
                ->when($this->laporanbulan, function ($q) {
                    $q->whereMonth('tanggal_pemakaian', $this->laporanbulan);
                })
                ->when($this->tahun, function ($q) {
                    $q->whereYear('tanggal_pemakaian', $this->tahun);
                })
                ->sum('jumlah_pemakaian');

            $ed_rusak = ObatSampah::where('obat_id', $obat->id)
                ->when($this->laporanbulan, function ($q) {
                    $q->whereMonth('tanggal', $this->laporanbulan);
                })
                ->when($this->tahun, function ($q) {
                    $q->whereYear('tanggal', $this->tahun);
                })
                ->sum('jumlah_obat');

            $sisa_stok = $persediaan - $pemakaian - $ed_rusak;

            $permintaan = Permintaan::where('obat_id', $obat->id)
                ->when($this->permintaanbulan, function ($q) {
                    $q->whereMonth('tanggal_permintaan', $this->permintaanbulan);
                })
                ->when($this->tahun, function ($q) {
                    $q->whereYear('tanggal_permintaan', $this->tahun);
                })
                ->sum('jumlah_permintaan');

            $laporan[] = [
                $obat->nama_obat,
                $obat->dosis,
                $obat->satuan,
                $stok_awal,
                $pemberian,
                $pemberian_lain,
                $persediaan,
                $pemakaian,
                $ed_rusak,
                $sisa_stok,
                $permintaan
            ];
        }

        return collect($laporan);
    }

    public function headings(): array
    {
        return [
            'Nama Obat',
            'Dosis',
            'Satuan',
            'Stok Awal',
            'Pemberian',
            'Pemberian Lain',
            'Persediaan',
            'Pemakaian',
            'ED/Rusak',
            'Sisa Stok',
            'Permintaan'
        ];
    }
}