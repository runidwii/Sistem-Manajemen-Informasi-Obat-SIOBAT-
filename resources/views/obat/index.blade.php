@extends('layouts.app')
@section('title', 'Data Obat')
@section('content')
<div class="page-header">
    <div>
        <h1>Data Obat</h1>
        <p>Daftar seluruh data obat</p>
    </div>

    <a href="{{ route('obat.create') }}" class="btn-tambah">
        <span class="material-icons-round">add</span>
        Tambah Obat
    </a>
</div>

<div class="riwayat-card">
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Dosis</th>
                    <th>Satuan</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($obat as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_obat }}</td>
                    <td>{{ $item->nama_obat }}</td>
                    <td>{{ $item->dosis }}</td>
                    <td>{{ $item->satuan }}</td>
                    <td>{{ $item->kategori_obat }}</td>
                    <td>
                        <div class="aksi-table">
                            <a href="{{ route('obat.show', $item->id) }}" class="btn-view">
                                <span class="material-icons-round">visibility</span>
                            </a>

                            <a href="{{ route('obat.edit', $item->id) }}" class="btn-edit">
                                <span class="material-icons-round">edit</span>
                            </a>

                            <form action="{{ route('obat.destroy', $item->id) }}" method="POST" class="delete-form" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-hapus">
                                    <span class="material-icons-round">delete</span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                
                @empty
                <tr>
                    <td colspan="7">
                        Data obat belum tersedia
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script>
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
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

@if (session('success'))
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session('success') }}',
    timer: 3000,
    showConfirmButton: false
});
@endif
</script>

@endsection