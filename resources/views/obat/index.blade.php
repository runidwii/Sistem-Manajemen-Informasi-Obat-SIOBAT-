@extends('layouts.app')
@section('title', 'Data Obat')
@section('content')

<div class="page-header">

    <div>
        <h1>Data Obat</h1>
        <p>Daftar seluruh data obat</p>
    </div>

    <a href="{{ route('obat.create') }}" class="btn-tambah">

        <span class="material-icons-round">
            add
        </span>

        Tambah Obat

    </a>

</div>

@if(session('success'))

<div class="alert-success">
    {{ session('success') }}
</div>

@endif

<div class="riwayat-card">

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Dosis</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($obat as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->kode_obat }}</td>

                    <td>{{ $item->nama_obat }}</td>

                    <td>{{ $item->dosis }}</td>

                    <td>{{ $item->satuan }}</td>

                    <td>{{ $item->kategori_obat }}</td>

                    <td>

                        <div class="aksi-table">

                            <button class="btn-view">
                                <span class="material-icons-round">
                                    visibility
                                </span>
                            </button>

                            <button class="btn-edit">
                                <span class="material-icons-round">
                                    edit
                                </span>
                            </button>

                            <button class="btn-hapus">
                                <span class="material-icons-round">
                                    delete
                                </span>
                            </button>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7">
                        Data obat belum tersedia
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection