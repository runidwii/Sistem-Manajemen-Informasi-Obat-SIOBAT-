@extends('layouts.app')
@section('title', 'Pemantauan Permintaan')
@section('content')

{{-- Link Google Icons --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

{{-- Custom CSS untuk halaman ini --}}
<link rel="stylesheet" href="{{ asset('css/pemantauanpermintaan.css') }}">

<div class="pemantauan-wrapper">

    {{-- Header: judul + filter tanggal --}}
    <div class="pemantauan-header">

        {{-- Tombol kembali --}}
        <a href="{{ route('persediaanobat.index') }}" class="btn-back">
            <span class="material-symbols-outlined">arrow_back</span>
            Pemantauan Permintaan
        </a>

        {{-- Filter tanggal --}}
        <div class="date-filter">
            <div class="date-input-wrap">
                <span class="material-symbols-outlined date-icon">calendar_month</span>
                <input
                    type="date"
                    id="tanggal_mulai"
                    name="tanggal_mulai"
                    class="date-input"
                    value="{{ $tanggalMulai ?? '2026-01-01' }}"
                >
            </div>

            <span class="date-separator">sampai</span>

            <div class="date-input-wrap">
                <span class="material-symbols-outlined date-icon">calendar_month</span>
                <input
                    type="date"
                    id="tanggal_akhir"
                    name="tanggal_akhir"
                    class="date-input"
                    value="{{ $tanggalAkhir ?? '2026-12-31' }}"
                >
            </div>
        </div>
    </div>

    {{-- Tabel Pemantauan Permintaan --}}
    <div class="table-container">
        <table class="permintaan-table">
            <thead>
                <tr>
                    <th>No</th>
                    {{-- Kolom sortable --}}
                    <th class="sortable">
                        Kode Pengajuan
                        <span class="material-symbols-outlined sort-icon">unfold_more</span>
                    </th>
                    <th class="sortable">
                        Nama Obat
                        <span class="material-symbols-outlined sort-icon">unfold_more</span>
                    </th>
                    <th class="sortable">
                        Jumlah Obat
                        <span class="material-symbols-outlined sort-icon">unfold_more</span>
                    </th>
                    <th class="sortable">
                        Tanggal Order
                        <span class="material-symbols-outlined sort-icon">unfold_more</span>
                    </th>
                    <th class="sortable">
                        Estimasi Tiba
                        <span class="material-symbols-outlined sort-icon">unfold_more</span>
                    </th>
                    <th class="sortable">
                        Lacak Permintaan
                        <span class="material-symbols-outlined sort-icon">unfold_more</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($permintaan as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['kode_pengajuan'] }}</td>
                    <td>{{ $item['nama_obat'] }}</td>
                    <td>{{ $item['jumlah_obat'] }}</td>
                    <td>{{ $item['tanggal_order'] }}</td>
                    <td>{{ $item['estimasi_tiba'] }}</td>
                    <td>
                        {{-- Badge status dengan warna berbeda --}}
                        <span class="badge badge--{{ strtolower(str_replace(' ', '-', $item['status'])) }}">
                            {{ $item['status'] }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty-state">Tidak ada data permintaan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection