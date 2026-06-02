@extends('layouts.app')
@section('title', 'Detail Obat')
@section('content')
<div class="form-card">
    <div class="form-header">
        <h2>Detail Data Obat</h2>
    </div>

    <div class="form-grid">
        <div class="form-group">
            <label>Kode Obat</label>
            <input type="text" value="{{ $obat->kode_obat }}" readonly>
        </div>

        <div class="form-group">
            <label>Nama Obat</label>
            <input type="text" value="{{ $obat->nama_obat }}" readonly>
        </div>

        <div class="form-group">
            <label>Dosis</label>
            <input type="text" value="{{ $obat->dosis }}" readonly>
        </div>

        <div class="form-group">
            <label>Satuan</label>
            <input type="text" value="{{ $obat->satuan }}" readonly>
        </div>

        <div class="form-group full">
            <label>Kategori Obat</label>
            <input type="text" value="{{ $obat->kategori_obat }}" readonly>
        </div>
    </div>

    <div class="form-action">
        <a href="{{ route('obat.index') }}" class="btn-batal">
            Kembali
        </a>
    </div>
</div>
@endsection