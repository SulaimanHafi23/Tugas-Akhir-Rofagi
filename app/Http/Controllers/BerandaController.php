<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Produksi;
use Carbon\Carbon;

class BerandaController extends Controller
{
    public function index()
    {
        // Hitung total jenis kerupuk
        $jumlah_produk = Produk::count();

        // Hitung jumlah kerupuk yang diproduksi hari ini
        $produksi_hari_ini = Produksi::whereDate('created_at', Carbon::today())->sum('jumlah');

        // Kirim ke view
        return view('Beranda', compact('jumlah_produk', 'produksi_hari_ini'));
    }
}
