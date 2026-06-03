@extends('layouts.app')
@section('title', 'Edit Permintaan')
@section('content')

<link rel="stylesheet" href="{{ asset('css/permintaan.css') }}">

<div class="form-card">

    <div class="form-header">
        <h2>Edit Permintaan Obat</h2>
        <p class="form-subtitle">Perbarui data permintaan obat</p>
    </div>

    <form action="{{ route('permintaan.update', $permintaan->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-grid">

            {{-- KODE PERMINTAAN --}}
            <div class="form-group">
                <label>Kode Permintaan</label>
                <input type="text"
                       name="kode_permintaan"
                       value="{{ old('kode_permintaan', $permintaan->kode_permintaan) }}">
            </div>

            {{-- NAMA OBAT --}}
            <div class="form-group">
                <label>Nama Obat</label>
                <div class="select-wrapper">
                    <select name="obat_id" required>

                        @foreach ($obat as $item)
                            <option value="{{ $item->id }}"
                                {{ $permintaan->obat_id == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_obat }} - {{ $item->dosis }}
                            </option>
                        @endforeach

                    </select>

                    <span class="material-icons-round select-icon">
                        expand_more
                    </span>
                </div>
            </div>

            {{-- STOK AWAL --}}
            <div class="form-group">
                <label>Stok Awal Obat</label>

                <div class="input-satuan-wrapper">

                    <input type="number"
                           name="stok_awal"
                           min="0"
                           value="{{ old('stok_awal', $permintaan->stok_awal) }}">

                    <div class="select-wrapper satuan-select">

                        <select name="satuan_stok_awal">

                            @php
                                $satuan = [
                                    'Tablet','Kapsul','Kaplet','Strip',
                                    'Box','Botol','Ampul','Vial',
                                    'Tube','Sachet','Sirup','Injeksi'
                                ];
                            @endphp

                            @foreach($satuan as $item)
                                <option value="{{ $item }}"
                                    {{ $permintaan->satuan_stok_awal == $item ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach

                        </select>

                        <span class="material-icons-round select-icon">
                            expand_more
                        </span>

                    </div>

                </div>
            </div>

            {{-- JUMLAH PERMINTAAN --}}
            <div class="form-group">
                <label>Jumlah Permintaan</label>

                <div class="input-satuan-wrapper">

                    <input type="number"
                           name="jumlah_permintaan"
                           min="0"
                           value="{{ old('jumlah_permintaan', $permintaan->jumlah_permintaan) }}">

                    <div class="select-wrapper satuan-select">

                        <select name="satuan_jumlah">

                            @foreach($satuan as $item)
                                <option value="{{ $item }}"
                                    {{ $permintaan->satuan_jumlah == $item ? 'selected' : '' }}>
                                    {{ $item }}
                                </option>
                            @endforeach

                        </select>

                        <span class="material-icons-round select-icon">
                            expand_more
                        </span>

                    </div>

                </div>
            </div>

            {{-- TANGGAL --}}
            <div class="form-group">
                <label>Tanggal Permintaan</label>

                <input type="date"
                       name="tanggal_permintaan"
                       value="{{ old('tanggal_permintaan', $permintaan->tanggal_permintaan) }}">
            </div>

            {{-- BULAN --}}
            <div class="form-group">
                <label>Peruntukan Bulan</label>

                <div class="select-wrapper">

                    <select name="peruntukan_bulan">

                        @php
                            $bulan = [
                                1=>'Januari',
                                2=>'Februari',
                                3=>'Maret',
                                4=>'April',
                                5=>'Mei',
                                6=>'Juni',
                                7=>'Juli',
                                8=>'Agustus',
                                9=>'September',
                                10=>'Oktober',
                                11=>'November',
                                12=>'Desember'
                            ];
                        @endphp

                        @foreach($bulan as $key => $nama)
                            <option value="{{ $key }}"
                                {{ $permintaan->peruntukan_bulan == $key ? 'selected' : '' }}>
                                {{ $nama }}
                            </option>
                        @endforeach

                    </select>

                    <span class="material-icons-round select-icon">
                        expand_more
                    </span>

                </div>
            </div>

            {{-- SUPPLIER --}}
            <div class="form-group full">
                <label>Supplier</label>

                <input type="text"
                       name="supplier"
                       value="{{ old('supplier', $permintaan->supplier) }}">
            </div>

        </div>

        {{-- CATATAN --}}
        <div class="form-group full">
            <label>Catatan</label>

            <textarea name="catatan"
                      rows="4">{{ old('catatan', $permintaan->catatan) }}</textarea>
        </div>

        <div class="form-action">

            <a href="{{ route('input.index') }}"
               class="btn-batal">
                Batal
            </a>

            <button type="submit"
                    class="btn-simpan">
                Simpan Data
            </button>

        </div>

    </form>

</div>

@endsection