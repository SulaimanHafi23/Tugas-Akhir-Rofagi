@extends('layouts/konten')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Produk</h3>
                            {{-- Tombol Tambah Data --}}
                            <div class="card-tools">
                                {{-- Menggunakan nama rute 'tambah_produk' --}}
                                <a href="{{ route('tambah_produk') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> Tambah Produk
                                </a>
                            </div>
                            {{-- End Tombol Tambah Data --}}
                        </div>
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">No</th>
                                        <th>Nama Produk</th>
                                        <th style="width: 15%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($produks as $produk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $produk->nama_produk }}</td>
                                            <td>
                                                {{-- Menggunakan nama rute 'edit_produk' dengan parameter 'id' --}}
                                                <a href="{{ route('edit_produk', $produk->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form id="delete-form-{{ $produk->id }}" action="{{ route('delete_produk', $produk->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete-button" data-id="{{ $produk->id }}">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada data produk.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Opsi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(function() {
            // Event listener untuk semua tombol dengan kelas 'delete-button'
            $('.delete-button').on('click', function() {
                const produkId = $(this).data('id'); // Ambil ID produk dari data-id
                const formId = '#delete-form-' + produkId; // Bentuk ID form yang benar

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data produk ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33', // Warna merah untuk tombol konfirmasi
                    cancelButtonColor: '#6c757d', // Warna abu-abu untuk tombol batal
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika pengguna mengklik "Ya, hapus!", submit form yang sesuai
                        $(formId).submit();
                    }
                });
            });
        });
    </script>
@endpush