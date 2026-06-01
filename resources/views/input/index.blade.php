@extends('layouts.app')
@section('title', 'Input Data')
@section('content')
<div class="input-grid">
    <div class="input-card blue">
        <div class="input-kiri">
            <div class="icon-input">
                <span class="material-icons-round">assignment</span>
            </div>

            <div class="info-input">
                <p>Input Data</p>
                <h2>Permintaan</h2>
            </div>
        </div>
            <div class="aksi">
                <span class="material-icons-round">chevron_right</span>
            </div>
    </div>

    <div class="input-card green">
        <div class="input-kiri">
            <div class="icon-input">
                <span class="material-icons-round">archive</span>
            </div>

            <div class="info-input">
                <p>Input Data</p>
                <h2>Penerimaan</h2>
            </div>
        </div>
            <div class="aksi">
                <span class="material-icons-round">chevron_right</span>
            </div>
    </div>

    <a href="{{ route('relokasi.create') }}" class="input-card purple">
        <div class="input-kiri">
            <div class="icon-input">
                <span class="material-icons-round">swap_horizontal_circle</span>
            </div>

            <div class="info-input">
                <p>Input Data</p>
                <h2>Relokasi Obat</h2>
            </div>
        </div>
            <div class="aksi">
                <span class="material-icons-round">chevron_right</span>
            </div>
    </a>
</div>

<div class="preview-grid">
    <div class="preview-card">
        <div class="preview-info">
            <h4>Total Permintaan</h4>
            <h2>{{ $totalPermintaan }}</h2>
            <p>Data Permintaan Obat</p>
        </div>

        <div class="preview-icon blue">
            <span class="material-icons-round">assignment</span>
        </div>
    </div>

    <div class="preview-card">
        <div class="preview-info">
            <h4>Total Penerimaan</h4>
            <h2>{{ $totalPenerimaan }}</h2>
            <p>Data Penerimaan Obat</p>
        </div>

        <div class="preview-icon green">
            <span class="material-icons-round">archive</span>
        </div>
    </div>

    <div class="preview-card">
        <div class="preview-info">
            <h4>Total Relokasi</h4>
            <h2>{{ $totalRelokasi }}</h2>
            <p>Data Relokasi Obat</p>
        </div>

        <div class="preview-icon blue">
            <span class="material-icons-round">swap_horizontal_circle</span>
        </div>
    </div>
</div>

<div class="riwayat-card">
    <div class="riwayat-header">
        <h2>Riwayat Input Data</h2>
        <div class="riwayat-kanan">
            <div class="search-box">
                <span class="material-icons-round">search</span>
                <input type="text" placeholder="Cari data...">
            </div>
            <div class="filter-box">
                <select>
                    <option>Semua Jenis</option>
                    <option>Permintaan</option>
                    <option>Penerimaan</option>
                    <option>Relokasi</option>
                </select>
            </div>
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Jenis</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Pemasok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

    @forelse ($riwayat as $item)
    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $item['nama_obat'] }}</td>

        <td>

            @if ($item['jenis'] == 'Permintaan')
                <span class="badge biru">
                    Permintaan
                </span>

            @elseif ($item['jenis'] == 'Penerimaan')
                <span class="badge hijau">
                    Penerimaan
                </span>

            @else
                <span class="badge ungu">
                    Relokasi
                </span>
            @endif

        </td>

        <td>{{ $item['jumlah'] }}</td>

        <td>{{ $item['tanggal'] }}</td>

        <td>{{ $item['pemasok'] }}</td>

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
            Data tidak tersedia
        </td>
    </tr>
    @endforelse

</tbody>

        </table>

    </div>

</div>
@endsection