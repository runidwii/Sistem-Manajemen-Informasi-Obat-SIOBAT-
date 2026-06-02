@extends('layouts.app')
@section('title', 'Detail Data Relokasi Obat')
@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Detail Data Relokasi Obat</h2>
    </div>

    <div class="form-grid">

        <div class="form-group">
            <label>Nama Obat</label>

            <input type="text"
                   value="{{ $relokasi->obat->nama_obat }} - {{ $relokasi->obat->dosis }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Jumlah Relokasi</label>

            <input type="text"
                   value="{{ $relokasi->jumlah_relokasi }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Tanggal Relokasi</label>

            <input type="text"
                   value="{{ $relokasi->tanggal_relokasi }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Peruntukkan Bulan</label>

            <input type="text"
                   value="{{ $relokasi->peruntukan_bulan }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Asal</label>

            <input type="text"
                   value="{{ $relokasi->asal }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Tujuan</label>

            <input type="text"
                   value="{{ $relokasi->tujuan }}"
                   readonly>
        </div>

    </div>

    <div class="form-group full">

        <label>Keterangan</label>

        <textarea rows="4" readonly>{{ $relokasi->keterangan }}</textarea>

    </div>

    <div class="form-action">

        <a href="{{ route('input.index') }}" class="btn-batal">
            Kembali
        </a>
    </div>
</div>

@endsection