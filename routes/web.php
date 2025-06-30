<?php

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\adminMinddleware;
use App\Http\Middleware\petugasMinddleware;
use App\Http\Middleware\userMiddleware;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
use App\Models\Keranjang;
use App\Models\Transaksi;

//use App\Http\Controllers\Dashboard;    



Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.action');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.action');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([adminMinddleware::class])->group(function () {
    Route::get('/home', function () {
        $produks = Produk::latest()->take(6)->get();
        return view('home', compact('produks'));
    })->name('home');

    Route::resource('products', ProdukController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('promo', PromoController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('users', UserController::class);
   // Route::resource('pesanan', PesananController::class);
});

Route::middleware([petugasMinddleware::class])->group(function () {
    Route::get('/petugas/home', function () {
        $produks = Produk::latest()->take(6)->get();
        $transaksis = Transaksi::latest()->take(6)->get(); // ambil data transaksi juga
        return view('petugas.home', compact('produks', 'transaksis'));
    })->name('petugas.home');
    Route::get('/petugas/produk', function () {
        $produks = Produk::latest()->take(6)->get();
        return view('petugas.produk', compact('produks'));
    })->name('petugas.produk');
    
    Route::get('/produk', [ProdukController::class, 'stokIndex'])->name('petugas.produk.index');
    Route::get('/produk/{id}/edit-stok', [ProdukController::class, 'editStok'])->name('petugas.produk.editStok');
    Route::put('/produk/{id}/update-stok', [ProdukController::class, 'updateStok'])->name('petugas.produk.updateStok');
    Route::get('/pesanan', [PesananController::class, 'index'])->name('petugas.pesanan');
    Route::get('/pesanan/{id}/edit', [PesananController::class, 'edit'])->name('petugas.editPesanan');
    Route::put('/pesanan/{id}', [PesananController::class, 'update'])->name('petugas.pesanan.update');
    Route::put('/petugas/transaksi/{id}', [TransaksiController::class, 'update'])->name('petugas.transaksi.update');
    Route::get('/petugas/transaksi', [TransaksiController::class, 'petugasTransaksi'])->name('petugas.transaksi');
    Route::get('/petugas/transaksi/status', [TransaksiController::class, 'edit'])->name('petugas.transaksiEdit');

    // Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('petugas.transaksi.update');
});

Route::middleware(['auth', userMiddleware::class])->group(function () {
    Route::get('/user/home', function () {
        $produks = Produk::latest()->take(6)->get();
        return view('user.home', compact('produks'));
    })->name('user.home');
    // Route::get('/home', function () {
    //     $produks = Produk::latest()->take(6)->get();
    //     return view('home', compact('produks'));
    // })->name('home');

    // Tambahan: jika user punya halaman produk
    Route::get('/user/produk', [ProdukController::class, 'userIndex'])->name('user.produk');
    Route::resource('keranjang', KeranjangController::class);
    //     // Menampilkan keranjang
    //Route::post('/keranjang/{id_produk}', [KeranjangController::class, 'store'])->name('keranjang.tambah');
    Route::get('/user/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::delete('/keranjang/hapus/{id_keranjang}', [KeranjangController::class, 'destroy'])->name('keranjang.remove');
    Route::post('/keranjang/tambah', [KeranjangController::class, 'store'])->name('keranjang.store');

    Route::post('/checkout', [KeranjangController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/beli/{id_produk}', [CheckoutController::class, 'beli'])->name('checkout.beli');
    //Route::get('/checkout/beli/{id_produk}', [CheckoutController::class, 'beli'])->name('checkout.beli');
    Route::post('/checkout/proses', [CheckoutController::class, 'proses'])->name('checkout.proses');
    Route::get('/produk-per-kategori', [UserController::class, 'showByKategori'])->name('user.kategori');
    Route::get('/my-account', [UserController::class, 'myAccount'])->name('user.myaccount');
    Route::get('/user/transaksi', [TransaksiController::class, 'userTransaksi'])->name('user.transaksi');
});
