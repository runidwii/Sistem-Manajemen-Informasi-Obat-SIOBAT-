@extends('layouts.app')
@section('title', 'Detail Permintaan')
@section('content')

<link rel="stylesheet" href="{{ asset('css/permintaan.css') }}">

<div class="form-card">

    <div class="form-header">
        <h2>Detail Permintaan Obat</h2>
        <p class="form-subtitle">Informasi lengkap data permintaan obat</p>
    </div>

    <div class="form-grid">

        <div class="form-group">
            <label>Kode Permintaan</label>
            <input type="text"
                   value="{{ $permintaan->kode_permintaan }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Nama Obat</label>
            <input type="text"
                   value="{{ $permintaan->obat->nama_obat ?? '-' }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Stok Awal</label>
            <input type="text"
                   value="{{ $permintaan->stok_awal }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Jumlah Permintaan</label>
            <input type="text"
                   value="{{ $permintaan->jumlah_permintaan }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Tanggal Permintaan</label>
            <input type="text"
                   value="{{ $permintaan->tanggal_permintaan }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Peruntukan Bulan</label>
            <input type="text"
                   value="{{ $permintaan->peruntukan_bulan }}"
                   readonly>
        </div>

        <div class="form-group full">
            <label>Supplier</label>
            <input type="text"
                   value="{{ $permintaan->supplier }}"
                   readonly>
        </div>

    </div>

    <div class="form-group full">
        <label>Catatan</label>
        <textarea rows="4" readonly>{{ $permintaan->catatan }}</textarea>
    </div>

    <div class="form-action">
        <a href="{{ route('input.index') }}" class="btn-batal">
            Kembali
        </a>
    </div>

</div>

@endsection