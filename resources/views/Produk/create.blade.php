@extends('layouts.konten') {{-- Pastikan ini sesuai dengan layout utama Anda --}}

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Produk Baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tampil_produk') }}">Produk</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Produk</h3>
                        </div>
                        <form action="{{ route('store_produk') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                           id="nama_produk" name="nama_produk" value="{{ old('nama_produk') }}"
                                           placeholder="Masukkan Nama Produk" required autofocus>
                                    @error('nama_produk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Jika nama produk mengandung spasi, akan otomatis diganti menjadi <code>-</code>.
                                    </small>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('tampil_produk') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Script untuk mengganti spasi dengan "-" secara otomatis --}}
    <script>
        document.getElementById('nama_produk').addEventListener('input', function () {
            this.value = this.value.replace(/\s+/g, '-');
        });
    </script>
@endsection
