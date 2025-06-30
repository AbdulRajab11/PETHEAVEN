@extends('layouts.app')

@section('title', 'Produk Berdasarkan Kategori')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Produk Berdasarkan Kategori</h2>

    @foreach ($kategoriList as $kategori)
        <div class="mb-5">
            <h4 class="mb-3">{{ $kategori->nama_kategori }}</h4>
            <div class="row">
                @forelse ($kategori->produk as $produk)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            {{-- @if ($produk->gambar)
                                <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama }}">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default">
                            @endif --}}
                            <div class="card-body">
                                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                <p class="card-text">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                <a href="{{ route('checkout.beli', $produk->id_produk) }}" class="btn btn-primary btn-sm w-100">Beli</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted ms-3">Tidak ada produk dalam kategori ini.</p>
                @endforelse
            </div>
        </div>
    @endforeach
</div>
@endsection
