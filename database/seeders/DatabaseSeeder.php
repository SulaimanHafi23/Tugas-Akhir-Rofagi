<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\NodeMCU;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Pengguna 1',
            'password' => Hash::make('AdminKerupuk'),
        ]);

        User::create([
            'name' => 'Pengguna 2',
            'password' => Hash::make('AdminKerupuk'),
        ]);

        NodeMCU::create([
            'nama_produk' => 'kosong',
            'status' => 'berhenti',
            'jumlah' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
