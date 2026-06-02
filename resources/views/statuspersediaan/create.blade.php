@extends('layouts.app')
@section('title', 'Status Persediaan')
@section('content')

<div class="form-card">

    <div class="form-header">
        <h2>Tambah Status Persediaan</h2>
    </div>

    <form action="{{ route('statuspersediaan.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Penerimaan</label>

                <div class="select-wrapper">
                    <select name="obat_id" required>
                        <option value="">
                            Pilih Obat
                        </option>

                        @foreach($obat as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->nama_obat }} - {{ $item->dosis }}
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
                       placeholder="Masukkan stok terkini"
                       required>
            </div>

            <div class="form-group">
                <label>Minimal Stok</label>

                <input type="number"
                       name="minimal_stok"
                       placeholder="Masukkan minimal stok"
                       required>
            </div>

            <div class="form-group">
                <label>Status Persediaan</label>

                <div class="select-wrapper">
                    <select name="status_persediaan" required>
                        <option value="">Pilih Status</option>
                        <option value="Memadai">Memadai</option>
                        <option value="Sedikit">Sedikit</option>
                        <option value="Darurat">Darurat</option>
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
                Simpan Data
            </button>

        </div>

    </form>

</div>

@endsection