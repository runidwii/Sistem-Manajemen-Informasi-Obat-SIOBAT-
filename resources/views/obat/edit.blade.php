@extends('layouts.app')
@section('title', 'Edit Data Obat')
@section('content')
<div class="form-card">
    <div class="form-header">
        <h2>Edit Data Obat</h2>
    </div>

    <form action="{{ route('obat.update', $obat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div class="form-group">
                <label>Kode Obat</label>
                <input type="text" name="kode_obat" value="{{ $obat->kode_obat }}">
            </div>

            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" value="{{ $obat->nama_obat }}">
            </div>

            <div class="form-group">
                <label>Dosis</label>
                <input type="text" name="dosis" value="{{ $obat->dosis }}">
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" value="{{ $obat->satuan }}">
            </div>

            <div class="form-group full">
                <label>Kategori Obat</label>

                <div class="select-wrapper">
                    <select name="kategori_obat">
                        <option value="Generik"
                            {{ $obat->kategori_obat == 'Generik' ? 'selected' : '' }}>
                            Generik
                        </option>

                        <option value="Psikotropika"
                            {{ $obat->kategori_obat == 'Psikotropika' ? 'selected' : '' }}>
                            Psikotropika
                        </option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-action">
            <a href="{{ route('obat.index') }}"
               class="btn-batal">
                Batal
            </a>

            <button type="submit"
                    class="btn-simpan">
                Update Data
            </button>
        </div>
    </form>
</div>
@endsection