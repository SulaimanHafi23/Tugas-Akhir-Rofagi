<a href="/dashboard" class="brand-link d-block px-3 py-2" style="width: 100%;">
    <span class="brand-text font-weight-light w-100 d-inline-block text-center">Kerupuk Rumahan</span>
</a>

<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
            <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
            @auth
                <a href="#" class="d-block" >{{ Auth::user()->name }}</a> {{-- Menampilkan nama pengguna --}}
            @else
                <a href="#" class="d-block">Guest</a> {{-- Jika tidak ada pengguna login --}}
            @endauth
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item"> {{-- Removed menu-open here, as it's typically for sub-menus --}}
                {{-- Periksa apakah URL saat ini adalah dashboard --}}
                <a href="{{ route('beranda') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Beranda</p>
                </a>
            </li>
            <li class="nav-header">Data </li>
            <li class="nav-item">
                {{-- Periksa apakah URL saat ini cocok dengan rute 'tampil_produksi' --}}
                <a href="{{ route('tampil_produksi') }}"
                    class="nav-link {{ request()->is('produksi') || request()->is('tambah-produksi') || request()->is('edit-produksi') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Data Produksi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                {{-- Periksa apakah URL saat ini cocok dengan rute 'tampil_produk' atau sub-rutenya --}}
                <a href="{{ route('tampil_produk') }}"
                    class="nav-link {{ request()->is('produk') || request()->is('tambah-produk') || request()->is('edit-produk') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Data Produk
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>
