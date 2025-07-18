@extends('layouts/konten')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- Box: Jumlah Jenis Kerupuk -->
      <div class="col-lg-6 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $jumlah_produk }}</h3>
            <p>Jumlah Jenis Kerupuk</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('tampil_produk') }}" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Box: Produksi Hari Ini -->
      <div class="col-lg-6 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $produksi_hari_ini }}</h3>
            <p>Produksi Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ route('tampil_produksi') }}" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
