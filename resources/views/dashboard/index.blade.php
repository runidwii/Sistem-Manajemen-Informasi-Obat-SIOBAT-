@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
<div class="main">
     <div class="card-box">
        <div class="stat-card dsblue">
            <div class="icon-box">
                <span class="material-icons-round">medication</span>
            </div>

            <div class="card-info">
                <h4>Total Semua Obat</h4>
                <h2>{{ $totalObat }}</h2>
                <p>Total stok tersedia</p>
            </div>
        </div>

        <div class="stat-card dsorange">
            <div class="icon-box">
                <span class="material-icons-round">warning</span>
            </div>

            <div class="card-info">
                <h4>Obat Hampir Habis</h4>
                <h2>{{ $stokMenipis }}</h2>
                <p>Stok dibawah minimum</p>
            </div>
        </div>

        <div class="stat-card dsgreen">
            <div class="icon-box">
                <span class="material-icons-round">shopping_cart</span>
            </div>

            <div class="card-info">
                <h4>Pengajuan Permintaan</h4>
                <h2>{{ $permintaan }}</h2>
                <p>Menunggu persetujuan</p>
            </div>
        </div>

        <div class="stat-card dsred">
            <div class="icon-box">
                <span class="material-icons-round">close</span>
            </div>

            <div class="card-info">
                <h4>Akan Kadaluarsa</h4>
                <h2>{{ $kadaluarsa }}</h2>
                <p>Kurang dari 3 bulan</p>
            </div>
        </div>

        <div class="stat-card dscyan">
            <div class="icon-box">
                <span class="material-icons-round">inventory_2</span>
            </div>
            
            <div class="card-info">
                <h4>Obat Keluar</h4>
                <h2>{{ $obatKeluar }}</h2>
                <p>Total obat keluar bulan ini</p>
            </div>
        </div>
    </div>


    <div class="bawah">
        <div class="grafik bg-white p-6 rounded-2xl shadow mb-6">
            <div class="info">
                <h2 class="text-xl font-semibold text-gray-700 mb-5">
                    Grafik 5 Besar Penggunaan Obat
                </h2>
            </div>
            <canvas id="topObatChart"></canvas>
        </div>

            <div class="tabel-1 bg-white rounded-2xl shadow p-6">
                <div class="info">
                    <h2 class="text-xl font-semibold text-gray-700">
                        Permintaan Obat Terbaru
                    </h2>
                </div>
                
                <div class="overflow-x-auto">
                    <div class="rounded-lg overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="thead">
                                <th class="p-3 text-left">Nama Obat</th>
                                <th class="p-3 text-left">Jumlah</th>
                                <th class="p-3 text-left">Tanggal</th>
                                <th class="p-3 text-left">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($permintaanTerbaru as $item)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">
                                        {{ $item->obat->nama_obat }}
                                    </td>
                                    <td class="p-3">
                                        {{ $item->jumlah_permintaan }}
                                    </td>
                                    <td class="p-3">
                                        {{ $item->tanggal_permintaan }}
                                    </td>
                                    <td class="p-3">
                                        <span class="px-3 py-1 rounded-full text-sm
                                            @if($item->status_permintaan == 'Disetujui')
                                                bg-green-100 text-green-700
                                            @elseif($item->status_permintaan == 'Diproses')
                                                bg-yellow-100 text-yellow-700
                                            @else
                                                bg-blue-100 text-blue-700
                                            @endif
                                                ">
                                            {{ $item->status_permintaan }}
                                        </span>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="10" class="px-2 py-6 text-center text-xs">
                                        <div class="bg-red-50 border border-red-200 text-red-700 rounded-md px-2 py-1 inline-block">
                                            Data Permintaan belum ada.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>

                <div class="mt-5 text-right">
                    <a href="/permintaan"
                        class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-900 font-bold text-sm">Lihat Detail
                        <span class="material-icons-round text-base">
                            arrow_forward
                        </span>
                    </a>
                </div>
            </div>
        
    </div>
</div>

<script>
const ctx = document.getElementById('topObatChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($grafikObat->pluck('nama_obat')),
        datasets: [{
            label: 'Jumlah Pemakaian',
            data: @json($grafikObat->pluck('total_pemakaian')),
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>
@endsection