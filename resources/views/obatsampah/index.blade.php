@extends('layouts.app')

@section('content')

{{-- ============================================================
     Halaman: Persediaan Obat - Sub Kategori "Obat Sampah"
     File   : resources/views/persediaan/index.blade.php
     ============================================================ --}}

<div class="persediaan-wrapper">

    {{-- Judul Sub-Halaman --}}
    <h2 class="section-title">Obat "Sampah"</h2>

    {{-- Grid Card Kategori --}}
    <div class="card-grid">

        {{-- Card: Obat Kedaluwarsa --}}
        <a href="{{ route('persediaan.kadaluwarsa') }}" class="obat-card card-kedaluwarsa">
            <span class="card-label">Obat Kedaluwarsa</span>
            <div class="card-icon-wrap icon-red">
                {{-- Icon: close / X dari Google Material Icons --}}
                <span class="material-icons card-icon">close</span>
            </div>
        </a>

        {{-- Card: Obat Rusak --}}
        <a href="{{ route('persediaan.rusak') }}" class="obat-card card-rusak">
            <span class="card-label">Obat Rusak</span>
            <div class="card-icon-wrap icon-purple">
                {{-- Icon: warning dari Google Material Icons --}}
                <span class="material-icons card-icon">warning_amber</span>
            </div>
        </a>

    </div>
</div>

@endsection
