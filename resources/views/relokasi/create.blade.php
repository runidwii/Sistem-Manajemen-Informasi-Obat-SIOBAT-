@extends('layouts.app')
@section('title', 'Data Relokasi Obat')
@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Input Data Relokasi Obat</h2>
    </div>

    <form action="{{ route('relokasi.store') }}" method="POST">

        @csrf
        <div class="form-grid">
            <div class="form-group">
                <label>Nama Obat</label>
                
                <div class="select-wrapper">
                    <select name="obat_id" required>
                        <option value="">
                            Pilih Obat
                        </option>

                         @foreach ($obat as $item)
                         <option value="{{ $item->id }}">
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
                    placeholder="Masukkan jumlah">
            </div>

            <div class="form-group">
                <label>Tanggal Relokasi</label>

                <input type="date"
                    name="tanggal_relokasi">
            </div>

            <div class="form-group">
                <label>Peruntukkan Bulan</label>

                <input type="month"
                    name="peruntukan_bulan">
            </div>

            <div class="form-group">
                <label>Asal</label>

                <input type="text"
                    name="asal"
                    placeholder="Contoh: Gudang Utama">
            </div>

            <div class="form-group">
                <label>Tujuan</label>

                <input type="text"
                    name="tujuan"
                    placeholder="Contoh: Puskesmas A">
            </div>

        </div>

        <div class="form-group full">
            <label>Keterangan</label>

            <textarea name="keterangan"
                rows="4"
                placeholder="Masukkan keterangan"></textarea>
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