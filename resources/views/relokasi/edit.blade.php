@extends('layouts.app')
@section('title', 'Edit Data Relokasi Obat')
@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Edit Data Relokasi Obat</h2>
    </div>

    <form action="{{ route('relokasi.update', $relokasi->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label>Nama Obat</label>

                <div class="select-wrapper">

                    <select name="obat_id" required>

                        <option value="">
                            Pilih Obat
                        </option>

                        @foreach ($obat as $item)

                            <option value="{{ $item->id }}"
                                {{ $item->id == $relokasi->obat_id ? 'selected' : '' }}>

                                {{ $item->nama_obat }}
                                -
                                {{ $item->dosis }}

                            </option>

                        @endforeach

                    </select>

                    <span class="material-icons-round select-icon">
                        expand_more
                    </span>

                </div>
            </div>

            <div class="form-group">
                <label>Jumlah Relokasi</label>

                <input type="number"
                    name="jumlah_relokasi"
                    value="{{ old('jumlah_relokasi', $relokasi->jumlah_relokasi) }}"
                    placeholder="Masukkan jumlah">
            </div>

            <div class="form-group">
                <label>Tanggal Relokasi</label>

                <input type="date"
                    name="tanggal_relokasi"
                    value="{{ old('tanggal_relokasi', $relokasi->tanggal_relokasi) }}">
            </div>

            <div class="form-group">
                <label>Peruntukkan Bulan</label>

                <input type="month"
                    name="peruntukan_bulan"
                    value="{{ old('peruntukan_bulan', $relokasi->peruntukan_bulan) }}">
            </div>

            <div class="form-group">
                <label>Asal</label>

                <input type="text"
                    name="asal"
                    value="{{ old('asal', $relokasi->asal) }}"
                    placeholder="Contoh: Gudang Utama">
            </div>

            <div class="form-group">
                <label>Tujuan</label>

                <input type="text"
                    name="tujuan"
                    value="{{ old('tujuan', $relokasi->tujuan) }}"
                    placeholder="Contoh: Puskesmas A">
            </div>

        </div>

        <div class="form-group full">

            <label>Keterangan</label>

            <textarea
                name="keterangan"
                rows="4"
                placeholder="Masukkan keterangan">{{ old('keterangan', $relokasi->keterangan) }}</textarea>

        </div>

        <div class="form-action">

            <a href="{{ route('input.index') }}" class="btn-batal">
                Batal
            </a>

            <button type="submit" class="btn-simpan">
                Update Data
            </button>

        </div>

    </form>

</div>

@endsection