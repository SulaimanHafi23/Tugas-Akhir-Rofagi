<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NodeMCU extends Model
{
    use HasFactory;

    protected $table = 'nodemcu';

    protected $fillable = [
        'nama_produk',
        'jumlah',
        'status',
    ];
}
