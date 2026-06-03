@extends('layouts.app')
@section('title', 'Persediaan Obat')
@section('content')

<div class="riwayat-card">

    <div class="riwayat-header">

        <h2>Status Persediaan Obat</h2>

        <div class="riwayat-kanan">

            <div class="search-box">
                <span class="material-icons-round">search</span>
                <input type="text" placeholder="Cari nama obat...">
            </div>

        <a href="{{ route('statuspersediaan.create') }}" class="btn-tambah">

        <span class="material-icons-round">
            add
        </span>

        Tambah Persediaan

    </a>
            
        </div>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Stok Terkini</th>
                    <th>Minimal Stok</th>
                    <th>Status Persediaan</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($persediaan as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                  <td>
    {{ $item->obat->nama_obat ?? '-' }}
</td>


                    <td>{{ $item->stok_terkini }}</td>

                    <td>{{ $item->minimal_stok }}</td>

                    <td>

                        @if($item->status_persediaan == 'Memadai')

                            <span class="badge hijau">
                                Memadai
                            </span>

                        @elseif($item->status_persediaan == 'Sedikit')

                            <span class="badge biru">
                                Sedikit
                            </span>

                        @else

                            <span class="badge ungu">
                                Darurat
                            </span>

                        @endif

                    </td>


                    <td>

                        <div class="aksi-table">

                            <button class="btn-view">

                                <span class="material-icons-round">
                                    send
                                </span>

                            </button>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7">
                        Data persediaan belum tersedia
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection