<?php

namespace App\Http\Controllers;

use App\Models\Transaksi; // Pastikan model Transaksi sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    // Menampilkan semua transaksi
    public function index()
    {
        // $transaksis = Transaksi::with(['user', 'petugas'])->get(); // Mengambil data transaksi beserta relasi user dan petugas
        // return response()->json($transaksis);
        $transaksis = \App\Models\Transaksi::all(); // atau with('kategori') jika perlu
        return view('partials.transaksi', compact('transaksis'));

        $transaksi = Transaksi::with(['user', 'petugas'])->get();
        return view('transaksi', compact('transaksi'));
    }
    public function petugasTransaksi()
    {
        $transaksis = Transaksi::with('user', 'pesanan')->orderBy('created_at', 'desc')->get();
        return view('petugas.transaksi', compact('transaksis'));
    }
    public function userTransaksi()
    {
        $transaksis = Transaksi::with('user')
            ->where('id_user', Auth::id()) // hanya ambil milik user login
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.transaksi', compact('transaksis'));
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

    public function edit($id)
    {
        $transaksi = Transaksi::with('user', 'pesanan')->findOrFail($id);
        $transaksi = Transaksi::findOrFail($id);
        $statuses = ['Belum Bayar', 'Dibayar', 'Dikirim', 'Selesai'];
        return view('petugas.transaksi', compact('transaksi', 'statuses'));
    }
    // Mengupdate transaksi
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu Pembayaran,Diproses,Dikirim,Selesai,Dibatalkan',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $request->status;
        $transaksi->save();

        return back()->with('success', 'Status transaksi diperbarui.');
    }


    // Menghapus transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return response()->json(null, 204);
    }
}
