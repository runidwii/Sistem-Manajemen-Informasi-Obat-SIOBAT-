@extends('layouts.app')
@section('title', 'Edit Data Pemakaian')
@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Edit Data Pemakaian Obat</h2>
    </div>

    <form action="{{ route('pemakaian.update', $pemakaian->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label>Kode Resep</label>

                <input type="text"
                       name="id_resep"
                       value="{{ old('id_resep', $pemakaian->id_resep) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Nama Obat</label>

                <div class="select-wrapper">

                    <select name="obat_id" required>

                        <option value="">
                            Pilih Obat
                        </option>

                        @foreach($obat as $item)

                            <option value="{{ $item->id }}"
                                {{ $item->id == $pemakaian->obat_id ? 'selected' : '' }}>

                                {{ $item->nama_obat }}

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
                       value="{{ old('jumlah_pemakaian', $pemakaian->jumlah_pemakaian) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Tanggal Pemakaian</label>

                <input type="date"
                       name="tanggal_pemakaian"
                       value="{{ old('tanggal_pemakaian', $pemakaian->tanggal_pemakaian) }}"
                       required>
            </div>

        </div>

        <div class="form-action">

            <a href="{{ route('pemakaian.index') }}" class="btn-batal">
                Batal
            </a>

            <button type="submit" class="btn-simpan">
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection