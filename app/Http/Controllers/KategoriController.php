<?php

namespace App\Http\Controllers;

use App\Models\Kategori; // Pastikan model Kategori sudah ada
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $kategoris = Kategori::all(); // Mengambil semua data kategori
        return response()->json($kategoris);
    }

    // Menambahkan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori',
            'deskripsi' => 'nullable|string',
        ]);

        $kategori = Kategori::create($request->all());
        return response()->json($kategori, 201);
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
        return response()->json($kategori);
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        return response()->json(null, 204);
    }
}
