@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Produk</h2>

    <div class="row">
        {{-- <a class="nav-link" href="{{ route('kategori.index') }}">Categories</a> --}}
        @forelse ($produks as $produk)

        <div class="col-md-4 mb-4">
            <div class="card h-100">
                {{-- @if ($produk->gambar)
                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama }}">
                @else
                    <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default">
                @endif --}}
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                    <p class="card-text">{{ Str::limit($produk->deskripsi, 100) }}</p>
                    <p class="card-text"><strong>Rp {{ number_format($produk->harga, 0, ',', '.') }}</strong></p>

                    {{-- Tombol aksi --}}
                    <form action="{{ route('keranjang.store') }}" method="POST" class="mb-2 mt-auto">
                        @csrf
                        <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                        {{-- <input type="hidden" name="id_user" value="{{ auth()->id() }}"> --}}
                        <input type="hidden" name="jumlah" value="1">
                        <button type="submit" class="btn btn-warning btn-sm w-100">+ Keranjang</button>
                    </form>

                    <a href="{{ route('checkout.beli', $produk->id_produk) }}" class="btn btn-primary btn-sm w-100">Beli Sekarang</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-muted">Tidak ada produk tersedia.</p>
        </div>
        @endforelse
    </div>

    {{ $produks->links() }} {{-- Pagination --}}
</div>
@endsection
