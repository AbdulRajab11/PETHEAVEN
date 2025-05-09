<?php

namespace App\Http\Controllers;

use App\Models\Transaksi; // Pastikan model Transaksi sudah ada
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
    {
        $transaksis = Transaksi::with(['user', 'petugas'])->get(); // Mengambil data transaksi beserta relasi user dan petugas
        return response()->json($transaksis);
    }

    // Menambahkan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:user,id_user',
            'id_petugas' => 'nullable|exists:user,id_user',
            'tanggal' => 'required|date',
            'total_harga' => 'required|numeric',
            'status' => 'required|in:Menunggu Pembayaran,Diproses,Dikirim,Selesai,Dibatalkan',
            'metode_pembayaran' => 'required|in:Transfer,COD,QRIS',
            'alamat_pengiriman' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $transaksi = Transaksi::create($request->all());
        return response()->json($transaksi, 201);
    }

    // Mengupdate transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'sometimes|required|in:Menunggu Pembayaran,Diproses,Dikirim,Selesai,Dibatalkan',
            'total_harga' => 'sometimes|required|numeric',
            'metode_pembayaran' => 'sometimes|required|in:Transfer,COD,QRIS',
            'alamat_pengiriman' => 'sometimes|required|string',
            'catatan' => 'nullable|string',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());
        return response()->json($transaksi);
    }

    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return response()->json(null, 204);
    }
}
