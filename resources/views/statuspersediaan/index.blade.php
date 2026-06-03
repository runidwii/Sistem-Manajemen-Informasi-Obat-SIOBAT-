@extends('layouts.app')
@section('title', 'Persediaan Obat')
@section('content')

<div class="riwayat-card">

    <div class="riwayat-header">

        <h2>Status Persediaan Obat</h2>

        <div class="riwayat-kanan">

            <div class="search-box">
                <span class="material-icons-round">search</span>
                <input type="text" placeholder="Cari nama obat...">
            </div>

            <a href="{{ route('statuspersediaan.create') }}" class="btn-tambah">

                <span class="material-icons-round">
                    add
                </span>

                Tambah Persediaan

            </a>

        </div>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Stok Terkini</th>
                    <th>Minimal Stok</th>
                    <th>Status Persediaan</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($persediaan as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->obat->nama_obat ?? '-' }}</td>

                    <td>{{ $item->stok_terkini }}</td>

                    <td>{{ $item->minimal_stok }}</td>

                    <td>

                        @if($item->status_persediaan == 'Memadai')

                            <span class="badge hijau">
                                Memadai
                            </span>

                        @elseif($item->status_persediaan == 'Sedikit')

                            <span class="badge biru">
                                Sedikit
                            </span>

                        @else

                            <span class="badge ungu">
                                Darurat
                            </span>

                        @endif

                    </td>

                    <td>

                        <div class="aksi-table">

                            {{-- View --}}
                            <a href="{{ route('statuspersediaan.show', $item->id) }}" class="btn-view">

                                <span class="material-icons-round">
                                    visibility
                                </span>

                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('statuspersediaan.edit', $item->id) }}" class="btn-edit">

                                <span class="material-icons-round">
                                    edit
                                </span>

                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('statuspersediaan.destroy', $item->id) }}"
                                  method="POST"
                                  class="delete-form"
                                  style="display:inline-block;">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-hapus">

                                    <span class="material-icons-round">
                                        delete
                                    </span>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6">
                        Data persediaan belum tersedia
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<script>

document.querySelectorAll('.delete-form').forEach(form => {

    form.addEventListener('submit', function(e) {

        e.preventDefault();

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });

    });

});

</script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session('success') }}',
    timer: 3000,
    showConfirmButton: false
});
</script>

@endif

@endsection