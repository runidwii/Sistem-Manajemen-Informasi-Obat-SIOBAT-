@extends('layouts.app')

@section('title', 'Edit Penerimaan')

@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Edit Data Penerimaan Obat</h2>
    </div>

    <form action="{{ route('penerimaan.update',$penerimaan->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label>Kode Penerimaan</label>
                <input type="text"
                    name="kode_penerimaan"
                    value="{{ old('kode_penerimaan',$penerimaan->kode_penerimaan) }}">
            </div>

            <div class="form-group">
                <label>Nama Obat</label>

                <div class="select-wrapper">
                    <select name="permintaan_id">

                        @foreach($permintaan as $item)
                            <option value="{{ $item->id }}"
                                {{ $penerimaan->permintaan_id == $item->id ? 'selected' : '' }}>
                                {{ $item->obat->nama_obat }}
                                - {{ $item->jumlah_permintaan }}
                            </option>
                        @endforeach

                    </select>

                    <span class="material-icons-round select-icon">
                        expand_more
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label>Dosis Obat</label>
                <input type="text"
                    name="dosis"
                    value="{{ old('dosis',$penerimaan->dosis_obat) }}">
            </div>

            <div class="form-group">
                <label>Stok Awal Obat</label>
                <input type="number"
                    name="stok_awal"
                    value="{{ old('stok_awal',$penerimaan->stok_awal) }}">
            </div>

            <div class="form-group">
                <label>Jumlah Obat Diterima</label>
                <input type="number"
                    name="jumlah_diterima"
                    value="{{ old('jumlah_diterima',$penerimaan->jumlah_diterima) }}">
            </div>

            <div class="form-group">
                <label>Peruntukan Bulan</label>
                <input type="month"
                    name="peruntukan_bulan"
                    value="{{ old('peruntukan_bulan',$penerimaan->peruntukan_bulan) }}">
            </div>

            <div class="tiga">

                <div class="form-group">
                    <label>Tanggal Kadaluarsa</label>
                    <input type="date"
                        name="tanggal_kadaluarsa"
                        value="{{ old('tanggal_kadaluarsa',$penerimaan->tanggal_kadaluarsa) }}">
                </div>

                <div class="form-group">
                    <label>Tanggal Penerimaan</label>
                    <input type="date"
                        name="tanggal_diterima"
                        value="{{ old('tanggal_diterima',$penerimaan->tanggal_diterima) }}">
                </div>

                <div class="form-group">
                    <label>Pemasok</label>
                    <input type="text"
                        name="pemasok"
                        value="{{ old('pemasok',$penerimaan->pemasok) }}">
                </div>

            </div>

            <div class="form-group full">
                <label>Catatan</label>

                <textarea name="catatan"
                    rows="4">{{ old('catatan',$penerimaan->catatan) }}</textarea>
            </div>

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