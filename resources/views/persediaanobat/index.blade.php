@extends('layouts.app')

@section('content')

{{-- Link Google Icons --}}
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

{{-- Custom CSS untuk halaman ini --}}
<link rel="stylesheet" href="{{ asset('css/persediaanobat.css') }}">

<div class="persediaan-wrapper">

    {{-- Judul halaman --}}
    <h2 class="page-title">Persediaan Obat</h2>

    {{-- Grid menu card --}}
    <div class="menu-grid">

        {{-- Card: Status Persediaan --}}
        <a href="{{ route('status-persediaan.index') }}" class="menu-card menu-card--orange">
            <div class="menu-card__icon-wrap menu-card__icon-wrap--orange">
                <span class="material-symbols-outlined">inventory_2</span>
            </div>
            <span class="menu-card__label">Status<br>Persediaan</span>
        </a>

        {{-- Card: Permantauan Permintaan --}}
        <a href="{{ route('pemantauan-permintaan.index') }}" class="menu-card menu-card--green">
            <div class="menu-card__icon-wrap menu-card__icon-wrap--green">
                <span class="material-symbols-outlined">manage_search</span>
            </div>
            <span class="menu-card__label">Permantauan<br>Permintaan</span>
        </a>

        {{-- Card: Data Pemakaian --}}
        <a href="{{ route('data-pemakaian.index') }}" class="menu-card menu-card--purple">
            <div class="menu-card__icon-wrap menu-card__icon-wrap--purple">
                <span class="material-symbols-outlined">bar_chart</span>
            </div>
            <span class="menu-card__label">Data<br>Pemakaian</span>
        </a>

        {{-- Card: Obat "Sampah" --}}
        <a href="{{ route('obat-sampah.index') }}" class="menu-card menu-card--cyan">
            <div class="menu-card__icon-wrap menu-card__icon-wrap--cyan">
                <span class="material-symbols-outlined">delete</span>
            </div>
            <span class="menu-card__label">Obat<br>"Sampah"</span>
        </a>

    </div>
</div>

@endsection
