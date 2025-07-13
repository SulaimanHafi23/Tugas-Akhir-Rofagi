@extends('layouts/konten')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Produksi - {{ $tanggal }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('tampil_produksi') }}">Produksi</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <!-- Info Ringkasan -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card bg-info">
                        <div class="card-body">
                            <h5 class="card-title">Tanggal Produksi</h5>
                            <p class="card-text">{{ $tanggal }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Jumlah Kerupuk Diproduksi</h5>
                            <p class="card-text">{{ $totalJumlah }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Jenis Kerupuk</h5>
                            <p class="card-text">{{ $jenisKerupuk }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Detail Produksi -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Produksi Tanggal {{ $tanggal }}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Waktu Input</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produksi as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->produk->nama_produk ?? '-' }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->created_at->format('H:i:s') }}</td>
                                    <td><form id="delete-form-{{ $item->id }}"
                                        action="{{ route('delete_produksi', $item->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete-button"
                                            data-id="{{ $item->id }}">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data produksi pada tanggal ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('tampil_produksi') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
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
                    text: "Data produksi ini akan dihapus secara permanen!",
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
