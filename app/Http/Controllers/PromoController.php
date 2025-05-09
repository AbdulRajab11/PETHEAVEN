<?php

namespace App\Http\Controllers;

use App\Models\Promo; // Pastikan model Promo sudah ada
use Illuminate\Http\Request;

class PromoController extends Controller
{
    // Menampilkan semua promo
    public function index()
    {
        $promos = Promo::all(); // Mengambil semua data promo
        return response()->json($promos);
    }

    // Menambahkan promo baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_promo' => 'required|string|max:50|unique:promo,kode_promo',
            'diskon' => 'required|numeric|min:0',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'syarat' => 'nullable|string',
        ]);

        $promo = Promo::create($request->all());
        return response()->json($promo, 201);
    }

    // Mengupdate promo
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_promo' => 'sometimes|required|string|max:50|unique:promo,kode_promo,' . $id . ',id_promo',
            'diskon' => 'sometimes|required|numeric|min:0',
            'tanggal_mulai' => 'sometimes|required|date',
            'tanggal_selesai' => 'sometimes|required|date|after_or_equal:tanggal_mulai',
            'syarat' => 'nullable|string',
        ]);

        $promo = Promo::findOrFail($id);
        $promo->update($request->all());
        return response()->json($promo);
    }

    // Menghapus promo
    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        $promo->delete();
        return response()->json(null, 204);
    }
}
