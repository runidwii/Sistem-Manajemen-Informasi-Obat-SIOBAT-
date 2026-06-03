@extends('layouts.app')
@section('title', 'Edit Status Persediaan')
@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Edit Status Persediaan Obat</h2>
    </div>

    <form action="{{ route('statuspersediaan.update', $persediaan->id) }}" method="POST">

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
                                {{ $item->id == $persediaan->obat_id ? 'selected' : '' }}>

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
                <label>Stok Terkini</label>

                <input type="number"
                    name="stok_terkini"
                    value="{{ old('stok_terkini', $persediaan->stok_terkini) }}"
                    placeholder="Masukkan stok terkini"
                    required>
            </div>

            <div class="form-group">
                <label>Minimal Stok</label>

                <input type="number"
                    name="minimal_stok"
                    value="{{ old('minimal_stok', $persediaan->minimal_stok) }}"
                    placeholder="Masukkan minimal stok"
                    required>
            </div>

            <div class="form-group">
                <label>Status Persediaan</label>

                <div class="select-wrapper">

                    <select name="status_persediaan" required>

                        <option value="Memadai"
                            {{ $persediaan->status_persediaan == 'Memadai' ? 'selected' : '' }}>
                            Memadai
                        </option>

                        <option value="Sedikit"
                            {{ $persediaan->status_persediaan == 'Sedikit' ? 'selected' : '' }}>
                            Sedikit
                        </option>

                        <option value="Darurat"
                            {{ $persediaan->status_persediaan == 'Darurat' ? 'selected' : '' }}>
                            Darurat
                        </option>

                    </select>

                    <span class="material-icons-round select-icon">
                        expand_more
                    </span>

                </div>
            </div>

        </div>

        <div class="form-action">

            <a href="{{ route('statuspersediaan.index') }}" class="btn-batal">
                Batal
            </a>

            <button type="submit" class="btn-simpan">
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

@endsection