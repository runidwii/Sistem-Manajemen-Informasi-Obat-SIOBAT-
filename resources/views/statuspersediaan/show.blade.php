@extends('layouts.app')
@section('title', 'Detail Status Persediaan')
@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Detail Status Persediaan Obat</h2>
    </div>

    <div class="form-grid">

        <div class="form-group">
            <label>Nama Obat</label>

            <input type="text"
                   value="{{ $persediaan->obat->nama_obat ?? '-' }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Dosis Obat</label>

            <input type="text"
                   value="{{ $persediaan->obat->dosis ?? '-' }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Stok Terkini</label>

            <input type="text"
                   value="{{ $persediaan->stok_terkini }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Minimal Stok</label>

            <input type="text"
                   value="{{ $persediaan->minimal_stok }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Status Persediaan</label>

            <input type="text"
                   value="{{ $persediaan->status_persediaan }}"
                   readonly>
        </div>

    </div>

    <div class="form-action">

        <a href="{{ route('statuspersediaan.index') }}" class="btn-batal">
            Kembali
        </a>

    </div>

</div>

@endsection