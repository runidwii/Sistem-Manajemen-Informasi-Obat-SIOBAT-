@extends('layouts.app')
@section('title', 'Status Persediaan')
@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Tambah Status Persediaan</h2>
    </div>

    <form action="{{ route('persediaan.store') }}" method="POST">

        @csrf

        <div class="form-grid">

            <div class="form-group">

                <label>Nama Obat</label>

                <div class="select-wrapper">

                    <select name="obat_id" required>

                        <option value="">
                            Pilih Obat
                        </option>

                        @foreach($obat as $item)

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

                <label>Stok</label>

                <input type="number"
                       name="stok_terkini"
                       placeholder="Masukkan jumlah stok">

            </div>

            <div class="form-group">

                <label>Minimal Stok</label>

                <input type="number"
                       name="minimal_stok"
                       placeholder="Masukkan minimal stok">

            </div>

            <div class="form-group">

                <label>Tanggal</label>

                <input type="date"
                       name="tanggal">

            </div>

        </div>

        <div class="form-action">

            <a href="/persediaan" class="btn-batal">
                Batal
            </a>

            <button type="submit" class="btn-simpan">
                Simpan Data
            </button>

        </div>

    </form>

</div>

@endsection