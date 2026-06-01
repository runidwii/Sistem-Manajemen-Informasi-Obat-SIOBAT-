@extends('layouts.app')
@section('title', 'Persediaan Obat')
@section('content')

<div class="input-grid">

    <!-- STATUS PERSEDIAAN -->
    <a href="/status-persediaan" class="input-card blue">

        <div class="input-kiri">

            <div class="icon-input">
                <span class="material-icons-round">
                    inventory_2
                </span>
            </div>

            <div class="info-input single-title">
                <h2>Status Persediaan</h2>
            </div>

        </div>

        <div class="aksi">
            <span class="material-icons-round">
                chevron_right
            </span>
        </div>

    </a>

    <!-- PEMANTAUAN PERMINTAAN -->
    <a href="{{ route('permintaan.index') }}" class="input-card green">

        <div class="input-kiri">

            <div class="icon-input">
                <span class="material-icons-round">
                    search
                </span>
            </div>

            <div class="info-input single-title">
                <h2>Pemantauan Permintaan</h2>
            </div>

        </div>

        <div class="aksi">
            <span class="material-icons-round">
                chevron_right
            </span>
        </div>

    </a>

    <!-- DATA PEMAKAIAN -->
    <a href="{{ route('pemakaian.index') }}" class="input-card purple">

        <div class="input-kiri">

            <div class="icon-input">
                <span class="material-icons-round">
                    pie_chart
                </span>
            </div>

            <div class="info-input single-title">
                <h2>Data Pemakaian</h2>
            </div>

        </div>

        <div class="aksi">
            <span class="material-icons-round">
                chevron_right
            </span>
        </div>

    </a>

    <!-- OBAT SAMPAH -->
    <a href="{{ route('obatsampah.index') }}" class="input-card green">

        <div class="input-kiri">

            <div class="icon-input">
                <span class="material-icons-round">
                    delete
                </span>
            </div>

            <div class="info-input single-title">
                <h2>Obat Sampah</h2>
            </div>

        </div>

        <div class="aksi">
            <span class="material-icons-round">
                chevron_right
            </span>
        </div>

    </a>

</div>

@endsection