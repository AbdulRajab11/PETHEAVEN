<?php

namespace App\Http\Controllers;
use App\Models\Product;


use Illuminate\Http\Request;
use App\Models\Produk;
use App\Http\Middleware\CekLogin;

// #[\App\Http\Middleware\Middleware([CekLogin::class])]

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
        // $produk = Produk::orderBy('id_produk', 'desc')->take(6)->get(); // Ambil produk dari tabel 'produk'
        // return view('home', compact('produk')); // Tampilkan ke view home.blade.php
    }
}
