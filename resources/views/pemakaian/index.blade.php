@extends('layouts.app')
@section('title', 'Data Pemakaian')
@section('content')

<div class="riwayat-card">

    <div class="riwayat-header">

        <h2>Data Pemakaian Obat</h2>

        <div class="riwayat-kanan">

            <div class="search-box">
                <span class="material-icons-round">search</span>
                <input type="text" placeholder="Cari data pemakaian...">
            </div>

            <a href="{{ route('pemakaian.create') }}" class="btn-tambah">

                <span class="material-icons-round">
                    add
                </span>

                Tambah Pemakaian

            </a>

        </div>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>
                    <th>No</th>
                    <th>Kode Resep</th>
                    <th>Nama Obat</th>
                    <th>Jumlah Pemakaian</th>
                    <th>Tanggal Pemakaian</th>
                    <th>Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($pemakaian as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->id_resep }}</td>

                    {{-- DIUBAH --}}
                    <td>{{ $item->obat->nama_obat ?? '-' }}</td>

                    <td>
                        <span class="badge biru">
                            {{ $item->jumlah_pemakaian }}
                        </span>
                    </td>

                    <td>{{ $item->tanggal_pemakaian }}</td>

                    <td>

                        <div class="aksi-table">
                            {{-- View --}}
                            <a href="{{ route('pemakaian.show', $item->id) }}" class="btn-view">
                                <span class="material-icons-round">
                                    visibility
                                </span>
                            </a>
                        {{-- Edit --}}
                        
                        <a href="{{ route('pemakaian.edit', $item->id) }}" class="btn-edit">
                            <span class="material-icons-round">
                                edit
                            </span>
                        </a>
                        
                        {{-- Delete --}}
                        
                        <form action="{{ route('pemakaian.destroy', $item->id) }}"
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
                        Data pemakaian belum tersedia
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.delete-form').forEach(form => {

        form.addEventListener('submit', function (e) {

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