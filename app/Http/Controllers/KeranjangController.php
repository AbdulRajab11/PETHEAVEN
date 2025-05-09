<?php

namespace App\Http\Controllers;

use App\Models\Keranjang; // Pastikan model Keranjang sudah ada
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    // Menampilkan semua item di keranjang
    public function index()
    {
        $keranjangs = Keranjang::with(['produk', 'user'])->get(); // Mengambil data keranjang beserta relasi produk dan user
        return response()->json($keranjangs);
    }

    // Menambahkan item ke keranjang
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:user,id_user',
            'id_produk' => 'required|exists:produk,id_produk',
            'jumlah' => 'required|integer|min:1',
        ]);

        $keranjang = Keranjang::create($request->all());
        return response()->json($keranjang, 201);
    }

    // Mengupdate item di keranjang
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $keranjang = Keranjang::findOrFail($id);
        $keranjang->update($request->all());
        return response()->json($keranjang);
    }

    // Menghapus item dari keranjang
    public function destroy($id)
    {
        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();
        return response()->json(null, 204);
    }
}
