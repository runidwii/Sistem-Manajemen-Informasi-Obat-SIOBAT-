@extends('layouts.app')
@section('title', 'Obat Sampah')
@section('content')

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="{{ asset('css/obat-sampah.css') }}">

<div class="sampah-wrapper">

    {{-- ── Header: tombol kembali --}}
    <div class="tabel-header">
        <a href="{{ route('obatsampah.index') }}" class="btn-back">
            <span class="material-symbols-outlined">arrow_back</span>
            Obat Kadaluwarsa
        </a>
    </div>

    {{-- ── Baris aksi: tombol input + filter tanggal --}}
    <div class="aksi-bar">
        <button type="button" id="openModalBtn" class="btn-input" style="border: none; cursor: pointer;">
            <span class="material-symbols-outlined">add</span>
            Input Data
        </button>

        <div class="date-filter">
            <div class="date-input-wrap">
                <span class="material-symbols-outlined date-icon">calendar_month</span>
                <input type="date" class="date-input" value="{{ $tanggalMulai ?? '2022-01-01' }}">
            </div>
            <span class="date-separator">sampai</span>
            <div class="date-input-wrap">
                <span class="material-symbols-outlined date-icon">calendar_month</span>
                <input type="date" class="date-input" value="{{ $tanggalAkhir ?? '2026-12-31' }}">
            </div>
        </div>
    </div>
  
    {{-- ── Tabel Obat Kadaluwarsa ── --}}
    <div class="table-container">
        <table class="sampah-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th><span class="th-inner">Kode Obat <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                    <th><span class="th-inner">Nama Obat <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                    <th><span class="th-inner">Jumlah Obat <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                    <th><span class="th-inner">Tanggal Kadaluwarsa <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                    <th><span class="th-inner">Peruntukan Bulan <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                    <th><span class="th-inner">Cara Masuk Obat <span class="material-symbols-outlined sort-icon">unfold_more</span></span></th>
                </tr>
            </thead>
            <tbody>
                @forelse($obatKedaluwarsa as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->obat->kode_obat ?? '-' }}</td>
                    <td>{{ $item['nama_obat'] }}</td>
                    <td>{{ $item['jumlah_obat'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($item['tanggal'])->format('d/m/Y') }}</td>
                    <td>{{ $item['peruntukan_bulan'] }}</td>
                    <td>{{ $item['cara_masuk_obat'] }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty-state">Tidak ada data obat kadaluwarsa.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

{{-- ── POP UP ── --}}
<div id="customObatKadaluwarsaModal" class="modal-overlay">
    <div class="modal-box">
        <button type="button" id="closeModalBtn" class="modal-close-x">
            <span class="material-icons">close</span>
        </button>

        <div class="modal-header">
            <h2 class="form-title">Tambahkan Obat Kadaluwarsa</h2>
            <p class="form-subtitle">Masukkan detail obat kadaluwarsa</p>
        </div>

        <form action="{{ route('obatkadaluwarsa.store') }}" method="POST">
            @csrf         
            <input type="hidden" name="jenis" value="Kadaluwarsa">

            {{-- Baris 1: Cara Masuk | Kode Obat | Nama Obat --}}
            <div class="field-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 15px;">
                
                {{-- Cara Masuk --}}
                <div class="field-group">
                    <label class="field-label">Cara Masuk Obat</label>
                    <div class="field-select-wrap">
                        <select name="cara_masuk_obat" class="field-select" required>
                            <option value="" disabled selected>Pilih Cara Masuk</option>
                            <option value="Penerimaan">Penerimaan</option>
                            <option value="Permintaan">Permintaan</option>
                            <option value="Relokasi">Relokasi</option>
                        </select>
                        <span class="material-icons field-select-icon">expand_more</span>
                    </div>
                </div>
                
                <div class="field-group">
                    <label class="field-label">Kode Obat</label>
                    <div class="field-select-wrap">
                        <select name="kode_obat" id="selectObatKadaluwarsa" class="field-select" required>
                            <option value="" disabled selected>Pilih</option>
                            @foreach($obat as $o)
                            <option value="{{ $o->kode_obat }}" data-nama="{{ $o->nama_obat }}">
                                {{ $o->kode_obat }}
                            </option>
                            @endforeach
                        </select>
                        <span class="material-icons field-select-icon">expand_more</span>
                    </div>
                </div>

                {{-- Nama Obat --}}
                <div class="field-group">
                    <label class="field-label">Nama Obat</label>
                    <input type="text" name="nama_obat" id="namaObatKadaluwarsa" class="field-input" placeholder="Pilih Nama Obat" readonly required>
                </div>
            </div>

            {{-- Baris 2: Jumlah Obat | Peruntukan Bulan | Tanggal Kadaluwarsa --}}
            <div class="field-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 15px;">
                <div class="field-group">
                    <label class="field-label">Jumlah Obat</label>
                    <input type="number" name="jumlah_obat" class="field-input" placeholder="Jumlah" min="1" required>
                </div>

                <div class="field-group">
                    <label class="field-label">Peruntukan Bulan</label>
                    <div class="field-select-wrap">
                        <select name="peruntukan_bulan" class="field-select" required>
                            <option value="" disabled selected>Pilih Bulan</option>
                            @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bulan)
                            <option value="{{ $bulan }}" {{ $bulan === 'Agustus' ? 'selected' : '' }}>{{ $bulan }}</option>
                            @endforeach
                        </select>
                        <span class="material-icons field-select-icon">expand_more</span>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label">Tanggal Kadaluwarsa</label>
                    <div class="field-date-wrap">
                        <input type="date" name="tanggal_kadaluwarsa" class="field-input" required>
                        <span class="material-icons field-date-icon">calendar_month</span>
                    </div>
                </div>
            </div>

            {{-- Catatan --}}
            <div class="field-group field-group--full" style="margin-bottom: 20px;">
                <label class="field-label">Catatan</label>
                <textarea name="keterangan" class="field-textarea" rows="4" placeholder="Tambahkan catatan jika ada..."></textarea>
            </div>

            {{-- Tombol Aksi --}}
            <div class="form-actions">
                <button type="button" id="cancelModalBtn" class="btn-batal">Batal</button>
                <button type="submit" class="btn-simpan">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- ── JAVASCRIPT LOGIC ── --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('customObatKadaluwarsaModal');
    const openBtn = document.getElementById('openModalBtn'); 
    const closeBtn = document.getElementById('closeModalBtn');
    const cancelBtn = document.getElementById('cancelModalBtn');

    // Buka Modal
    if (openBtn && modal) {
        openBtn.addEventListener('click', function (e) {
            e.preventDefault();
            modal.classList.add('active'); 
        });
    }

    // Tutup Modal
    function closeModal() {
        modal.classList.remove('active'); 
    }

    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

    window.addEventListener('click', function (e) {
        if (e.target === modal) closeModal();
    });

    // Auto-fill Nama Obat dari Dropdown
    const select = document.getElementById('selectObatKadaluwarsa');
    const namaObat = document.getElementById('namaObatKadaluwarsa');

    if (select) {
        select.addEventListener('change', function () {
            const opt = select.options[select.selectedIndex];
            namaObat.value = opt.dataset.nama ?? '';
        });
    }
});
</script>

@endsection