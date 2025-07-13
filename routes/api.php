<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NodeMCUController;

Route::get('/nodemcu', [NodeMCUController::class, 'getDataForESP']);
Route::post('/produksi/nama_produk/{nama_produk}/jumlah/{jumlah}', [NodeMCUController::class, 'updateDariESP']);
Route::post('/status/{status}', [NodeMCUController::class, 'updateStatus']);