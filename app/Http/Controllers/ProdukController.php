<?php

namespace App\Http\Controllers;

use App\Models\Produk; // Pastikan model Produk sudah ada
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Menampilkan semua produk
    public function index()
    {
        $produks = Produk::with('kategori')->get(); // Mengambil data produk beserta relasi kategori
        return response()->json($produks);
    }

    // Menambahkan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|string',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $produk = Produk::create($request->all());
        return response()->json($produk, 201);
    }

    // Mengupdate produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'sometimes|required|string|max:255',
            'harga' => 'sometimes|required|numeric',
            'stok' => 'sometimes|required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|string',
            'id_kategori' => 'sometimes|required|exists:kategori,id_kategori',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($request->all());
        return response()->json($produk);
    }

    // Menghapus produk
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return response()->json(null, 204);
    }
}
