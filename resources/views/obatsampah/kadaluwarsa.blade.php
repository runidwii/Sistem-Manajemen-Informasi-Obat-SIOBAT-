@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="{{ asset('css/obat-sampah.css') }}">

<div class="sampah-wrapper">

    {{-- ── Header: tombol kembali --}}
    <div class="tabel-header">
        <a href="{{ route('obatsampah.index') }}" class="btn-back">
            <span class="material-symbols-outlined">arrow_back</span>
            Obat Kadaluwarsa
        </a>
    </div>

    {{-- ── Baris aksi: tombol input + filter tanggal --}}
    <div class="aksi-bar">
        <a href="{{ route('obatkadaluwarsa.create') }}" class="btn-input">
            <span class="material-symbols-outlined">add</span>
            Input Data
        </a>

        <div class="date-filter">
            <div class="date-input-wrap">
                <span class="material-symbols-outlined date-icon">calendar_month</span>
                <input type="date" class="date-input" value="{{ $tanggalMulai ?? '2022-01-01' }}">
            </div>
            <span class="date-separator">sampai</span>
            <div class="date-input-wrap">
                <span class="material-symbols-outlined date-icon">calendar_month</span>
                <input type="date" class="date-input" value="{{ $tanggalAkhir ?? '2026-12-31' }}">
            </div>
        </div>
    </div>

    {{-- ── Tabel Obat Kedaluwarsa --}}
    <div class="table-container">
        <table class="sampah-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th><span class="th-inner">Kode Obat <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                    <th><span class="th-inner">Nama Obat <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                    <th><span class="th-inner">Jumlah Obat <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                    <th><span class="th-inner">Tanggal Kedaluwarsa <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                    <th><span class="th-inner">Peruntukan Bulan <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                    <th><span class="th-inner">Kode Masuk Obat <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                </tr>
            </thead>
            <tbody>
                @forelse($obatKedaluwarsa as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['kode_obat'] }}</td>
                    <td>{{ $item['nama_obat'] }}</td>
                    <td>{{ $item['jumlah_obat'] }}</td>
                    <td>{{ $item['tanggal_kedaluwarsa'] }}</td>
                    <td>{{ $item['peruntukan_bulan'] }}</td>
                    <td>{{ $item['kode_masuk_obat'] }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty-state">Tidak ada data obat kedaluwarsa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- ── Pagination --}}
    <div class="pagination-wrap">
        <button class="page-btn" disabled>
            <span class="material-symbols-outlined">chevron_left</span>
        </button>
        <button class="page-btn page-btn--active">1</button>
        <button class="page-btn">
            <span class="material-symbols-outlined">chevron_right</span>
        </button>
    </div>

</div>

@endsection