@extends('layouts.app')

@section('title', 'Detail Penerimaan')

@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Detail Penerimaan Obat</h2>
    </div>

    <div class="form-grid">

        <div class="form-group">
            <label>Kode Penerimaan</label>
            <input type="text"
                value="{{ $penerimaan->kode_penerimaan }}"
                readonly>
        </div>

        <div class="form-group">
            <label>Nama Obat</label>
            <input type="text"
                value="{{ $penerimaan->permintaan->obat->nama_obat ?? '-' }}"
                readonly>
        </div>

        <div class="form-group">
            <label>Dosis Obat</label>
            <input type="text"
                value="{{ $penerimaan->dosis_obat }}"
                readonly>
        </div>

        <div class="form-group">
            <label>Stok Awal Obat</label>
            <input type="text"
                value="{{ $penerimaan->stok_awal }}"
                readonly>
        </div>

        <div class="form-group">
            <label>Jumlah Obat Diterima</label>
            <input type="text"
                value="{{ $penerimaan->jumlah_diterima }}"
                readonly>
        </div>

        <div class="form-group">
            <label>Peruntukan Bulan</label>
            <input type="text"
                value="{{ $penerimaan->peruntukan_bulan }}"
                readonly>
        </div>

        <div class="tiga">

            <div class="form-group">
                <label>Tanggal Kadaluarsa</label>
                <input type="text"
                    value="{{ $penerimaan->tanggal_kadaluarsa }}"
                    readonly>
            </div>

            <div class="form-group">
                <label>Tanggal Penerimaan</label>
                <input type="text"
                    value="{{ $penerimaan->tanggal_diterima }}"
                    readonly>
            </div>

            <div class="form-group">
                <label>Pemasok</label>
                <input type="text"
                    value="{{ $penerimaan->pemasok }}"
                    readonly>
            </div>

        </div>

        <div class="form-group full">
            <label>Catatan</label>

            <textarea rows="4" readonly>{{ $penerimaan->catatan }}</textarea>
        </div>

    </div>

    <div class="form-action">
        <a href="{{ route('input.index') }}"
            class="btn-batal">
            Kembali
        </a>
    </div>

</div>

@endsection