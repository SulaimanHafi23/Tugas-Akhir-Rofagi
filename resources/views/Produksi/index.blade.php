@extends('layouts/konten')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Produksi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Produksi</li>
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
                        <h3 class="card-title">Data Produksi</h3>
                        <div class="card-tools">
                            <a href="{{ route('tambah_produksi') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah Produksi
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Tanggal Produksi</th>
                                    <th>Jenis Kerupuk</th>
                                    <th>Jumlah Kerupuk</th>
                                    <th style="width: 15%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produksiPerTanggal as $index => $produksi)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $produksi->tanggal }}</td>
                                        <td>{{ $produksi->jenis_kerupuk }}</td>
                                        <td>{{ $produksi->total_jumlah }}</td>
                                        <td>
                                            <a href="{{ route('detail_produksi', ['tanggal' => $produksi->tanggal]) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data produksi.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Produksi</th>
                                    <th>Jenis Kerupuk</th>
                                    <th>Jumlah Kerupuk</th>
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
