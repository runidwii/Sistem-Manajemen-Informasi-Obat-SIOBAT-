@extends('layouts.app')
@section('title', 'Persediaan Obat')
@section('content')

<div class="main">

    <div class="card-box">

        <a href="/status-persediaan" class="stat-card dsorange">
            <div class="icon-box">
                <span class="material-icons-round">inventory_2</span>
            </div>

            <div class="card-info">
                <h4>Status Persediaan</h4>
            </div>
        </a>

        <a href="{{ route('permintaan.index') }}" class="stat-card dsgreen">
            <div class="icon-box">
                <span class="material-icons-round">search</span>
            </div>

            <div class="card-info">
                <h4>Pemantauan Permintaan</h4>
            </div>
        </a>

        <a href="{{ route('pemakaian.index') }}" class="stat-card dsblue">
            <div class="icon-box">
                <span class="material-icons-round">pie_chart</span>
            </div>

            <div class="card-info">
                <h4>Data Pemakaian</h4>
            </div>
        </a>

        <a href="{{ route('obatsampah.index') }}" class="stat-card dscyan">
            <div class="icon-box">
                <span class="material-icons-round">delete</span>
            </div>

            <div class="card-info">
                <h4>Obat Sampah</h4>
            </div>
        </a>

    </div>

</div>

@endsection