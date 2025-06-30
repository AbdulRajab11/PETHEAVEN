<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan model User sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Kategori;


class UserController extends Controller
{
    public function myAccount()
{
    $user = User::with('profile')->find(Auth::id());
    return view('user.myaccount', compact('user'));
}

    // Menampilkan semua pengguna
    public function index()
    {
        // $users = User::all(); // Mengambil semua data pengguna
        // return response()->json($users);
        $users = \App\Models\User::all(); // atau with('kategori') jika perlu
        return view('partials.daftarUser', compact('users'));
    }
    public function showByKategori()
{
    $kategoriList = Kategori::with('produk')->get(); // memuat semua kategori beserta produk-produk dalam kategori itu
    return view('user.kategori', compact('kategoriList'));
}

    // Menambahkan pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:user,admin', // Misalnya, role bisa user atau admin
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return response()->json($user, 201);
    }

    public function edit($id)
    {
    $user = User::findOrFail($id);
    return view('partials.editUser', compact('user'));
    }


    // Mengupdate pengguna
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:user,email,' . $id . ',id_user',
        'password' => 'nullable|string|min:8|confirmed',
        'role' => 'required|in:user,admin,petugas',
        'no_hp' => 'nullable|string|max:20',
        'alamat' => 'nullable|string',
    ]);

    $user = User::findOrFail($id);

    $data = $request->only(['nama_lengkap', 'email', 'role', 'no_hp', 'alamat']);

    // Hanya hash password jika diberikan
    if ($request->filled('password')) {
        $data['password'] = Hash::make($request->password);
    }

    $user->update($data);

    return redirect()->route('users.index')->with('success', 'Data pengguna berhasil diperbarui.');
}


    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
    
}
