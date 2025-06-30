@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Daftar Produk</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    </div>

    <div class="row">
        @foreach($produks as $produk)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    {{-- <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama_produk }}" style="height: 200px; object-fit: cover;"> --}}
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                            <p class="card-text">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        </div>
                        <div class="mt-3 d-flex justify-content-between">
                            <a href="{{ route('products.edit', $produk) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('products.destroy', $produk) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
