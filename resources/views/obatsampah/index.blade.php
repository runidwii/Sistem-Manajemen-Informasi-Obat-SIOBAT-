@extends('layouts.app')
@section('title', 'Obat Sampah')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="{{ asset('css/obat-sampah.css') }}">

<div class="sampah-wrapper">

    {{-- Judul halaman --}}
    <h2 class="page-title">Obat "Sampah"</h2>

    {{-- Grid 2 card --}}
    <div class="sampah-grid">

        {{-- Card: Obat Kedaluwarsa --}}
        <a href="{{ route('obatkadaluwarsa.index') }}" class="sampah-card">
            <span class="sampah-card__label">Obat Kedaluwarsa</span>
            <div class="sampah-card__icon-wrap sampah-card__icon-wrap--red">
                <span class="material-symbols-outlined">cancel</span>
            </div>
        </a>

        {{-- Card: Obat Rusak --}}
        <a href="{{ route('obatrusak.index') }}" class="sampah-card">
            <span class="sampah-card__label">Obat Rusak</span>
            <div class="sampah-card__icon-wrap sampah-card__icon-wrap--purple">
                <span class="material-symbols-outlined">warning</span>
            </div>
        </a>

    </div>
</div>

@endsection