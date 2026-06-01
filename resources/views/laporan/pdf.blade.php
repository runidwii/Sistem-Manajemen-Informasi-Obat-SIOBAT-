<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan LPLPO</title>

    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
</head>
<body>

    <div class="header">
        <h2>Laporan Pemakaian dan Lembar Permintaan Obat</h2>
        <p>(LPLPO)</p>
    </div>

    <table class="info-table">
        <tr>
            <td><strong>Nama Puskesmas</strong></td>
            <td>:</td>
            <td>Ngaglik II</td>
        </tr>

        <tr>
            <td><strong>Laporan Bulan</strong></td>
            <td>:</td>
            <td>{{ $laporanbulan }}</td>
        </tr>

                <tr>
            <td><strong>Permintaan Bulan</strong></td>
            <td>:</td>
            <td>{{ $permintaanbulan }}</td>
        </tr>

        <tr>
            <td><strong>Tahun</strong></td>
            <td>:</td>
            <td>{{ $tahun }}</td>
        </tr>
    </table>

    <table class="laporan-table">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Dosis</th>
                <th>Satuan</th>
                <th>Stok Awal</th>
                <th>Pemberian</th>
                <th>Pemberian Lain</th>
                <th>Persediaan</th>
                <th>Pemakaian</th>
                <th>ED/Rusak</th>
                <th>Sisa Stok</th>
                <th>Permintaan</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($laporan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['nama_obat'] }}</td>
                <td>{{ $item['dosis'] }}</td>
                <td>{{ $item['satuan'] }}</td>
                <td>{{ $item['stok_awal'] }}</td>
                <td>{{ $item['pemberian'] }}</td>
                <td>{{ $item['pemberian_lain'] }}</td>
                <td>{{ $item['persediaan'] }}</td>
                <td>{{ $item['pemakaian'] }}</td>
                <td>{{ $item['ed_rusak'] }}</td>
                <td>{{ $item['sisa_stok'] }}</td>
                <td>{{ $item['permintaan'] }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</body>
</html>