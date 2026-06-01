@extends('layouts.app')
@section('title', 'Laporan')
@section('content')

<div class="laporan-card">
    <!-- Header -->
    <div class="page-header">
        <div>
            <h1>LAPORAN PEMAKAIAN DAN LEMBAR PERMINTAAN OBAT</h1>
            <p>(LPLPO)</p>
        </div>
    </div>

    <!-- Filter -->
    <form method="GET" action="{{ route('laporan.index') }}" class="mb-3">
        <table>
            <tr>
                <td><strong>Nama Puskesmas</strong></td>
                <td>:</td>
                <td>Ngaglik II</td>
            </tr>
            <tr>
                <td><strong>Laporan Bulan</strong></td>
                <td>:</td>
                <td>
                    <select name="laporanbulan" class="form-select">
                        <option value="">Pilih Bulan</option>
                        @foreach (range(1, 12) as $laporanbulan)
                            <option value="{{ $laporanbulan }}" {{ request('laporanbulan') == $laporanbulan ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $laporanbulan)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Permintaan Bulan</strong></td>
                <td>:</td>
                <td>
                    <select name="permintaanbulan" class="form-select">
                        <option value="">Pilih Bulan</option>
                        @foreach (range(1, 12) as $permintaanbulan)
                            <option value="{{ $permintaanbulan }}" {{ request('permintaanbulan') == $permintaanbulan ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $permintaanbulan)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>Tahun</strong></td>
                <td>:</td>
                <td>
                    <select name="tahun" class="form-select">
                        <option value="">Pilih Tahun</option>
                        @foreach (range(date('Y') - 5, date('Y')) as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary mt-2">Filter</button>
    </form>

    <!-- Table -->
    <div class="table-wrapper">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Dosis</th>
                    <th>Satuan</th>
                    <th>Stok Awal</th>
                    <th>Pemberian</th>
                    <th>Pemberian Lain</th>
                    <th>Persediaan</th>
                    <th>Pemakaian</th>
                    <th>ED/Rusak</th>
                    <th>Sisa Stok</th>
                    <th>Permintaan</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($laporan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item['nama_obat'] }}</td>
                    <td>{{ $item['dosis'] }}</td>
                    <td>{{ $item['satuan'] }}</td>
                    <td>{{ $item['stok_awal'] }}</td>
                    <td>{{ $item['pemberian'] }}</td>
                    <td>{{ $item['pemberian_lain'] }}</td>
                    <td>{{ $item['persediaan'] }}</td>
                    <td>{{ $item['pemakaian'] }}</td>
                    <td>{{ $item['ed_rusak'] }}</td>
                    <td>{{ $item['sisa_stok'] }}</td>
                    <td>{{ $item['permintaan'] }}</td>
                </tr>

                @empty
                <tr>
                    <td colspan="12">
                        Data belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!--Eksport-->
    <div class="export-section">
        <a href="{{ route('laporan.excel', ['laporanbulan' => request('laporanbulan'),'permintaanbulan' => request('permintaanbulan'), 'tahun' => request('tahun')]) }}" class="btn btn-success">
            <i class='bx bxs-file-export'></i> Unduh Excel
        </a>
        <a href="{{ route('laporan.pdf', ['laporanbulan' => request('laporanbulan'),'permintaanbulan' => request('permintaanbulan'), 'tahun' => request('tahun')]) }}" class="btn btn-danger">
            <i class='bx bxs-file-pdf'></i> Unduh PDF
        </a>
    </div>
</div>

@endsection