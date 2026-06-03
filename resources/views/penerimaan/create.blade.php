@extends('layouts.app')

@section('title', 'Input Data')

@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Input Data Penerimaan Obat</h2>
    </div>

    <form action="{{ route('penerimaan.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Kode Penerimaan</label>
                <input type="text"
                    name="kode_penerimaan"
                    placeholder="PNR001">
            </div>

            <div class="form-group">
                <label>Nama Obat</label>

                <div class="select-wrapper">
                    <select name="permintaan_id" required>
                        <option value="">Pilih Permintaan</option>

                        @foreach($permintaan as $item)
                            <option value="{{ $item->id }}">
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
                    placeholder="Contoh: 500 mg">
            </div>

            <div class="form-group">
                <label>Stok Awal Obat</label>
                <input type="number"
                    name="stok_awal"
                    placeholder="20.000">
            </div>

            <div class="form-group">
                <label>Jumlah Obat Diterima</label>
                <input type="number"
                    name="jumlah_diterima"
                    placeholder="20.000">
            </div>

            <div class="form-group">
                <label>Peruntukan Bulan</label>
                <input type="month"
                    name="peruntukan_bulan">
            </div>

            <div class="tiga">
                <div class="form-group">
                    <label>Tanggal Kadaluarsa</label>
                    <input type="date"
                        name="tanggal_kadaluarsa">
                </div>

                <div class="form-group">
                    <label>Tanggal Penerimaan</label>
                    <input type="date"
                        name="tanggal_diterima">
                </div>

                <div class="form-group">
                    <label>Pemasok</label>
                    <input type="text"
                        name="pemasok"
                        placeholder="Contoh: Dinas Kesehatan">
                </div>
            </div>

            <div class="form-group full">
                <label>Catatan</label>

                <textarea name="catatan"
                    rows="4"
                    placeholder="Masukkan catatan"></textarea>
            </div>
        </div>

        <div class="form-action">
            <a href="/input" class="btn-batal">
                Batal
            </a>

            <button type="submit" class="btn-simpan">
                Simpan Data
            </button>
        </div>
    </form>
</div>



@endsection