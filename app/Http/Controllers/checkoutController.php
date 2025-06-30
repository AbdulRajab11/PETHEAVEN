<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    // Menampilkan form checkout
    public function beli($id)
    {
        $produk = Produk::where('id_produk', $id)->firstOrFail();
        return view('user.checkout', compact('produk'));
    }

    // Memproses penyimpanan pesanan dan transaksi
    public function proses(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'jumlah' => 'required|integer|min:1',
            'alamat' => 'required|string|max:255',
            'metode_pembayaran' => 'required|in:Transfer,COD,QRIS',
            'catatan' => 'nullable|string|max:255'
        ]);

        DB::beginTransaction();

        try {
            $produk = Produk::findOrFail($request->id_produk);
            $total_harga = $produk->harga * $request->jumlah;

            // Simpan ke tabel pesanan
            $pesanan = Pesanan::create([
                'id_user' => Auth::id(),
                'id_produk' => $produk->id_produk,
                'jumlah' => $request->jumlah,
                'alamat_pengiriman' => $request->alamat,
                'total_harga' => $total_harga,
                'status' => 'Menunggu Konfirmasi',
            ]);

            // Simpan ke tabel transaksi
            Transaksi::create([
                'id_user' => Auth::id(),
                'id_petugas' => null, // Belum diproses petugas
                'tanggal' => now(),
                'total_harga' => $total_harga,
                'status' => $request->metode_pembayaran === 'COD' ? 'Diproses' : 'Menunggu Pembayaran',
                'metode_pembayaran' => $request->metode_pembayaran,
                'alamat_pengiriman' => $request->alamat,
                'catatan' => $request->catatan ?? '',
            ]);

            DB::commit();

            return redirect()->route('user.produk')->with('success', 'Pesanan dan transaksi berhasil diproses!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
