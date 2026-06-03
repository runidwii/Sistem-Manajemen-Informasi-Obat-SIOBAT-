@extends('layouts.app')
@section('title', 'Detail Data Pemakaian')
@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Detail Data Pemakaian Obat</h2>
    </div>

    <div class="form-grid">

        <div class="form-group">
            <label>Kode Resep</label>

            <input type="text"
                   value="{{ $pemakaian->id_resep }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Nama Obat</label>

            <input type="text"
                   value="{{ $pemakaian->obat->nama_obat ?? '-' }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Jumlah Pemakaian</label>

            <input type="text"
                   value="{{ $pemakaian->jumlah_pemakaian }}"
                   readonly>
        </div>

        <div class="form-group">
            <label>Tanggal Pemakaian</label>

            <input type="text"
                   value="{{ $pemakaian->tanggal_pemakaian }}"
                   readonly>
        </div>

    </div>

    <div class="form-action">

        <a href="{{ route('pemakaian.index') }}"
           class="btn-batal">

            Kembali

        </a>

    </div>

</div>

@endsection