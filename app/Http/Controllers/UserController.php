<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Halaman awal / login
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('beranda'); 
        }
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi form login
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Login dengan "remember me" jika dicentang
        $remember = $request->filled('remember'); // true jika checkbox dicentang

        if (Auth::attempt([
            'name' => $credentials['name'],
            'password' => $credentials['password']
        ], $remember)) {
            $request->session()->regenerate();

            return redirect()->route('Beranda')->with('success', 'Berhasil login!');
        }

        return back()->withErrors([
            'name' => 'Nama atau password salah.',
        ])->onlyInput('name');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah logout.');
    }

    // Override default 'email' ke 'name' (opsional jika pakai Auth::viaRemember() atau default guard)
    public function username()
    {
        return 'name';
    }
}
