<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Pastikan untuk mengimpor model Produk
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('Produk.index', compact('produks'));
    }

    public function create()
    {
        return view('Produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255|unique:produks,nama_produk',
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
        ]);

        return redirect()->route('tampil_produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id) // Menerima ID secara eksplisit
    {
        // Mencari produk berdasarkan ID, atau menampilkan error 404 jika tidak ditemukan
        $produk = Produk::findOrFail($id);

        return view('Produk.edit', compact('produk'));
    }

    public function update(Request $request, $id) // Menerima ID secara eksplisit
    {
        // Mencari produk berdasarkan ID, atau menampilkan error 404 jika tidak ditemukan
        $produk = Produk::findOrFail($id);

        // Validasi input
        $request->validate([
            // Nama produk harus unik, kecuali untuk produk yang sedang diedit ($produk->id)
            'nama_produk' => 'required|string|max:255|unique:produks,nama_produk,' . $produk->id,
        ]);

        // Memperbarui record produk
        $produk->update([
            'nama_produk' => $request->nama_produk,
        ]);

        return redirect()->route('tampil_produk')->with('success', 'Produk berhasil diperbarui!');
    }

    public function delete($id) // Menerima ID secara eksplisit (sesuai standar Laravel)
    {
        // Mencari produk berdasarkan ID, atau menampilkan error 404 jika tidak ditemukan
        $produk = Produk::findOrFail($id);

        // Menghapus record produk
        $produk->delete();

        return redirect()->route('tampil_produk')->with('success', 'Produk berhasil dihapus!');
    }
}