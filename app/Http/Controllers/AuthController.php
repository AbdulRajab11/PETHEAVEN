<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:admin,petugas,user',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        // Simpan ke database
        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
        public function showLogin(){
            return view('auth.login');
        }
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password, // cocokkan dengan kolom password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return match ($user->role) {
                'admin' => redirect()->route('home'),
                'petugas' => redirect()->route('petugas.home'),
                'user' => redirect()->route('user.home'),
                default => abort(403, 'Role tidak dikenali.'),
            };
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
    

