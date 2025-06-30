<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
// use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    // Menampilkan semua item keranjang milik user yang sedang login
    public function index()
    {
        $keranjangs = Keranjang::where('id_user', Auth::id())->get();
        return view('user.keranjang', compact('keranjangs'));
    }

    // Menambahkan produk ke keranjang
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'jumlah' => 'required|integer|min:1',
        ]);

        $id_produk = $request->id_produk;
        $id_user = Auth::id();

        $keranjang = Keranjang::where('id_user', $id_user)
            ->where('id_produk', $id_produk)
            ->first();

        if ($keranjang) {
            $keranjang->jumlah += $request->jumlah;
            $keranjang->save();
        } else {
            Keranjang::create([
                'id_user' => $id_user,
                'id_produk' => $id_produk,
                'jumlah' => $request->jumlah,
            ]);
        }

        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }


    // Menghapus produk dari keranjang
        public function destroy($id_keranjang)
{
    $keranjang = Keranjang::where('id_keranjang', $id_keranjang)
        ->where('id_user', Auth::id())
        ->firstOrFail();

    $keranjang->delete();

    return redirect()->route('keranjang.index')->with('success', 'Produk berhasil dihapus dari keranjang.');
}

}
