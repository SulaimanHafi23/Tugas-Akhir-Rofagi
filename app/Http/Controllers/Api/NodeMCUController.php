<?php

namespace App\Http\Controllers\Api;

use App\Models\NodeMCU;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NodeMCUController extends Controller
{
    public function updateDariESP($nama_produk, $jumlah, Request $request)
    {
        $token = $request->query('token');
        $nodemcu = NodeMCU::find(1);

        // Cek apakah token cocok
        if ($token !== env('ESP_ACCESS_TOKEN')) {
            return response()->json(['status' => 'unauthorized', 'message' => 'Token tidak valid'], 401);
        }

        // Validasi input jumlah
        if (!is_numeric($jumlah) || $jumlah < 0) {
            return response()->json(['status' => 'error', 'message' => 'Jumlah tidak valid'], 400);
        }

        if (!$nodemcu) {
            return response()->json(['status' => 'error', 'message' => 'Data NodeMCU tidak ditemukan'], 404);
        }

        $nodemcu->update([
            'nama_produk' => urldecode($nama_produk),
            'jumlah' => (int)$jumlah,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diterima dari ESP',
            'data' => $nodemcu
        ]);
    }

    public function updateStatus($status, Request $request)
{
    $token = $request->query('token');

    // Validasi token
    if ($token !== env('ESP_ACCESS_TOKEN')) {
        return response()->json([
            'status' => 'unauthorized',
            'message' => 'Token tidak valid'
        ], 401);
    }

    // Ambil data NodeMCU
    $nodemcu = NodeMCU::find(1);
    if (!$nodemcu) {
        return response()->json([
            'status' => 'error',
            'message' => 'Data NodeMCU tidak ditemukan'
        ], 404);
    }

    if ($status === 'reset') {
        // Jika status sekarang bukan reset, tolak
        if ($nodemcu->status !== 'reset') {
            return response()->json([
                'status' => 'error',
                'message' => 'Status tidak valid untuk reset'
            ], 400);
        }

        // Jalankan reset → set jumlah 0 dan status mulai
        $nodemcu->update([
            'status' => 'mulai',
            'jumlah' => 0,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Status berhasil direset ke mulai & jumlah diset ke 0',
            'data' => $nodemcu
        ]);
    } else {
        return response()->json([
            'status' => 'error',
            'message' => 'Perintah status tidak valid'
        ], 400);
    }
}

    public function getDataForESP(Request $request)
    {
        $token = $request->query('token');

        if ($token !== env('ESP_ACCESS_TOKEN')) {
            return response()->json(['status' => 'unauthorized'], 401);
        }

        $nodemcu = \App\Models\NodeMCU::find(1);

        if (!$nodemcu) {
            return response()->json(['status' => 'not_found'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'nama_produk' => $nodemcu->nama_produk,
                'jumlah' => $nodemcu->jumlah,
                'status' => $nodemcu->status,
            ]
        ]);
    }
}
