<?php

namespace App\Http\Controllers;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    

public function index()
{
    $pesanans = Pesanan::with('produk', 'user')->orderBy('created_at', 'desc')->get();
    return view('petugas.pesanan', compact('pesanans'));
}

public function edit($id)
{
    $pesanan = Pesanan::with('produk', 'user')->findOrFail($id);
    $statuses = ['Menunggu Konfirmasi', 'Diproses', 'Dikirim', 'Selesai'];
    return view('petugas.editPesanan', compact('pesanan', 'statuses'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'status' => 'required|string'
    ]);

    $pesanan = Pesanan::findOrFail($id);
    $pesanan->status = $request->status;
    $pesanan->save();

    return redirect()->route('petugas.pesanan')->with('success', 'Status pesanan diperbarui.');
}

}
