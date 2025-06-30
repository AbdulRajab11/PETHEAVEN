@extends('layouts.app')

@section('title', 'Edit Stok')

@section('content')
<div class="container mt-5">
    <h2>Edit Stok Produk</h2>
    <form action="{{ route('petugas.produk.updateStok', $produk->id_produk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="stok">Stok:</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ $produk->stok }}" min="0" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Stok</button>
        <a href="{{ route('petugas.produk') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
