@extends('layouts.app')

@section('content')

<div class="obat-sampah-container">

    <h1 class="title">
        Obat <span>“Sampah”</span>
    </h1>

    <div class="card-wrapper">

        <!-- CARD 1 -->
        <div class="sampah-card">

            <h2>Obat Kedaluwarsa</h2>

            <div class="icon-circle red">
                ✕
            </div>

            <!-- HOVER BOX -->
            <div class="hover-box">
                <div class="mini-icon">
                    📦
                </div>

                <h3>Obat Kedaluwarsa</h3>

                <h1>0</h1>

                <p>Total obat kedaluwarsa bulan ini</p>
            </div>

        </div>

        <!-- CARD 2 -->
        <div class="sampah-card">

            <h2>Obat Rusak</h2>

            <div class="icon-circle purple">
                ⚠
            </div>

            <!-- HOVER BOX -->
            <div class="hover-box">
                <div class="mini-icon">
                    📦
                </div>

                <h3>Obat Rusak</h3>

                <h1>0</h1>

                <p>Total obat rusak bulan ini</p>
            </div>

        </div>

    </div>

</div>

@endsection