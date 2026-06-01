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

        </div>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>Nama Obat</th>
                    <th>Kode Obat</th>
                    <th>Stok</th>
                    <th>Minimal Stok</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($persediaan as $item)

                <tr>

                    <td>

                        <div style="text-align:left">

                            <strong>
                                {{ $item->nama_obat }}
                            </strong>

                            <br>

                            <small style="color:#64748b">
                                {{ $item->deskripsi }}
                            </small>

                        </div>

                    </td>

                    <td>{{ $item->kode_obat }}</td>

                    <td>{{ $item->stok }}</td>

                    <td>{{ $item->stok_minimal }}</td>

                    <td>

                        @if($item->status == 'Memadai')

                            <span class="badge hijau">
                                Memadai
                            </span>

                        @elseif($item->status == 'Sedikit')

                            <span class="badge biru">
                                Sedikit
                            </span>

                        @else

                            <span class="badge ungu">
                                Darurat
                            </span>

                        @endif

                    </td>

                    <td>{{ $item->tanggal }}</td>

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