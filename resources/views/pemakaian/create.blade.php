@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
<link rel="stylesheet" href="{{ asset('css/obat-sampah.css') }}">

<div class="sampah-wrapper">

    {{-- HEADER --}}
    <div class="tabel-header">
        <a href="{{ route('obatsampah.index') }}" class="btn-back">
            <span class="material-symbols-outlined">arrow_back</span>
            Obat Kadaluwarsa
        </a>
    </div>

    {{-- ACTION BAR --}}
    <div class="aksi-bar">

        <button type="button" id="openModalBtn" class="btn-input">
            <span class="material-symbols-outlined">add</span>
            Input Data
        </button>

        <div class="date-filter">
            <input type="date" class="date-input">
            <span>sampai</span>
            <input type="date" class="date-input">
        </div>

    </div>

    {{-- TABLE --}}
    <div class="table-container">
        <table class="sampah-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                    <th>Kedaluwarsa</th>
                    <th>Bulan</th>
                    <th>Kode Masuk</th>
                </tr>
            </thead>

            <tbody>
                @forelse($obatKedaluwarsa as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item['kode_obat'] }}</td>
                    <td>{{ $item['nama_obat'] }}</td>
                    <td>{{ $item['jumlah_obat'] }}</td>
                    <td>{{ $item['tanggal_kedaluwarsa'] }}</td>
                    <td>{{ $item['peruntukan_bulan'] }}</td>
                    <td>{{ $item['kode_masuk_obat'] }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Tidak ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

{{-- 🔥 PANGGIL MODAL DARI FILE CREATE --}}
@include('obat-kadaluwarsa.create')

{{-- JS MODAL --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('customObatKadaluwarsaModal');
    const openBtn = document.getElementById('openModalBtn');
    const closeBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelModalBtn');

    function openModal() {
        modal.classList.add('active');
    }

    function closeModal() {
        modal.classList.remove('active');
    }

    if (openBtn) openBtn.addEventListener('click', openModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

    window.addEventListener('click', function (e) {
        if (e.target === modal) closeModal();
    });

    // autofill obat
    const select = document.getElementById('selectObatKadaluwarsa');
    const nama = document.getElementById('namaObatKadaluwarsa');
    const kodeMasuk = document.getElementById('kodemasukKadaluwarsa');

    if (select) {
        select.addEventListener('change', function () {
            const opt = this.options[this.selectedIndex];
            nama.value = opt.dataset.nama ?? '';
            kodeMasuk.value = opt.dataset.kodemasuk ?? '';
        });
    }

});
</script>

@endsection