@extends('layouts.app')
@section('title', 'Input Data')
@section('content')

<link rel="stylesheet" href="{{ asset('css/permintaan.css') }}">

<div class="form-card">

    <div class="form-header">
        <h2>Tambahkan Permintaan Obat Baru</h2>
        <p class="form-subtitle">Masukkan detail penerimaan obat baru</p>
    </div>

    <form action="{{ route('permintaan.store') }}" method="POST">

        @csrf

        <div class="form-grid">

            {{-- KODE PERMINTAAN --}}
            <div class="form-group">
                <label>Kode Permintaan</label>
                <input type="text"
                    name="kode_permintaan"
                    placeholder="Kode Permintaan"
                    value="{{ $kode_permintaan ?? '' }}">
            </div>

            {{-- NAMA OBAT --}}
            <div class="form-group">
                <label>Nama Obat</label>
                <div class="select-wrapper">
                    <select name="obat_id" required>
                        <option value="">-- Pilih Obat --</option>
                        @foreach ($obat as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->nama_obat }} - {{ $item->dosis }}
                        </option>
                        @endforeach
                    </select>
                    <span class="material-icons-round select-icon">expand_more</span>
                </div>
            </div>

            {{-- STOK AWAL OBAT --}}
            <div class="form-group">
                <label>Stok Awal Obat</label>
                <div class="input-satuan-wrapper">
                    <input type="number"
                        name="stok_awal"
                        placeholder="Masukkan stok awal"
                        min="0">
                    <div class="select-wrapper satuan-select">
                        <select name="satuan_stok_awal">
                            <option value="Tablet">Tablet</option>
                            <option value="Kapsul">Kapsul</option>
                            <option value="Kaplet">Kaplet</option>
                            <option value="Strip">Strip</option>
                            <option value="Box">Box</option>
                            <option value="Botol">Botol</option>
                            <option value="Ampul">Ampul</option>
                            <option value="Vial">Vial</option>
                            <option value="Tube">Tube</option>
                            <option value="Sachet">Sachet</option>
                            <option value="Sirup">Sirup</option>
                            <option value="Injeksi">Injeksi</option>
                        </select>
                        <span class="material-icons-round select-icon">expand_more</span>
                    </div>
                </div>
            </div>

            {{-- JUMLAH OBAT DIMINTA --}}
            <div class="form-group">
                <label>Jumlah Permintaan</label>
                <div class="input-satuan-wrapper">
                    <input type="number"
                        name="jumlah_permintaan"
                        placeholder="Masukkan jumlah"
                        min="0">
                    <div class="select-wrapper satuan-select">
                        <select name="satuan_jumlah">
                            <option value="Tablet">Tablet</option>
                            <option value="Kapsul">Kapsul</option>
                            <option value="Kaplet">Kaplet</option>
                            <option value="Strip">Strip</option>
                            <option value="Box">Box</option>
                            <option value="Botol">Botol</option>
                            <option value="Ampul">Ampul</option>
                            <option value="Vial">Vial</option>
                            <option value="Tube">Tube</option>
                            <option value="Sachet">Sachet</option>
                            <option value="Sirup">Sirup</option>
                            <option value="Injeksi">Injeksi</option>
                        </select>
                        <span class="material-icons-round select-icon">expand_more</span>
                    </div>
                </div>
            </div>

            {{-- TANGGAL PERMINTAAN --}}
            <div class="form-group">
                <label>Tanggal Permintaan</label>
                <input type="date"
                    name="tanggal_permintaan">
            </div>

            {{-- PERUNTUKAN BULAN --}}
            <div class="form-group">
                <label>Peruntukan Bulan</label>
                <div class="select-wrapper">
                    <select name="peruntukan_bulan">
                        <option value="">-- Pilih Bulan --</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <span class="material-icons-round select-icon">expand_more</span>
                </div>
            </div>

            {{-- SUPPLIER --}}
            <div class="form-group full">
                <label>Supplier</label>
                <input type="text"
                    name="supplier"
                    placeholder="Contoh: Dinas Kesehatan Kota">
            </div>

        </div>

        {{-- CATATAN --}}
        <div class="form-group full">
            <label>Catatan</label>
            <textarea name="catatan"
                rows="4"
                placeholder="Masukkan catatan tambahan..."></textarea>
        </div>

        <div class="form-action">
            <a href="/input" class="btn-batal">Batal</a>
            <button type="submit" class="btn-simpan">Simpan</button>
        </div>

    </form>

</div>

@endsection