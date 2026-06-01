@extends('layouts.app')

@section('content')

{{-- ============================================================
     Halaman: Obat Kadaluwarsa (Tabel Detail)
     File   : resources/views/persediaan/kadaluwarsa.blade.php
     ============================================================ --}}

<div class="persediaan-wrapper">

    {{-- Tombol kembali + Judul --}}
    <div class="page-header">
        <a href="{{ route('persediaan.index') }}" class="back-link">
            <span class="material-icons">arrow_back</span>
            <span>Obat Kadaluwarsa</span>
        </a>
    </div>

    {{-- Toolbar: tombol Input Data & Filter Tanggal --}}
    <div class="toolbar">
        {{-- Tombol tambah data --}}
        <a href="{{ route('persediaan.kadaluwarsa.create') }}" class="btn-input-data">
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

    {{-- Tabel Data Obat Kadaluwarsa --}}
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
                        Tanggal Kedaluwarsa
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
                    <td>123456</td>
                    <td>Diazepam</td>
                    <td>05 strip</td>
                    <td>12-01-2026</td>
                    <td>09-2022</td>
                    <td>T000010</td>
                </tr>
                <tr>
                    <td class="td-center">2</td>
                    <td>123457</td>
                    <td>Cefadroxil</td>
                    <td>20 strip</td>
                    <td>12-01-2026</td>
                    <td>11-2022</td>
                    <td>M000012</td>
                </tr>
                <tr>
                    <td class="td-center">3</td>
                    <td>123458</td>
                    <td>Ranitidine</td>
                    <td>08 strip</td>
                    <td>12-01-2026</td>
                    <td>06-2022</td>
                    <td>T000027</td>
                </tr>
                <tr>
                    <td class="td-center">4</td>
                    <td>123459</td>
                    <td>Haloperidol</td>
                    <td>20 strip</td>
                    <td>12-01-2026</td>
                    <td>09-2022</td>
                    <td>T000011</td>
                </tr>
                <tr>
                    <td class="td-center">5</td>
                    <td>123460</td>
                    <td>Chlorpromazine</td>
                    <td>20 strip</td>
                    <td>12-01-2026</td>
                    <td>09-2022</td>
                    <td>T000012</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="pagination">
        <button class="page-btn page-prev" disabled>
            <span class="material-icons">chevron_left</span>
        </button>
        <button class="page-btn page-active">1</button>
        <button class="page-btn">
            <span class="material-icons">chevron_right</span>
        </button>
    </div>

</div>

@endsection
