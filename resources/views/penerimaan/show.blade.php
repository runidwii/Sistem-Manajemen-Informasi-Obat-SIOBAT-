@extends('layouts.app')

@section('title', 'Detail Penerimaan')

@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Detail Data Penerimaan Obat</h2>
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
            <label>Jenis Obat</label>
            <input type="text"
                   value="{{ $penerimaan->jenis_obat }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Dosis Obat</label>
            <input type="text"
                   value="{{ $penerimaan->dosis }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Stok Awal Obat</label>
            <input type="text"
                   value="{{ number_format($penerimaan->stok_awal,0,',','.') }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Jumlah Obat Diterima</label>
            <input type="text"
                   value="{{ number_format($penerimaan->jumlah_diterima,0,',','.') }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Peruntukan Bulan</label>
            <input type="month"
                   value="{{ $penerimaan->peruntukan_bulan }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Tanggal Kadaluarsa</label>
            <input type="date"
                   value="{{ $penerimaan->tanggal_kadaluarsa }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Tanggal Penerimaan</label>
            <input type="date"
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

    <div class="form-action">

        <a href="{{ route('penerimaan.index') }}"
           class="btn-batal">
            Kembali
        </a>

        <a href="{{ route('penerimaan.edit', $penerimaan->id) }}"
           class="btn-simpan">
            Edit Data
        </a>

    </div>

</div>

@endsection