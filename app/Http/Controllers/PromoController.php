<?php

namespace App\Http\Controllers;

use App\Models\Promo; // Pastikan model Promo sudah ada
use Illuminate\Http\Request;

class PromoController extends Controller
{
    // Menampilkan semua promo
    public function index()
    {
        // $promos = Promo::all(); // Mengambil semua data promo
        // return response()->json($promos);
        $promos = \App\Models\Promo::all(); // atau with('kategori') jika perlu
        return view('partials.promo', compact('promos'));
    }
    public function create()
{
    return view('partials.createPromo');
}

    // Menambahkan promo baru
    public function store(Request $request)
{
    $request->validate([
        'judul_promo' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
    ]);

    Promo::create($request->all());

    return redirect()->route('promo.index')->with('success', 'Promo berhasil ditambahkan');
}

    public function edit($id)
{
    $promo = Promo::findOrFail($id);
    return view('partials.editPromo', compact('promo'));
}

    // Mengupdate promo
    public function update(Request $request, $id)
{
    $request->validate([
        'judul_promo' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
    ]);

    $promo = Promo::findOrFail($id);
    $promo->update($request->all());

    return redirect()->route('promo.index')->with('success', 'Promo berhasil diperbarui');
}


    // Menghapus promo
    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        $promo->delete();
        return response()->json(null, 204);
    }
}
