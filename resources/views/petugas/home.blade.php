@extends('layouts.app')

@section('title', 'Dashboard Petugas')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Dashboard Petugas</h2>

        {{-- Kelola Stok Barang --}}
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Kelola Stok Produk</div>
            <div class="card-body">
                <a href="{{ route('petugas.produk') }}" class="btn btn-outline-primary">Lihat Semua Produk</a>
            </div>
        </div>

        {{-- Proses Pesanan --}}
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">Proses Pesanan Masuk</div>
            <div class="card-body">
                <a href="{{ route('petugas.pesanan') }}" class="btn btn-outline-warning">Lihat Pesanan Masuk</a>
            </div>
        </div>
        {{-- Lihat Daftar Transaksi --}}
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Daftar Transaksi</div>
            <div class="card-body">
                <a href="{{ route('petugas.transaksi') }}" class="btn btn-outline-success">Lihat Semua Transaksi</a>
            </div>
        </div>
    </div>
@endsection
