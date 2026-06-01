@extends('layouts.app')

@section('content')

{{-- ============================================================
     Halaman: Obat Rusak (Tabel Detail)
     File   : resources/views/persediaan/rusak.blade.php
     ============================================================ --}}

<div class="persediaan-wrapper">

    {{-- Tombol kembali + Judul --}}
    <div class="page-header">
        <a href="{{ route('persediaan.index') }}" class="back-link">
            <span class="material-icons">arrow_back</span>
            <span>Obat Rusak</span>
        </a>
    </div>

    {{-- Toolbar: tombol Input Data & Filter Tanggal --}}
    <div class="toolbar">
        {{-- Tombol tambah data --}}
        <a href="{{ route('persediaan.rusak.create') }}" class="btn-input-data">
            <span class="material-icons btn-icon">add</span>
            Input Data
        </a>

        {{-- Filter rentang tanggal --}}
        <div class="date-filter">
            <div class="date-badge">
                <span class="material-icons date-icon">calendar_today</span>
                <span class="date-text">01-01-2022</span>
            </div>
            <span class="date-separator">sampai</span>
            <div class="date-badge">
                <span class="material-icons date-icon">calendar_today</span>
                <span class="date-text">31-12-2026</span>
            </div>
        </div>
    </div>

    {{-- Tabel Data Obat Rusak --}}
    <div class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>
                        Kode Obat
                        <span class="material-icons sort-icon">unfold_more</span>
                    </th>
                    <th>
                        Nama Obat
                        <span class="material-icons sort-icon">unfold_more</span>
                    </th>
                    <th>
                        Jumlah Obat
                        <span class="material-icons sort-icon">unfold_more</span>
                    </th>
                    <th>
                        Tanggal Teridentifikasi
                        <span class="material-icons sort-icon">unfold_more</span>
                    </th>
                    <th>
                        Peruntukan Bulan
                        <span class="material-icons sort-icon">unfold_more</span>
                    </th>
                    <th>
                        Kode Masuk Obat
                        <span class="material-icons sort-icon">unfold_more</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- Data dummy sesuai referensi --}}
                <tr>
                    <td class="td-center">1</td>
                    <td></td>
                    <td>Diazepam</td>
                    <td>05 strip</td>
                    <td>12-01-2025</td>
                    <td>09-2025</td>
                    <td>T000010</td>
                </tr>
                <tr>
                    <td class="td-center">2</td>
                    <td></td>
                    <td>Cefadroxil</td>
                    <td>20 strip</td>
                    <td>12-01-2025</td>
                    <td>11-2025</td>
                    <td>M000012</td>
                </tr>
                <tr>
                    <td class="td-center">3</td>
                    <td></td>
                    <td>Ranitidine</td>
                    <td>08 strip</td>
                    <td>12-02-2025</td>
                    <td>06-2025</td>
                    <td>T000027</td>
                </tr>
                <tr>
                    <td class="td-center">4</td>
                    <td></td>
                    <td>Haloperidol</td>
                    <td>20 strip</td>
                    <td>25-01-2026</td>
                    <td>09-2026</td>
                    <td>T000011</td>
                </tr>
                <tr>
                    <td class="td-center">5</td>
                    <td></td>
                    <td>Chlorpromazine</td>
                    <td>20 strip</td>
                    <td>25-01-2026</td>
                    <td>09-2026</td>
                    <td>T000012</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Tidak ada pagination pada halaman Obat Rusak sesuai referensi --}}

</div>

@endsection
