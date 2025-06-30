@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Produk Terbaru</h2>
    <div class="row">
        @foreach($produks as $produk)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    {{-- <img src="{{ $produk->gambar ? asset('storage/' . $produk->gambar) : 'https://via.placeholder.com/300x200?text=No+Image' }}"
                        class="card-img-top" style="object-fit: cover; height: 200px;" alt="Gambar Produk"> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                        <p class="card-text text-muted">
                            {{ $produk->kategori->nama_kategori ?? 'Tanpa Kategori' }}
                        </p>
                        <p class="card-text fw-bold text-primary">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
