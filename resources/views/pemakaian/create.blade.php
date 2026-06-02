@extends('layouts.app')
@section('title', 'Input Data')
@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Input Data Pemakaian Obat</h2>
    </div>

    <form action="{{ route('pemakaian.store') }}" method="POST">

        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Kode Resep</label>

                <input type="text"
                    name="id_resep"
                    placeholder="Masukkan ID Resep"
                    required>
            </div>

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
                <label>Jumlah Pemakaian</label>

                <input type="number"
                    name="jumlah_pemakaian"
                    placeholder="Masukkan jumlah pemakaian"
                    required>
            </div>

            <div class="form-group">
                <label>Tanggal Pemakaian</label>

                <input type="date"
                    name="tanggal_pemakaian"
                    required>
            </div>

        </div>

        <div class="form-action">

            <a href="{{ route('pemakaian.index') }}"
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