@extends('layouts.app')
@section('title', 'Data Pemakaian')
@section('content')

<div class="riwayat-card">

    <div class="riwayat-header">

        <h2>Data Pemakaian Obat</h2>

        <div class="riwayat-kanan">

            <div class="search-box">
                <span class="material-icons-round">search</span>
                <input type="text" placeholder="Cari data pemakaian...">
            </div>

        </div>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>ID Resep</th>
                    <th>ID Obat</th>
                    <th>Jumlah Pemakaian</th>
                    <th>Tanggal Pemakaian</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($pemakaian as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->id_resep }}</td>

                    <td>{{ $item->obat_id }}</td>

                    <td>

                        <span class="badge biru">
                            {{ $item->jumlah_pemakaian }}
                        </span>

                    </td>

                    <td>{{ $item->tanggal_pemakaian }}</td>

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

                    <td colspan="6">
                        Data pemakaian belum tersedia
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection