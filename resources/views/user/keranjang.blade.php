@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Keranjang Belanja</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($keranjangs as $item)
                    <tr>
                        <td>{{ $item->produk->nama_produk }}</td>
                        <td>Rp {{ number_format($item->produk->harga) }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp {{ number_format($item->produk->harga * $item->jumlah) }}</td>
                        <td>
                            <form action="{{ route('keranjang.remove', $item->id_keranjang) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('checkout.beli', $item->id_produk) }}" method="GET">
                                @csrf
                                <button class="btn btn-primary">Checkout</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
