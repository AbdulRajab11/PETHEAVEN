<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Pastikan model Kategori sudah ada
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        // $kategoris = Kategori::all(); // Mengambil semua data kategori
        // return response()->json($kategoris);
        $kategori = \App\Models\Kategori::all(); // atau with('kategori') jika perlu
    return view('partials.kategori', compact('kategori'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('partials.createCategori', compact('kategori'));
    }


    // Menambahkan kategori baru
    public function store(Request $request)
{
    $request->validate([
        'nama_kategori' => 'required|string|max:255',
    ]);

    Kategori::create([
        'nama_kategori' => $request->nama_kategori,
    ]);

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
}
    public function showByKategori()
{
    $kategoriList = Kategori::with('produk')->get(); // eager load produk
    return view('user.kategori', compact('kategoriList'));
}

    public function edit($id)
{
    $kategori = Kategori::findOrFail($id);
    return view('partials.editCategori', compact('kategori'));
}
    // Mengupdate kategori
    public function update(Request $request, $id)
{
    $request->validate([
        'nama_kategori' => 'sometimes|required|string|max:255|unique:kategori,nama_kategori,' . $id . ',id_kategori',
        'deskripsi' => 'nullable|string',
    ]);

    $kategori = Kategori::findOrFail($id);
    $kategori->update($request->all());

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
}


    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return response()->json(null, 204);
    }
}
