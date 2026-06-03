@extends('layouts.app')
@section('title', 'Tambah Data Obat')
@section('content')
<div class="form-card">
    <div class="form-header">
        <h2>Tambah Data Obat</h2>
    </div>

    <form action="{{ route('obat.store') }}" method="POST">
        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Kode Obat</label>
                <input type="text" name="kode_obat" placeholder="Masukkan kode obat">
            </div>

            <div class="form-group">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" placeholder="Masukkan nama obat">
            </div>

            <div class="form-group">
                <label>Dosis</label>
                <input type="text" name="dosis" placeholder="Contoh: 500 mg">
            </div>

            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" placeholder="Contoh: Tablet">
            </div>

            <div class="form-group full">
                <label>Kategori Obat</label>
                
                <div class="select-wrapper">
                    <select name="kategori_obat" required>
                        <option value="">
                            Pilih Kategori
                        </option>

                        <option value="Generik">
                            Generik
                        </option>

                        <option value="Psikotropika">
                            Psikotropika
                        </option>
                    </select>

                    <span class="material-icons-round select-icon">
                        expand_more
                    </span>
                </div>
            </div>
        </div>

        <div class="form-action">
            <a href="/obat" class="btn-batal">
                Batal
            </a>

            <button type="submit" class="btn-simpan">
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection