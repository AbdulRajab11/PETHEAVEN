@extends('layouts.app')

@section('title', 'Checkout Produk')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Checkout Produk</h2>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    {{-- @if ($produk->gambar)
                        <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama }}">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default">
                    @endif --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                        <p class="card-text">{{ $produk->deskripsi }}</p>
                        <p class="card-text"><strong>Harga: Rp {{ number_format($produk->harga, 0, ',', '.') }}</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <form action="{{ route('checkout.proses') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                    <input type="hidden" name="id_user" value="{{ auth()->id() }}">

                    <div class="form-group mb-3">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" min="1"
                            value="1" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="alamat">Alamat Pengiriman</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
                            <option value="" disabled selected>-- Pilih Metode --</option>
                            <option value="Transfer">Transfer</option>
                            <option value="COD">COD</option>
                            <option value="QRIS">QRIS</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="catatan">Catatan (opsional)</label>
                        <textarea name="catatan" id="catatan" class="form-control" rows="2"
                            placeholder="Contoh: Tolong bungkus dengan rapi."></textarea>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Proses Pesanan</button>
                </form>

            </div>
        </div>
    </div>
@endsection
