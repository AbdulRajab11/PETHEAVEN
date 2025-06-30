<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function userIndex()
{
    $produks = Produk::latest()->paginate(9); // Atau ->get() jika tanpa pagination
    return view('user.produk', compact('produks'));
}
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        return view('partials.lihatProduk', compact('produks'));
        // $produks = Produk::latest()->get();
        // return view('user.produk', compact('produks'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('partials.createProduk', compact('kategori'));
    }

    public function store(Request $request)
{

    $request->validate([
        'nama_produk' => 'required|string|max:255',
        'harga'       => 'required|numeric',
        'stok'        => 'required|integer|min:0',
        'deskripsi'   => 'nullable|string',
        // 'gambar'      => 'nullable|image|mimes:jpg,jpeg,png',
        'id_kategori' => 'required|exists:kategori,id_kategori',
    ]);

    $data = $request->only(['nama_produk', 'harga', 'stok', 'deskripsi', 'id_kategori']);

    // if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
    //     $data['gambar'] = $request->file('gambar')->store('produk', 'public');
    // }

    Produk::create($data);

    return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
}


    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('partials.editProduk', compact('produk', 'kategori'));

    }
    public function stokIndex()
{
    $produks = Produk::all();
    return view('petugas.produk', compact('produks'));
}

public function editStok($id)
{
    $produk = Produk::findOrFail($id);
    return view('petugas.editProduk', compact('produk'));
}

public function updateStok(Request $request, $id)
{
    $request->validate([
        'stok' => 'required|integer|min:0',
    ]);

    $produk = Produk::findOrFail($id);
    $produk->stok = $request->stok;
    $produk->save();

    return redirect()->route('petugas.produk')->with('success', 'Stok produk berhasil diperbarui.');
}

    public function update(Request $request, $id)
    {
        
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);
        dd($request->all());
        if ($request->file('gambar')->isValid()) {
        //     // Hapus gambar lama jika ada
            if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
                Storage::disk('public')->delete($produk->gambar);
            }

            $produk->gambar = $request->file('gambar')->store('produk', 'public');
        }

        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->deskripsi = $request->deskripsi;
        $produk->id_kategori = $request->id_kategori;
        $produk->save();

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
