<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\NodeMCU;
use App\Models\Produksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProduksiController extends Controller
{

    public function index()
    {
        $produksiPerTanggal = DB::table('produksis')
            ->select(DB::raw('DATE(created_at) as tanggal'), 
                    DB::raw('COUNT(DISTINCT produk_id) as jenis_kerupuk'), 
                    DB::raw('SUM(jumlah) as total_jumlah'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('Produksi.index', compact('produksiPerTanggal'));
    }

        public function create()
    {
        $produks = Produk::all();
        $NodeMcu = NodeMCU::all();
        return view('Produksi.create', compact('produks', 'NodeMcu'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_produk' => 'required|string|exists:produks,nama_produk',
            'jumlah' => 'required|integer|min:1',
        ]);
        $nama_produk = $request->nama_produk;

        $produk = Produk::where('nama_produk', $nama_produk)->first();

        if (!$produk) {
            return back()->with('error', 'Produk tidak ditemukan.');
        }

        $produksi = Produksi::where('produk_id', $produk->id)
            ->whereDate('created_at', Carbon::today())
            ->first();

        if ($produksi) {
            $produksi->jumlah += $request->jumlah;
            $produksi->save();
        } else {
            Produksi::create([
                'produk_id' => $produk->id,
                'jumlah' => $request->jumlah,
            ]);
        }

        NodeMCU::findOrFail(1)->update([
            'nama_produk' => 'kosong',
            'jumlah' => 0,
            'status' => 'selesai',
        ]);

        return back()->with('success', 'Data produksi berhasil disimpan.');
    }
 
    public function detail($tanggal)
    {
        // Ambil semua produksi pada tanggal tertentu
        $produksi = Produksi::with('produk')
        ->whereDate('created_at', $tanggal)
        ->get();
        
        
        // Hitung total jumlah kerupuk
        $totalJumlah = $produksi->sum('jumlah');

        // Hitung jumlah jenis kerupuk unik (distinct produk_id)
        $jenisKerupuk = $produksi->pluck('produk_id')->unique()->count();

        return view('Produksi.show', compact('tanggal', 'produksi', 'totalJumlah', 'jenisKerupuk'));
    }

    public function delete($id) 
    {
        $produksi = Produksi::findOrFail($id);
        $produksi->delete();

        return back()->with('success', 'Produk berhasil dihapus!');
    }

    public function start(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
        ]);

        $produk = Produk::findOrFail($request->produk_id);
        $NodeMcu = NodeMCU::findOrFail(1);

        // Perbaiki bagian ini
        if ($NodeMcu->status != 'mulai') {
            $NodeMcu->update([
                'nama_produk' => $produk->nama_produk,
                'jumlah' => 0,
                'status' => 'mulai',
            ]);
            return back()->with('success', 'IOT sudah dapat memulai prosesnya.');
        }

        return back()->with('error', 'Produksi sudah dimulai.');
    }
    
    public function selesai(Request $request)
    {
        $NodeMcu = NodeMCU::findOrFail(1);
        
        if ($NodeMcu->jumlah == 0) {
            $NodeMcu->update([
                'nama_produk' => 'kosong',
                'jumlah' => 0,
                'status' => 'selesai',
            ]);
            return redirect()->route('tampil_produksi')->with('success', 'Proses produksi telah diselesaikan!');
        }
        return back()->with('error', 'Silahkan Reset atau Simpan Ke Database Terlebih dahulu.');
    }

    public function reset()
    {
        $NodeMcu = NodeMCU::findOrFail(1);

        if ($NodeMcu->nama_produk != 'kosong') {
            $NodeMcu->update([
                'jumlah' => 0,
                'status' => 'reset',
            ]);
            return back()->with('success', 'IOT berhasil di reset.');
        }
        return back()->with('error', 'Tidak ada produksi dimulai.');
    }

}

