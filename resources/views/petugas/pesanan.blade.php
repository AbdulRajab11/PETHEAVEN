@extends('layouts.app')

@section('title', 'Daftar Pesanan')

@section('content')
<div class="container mt-5">
    <h2>Daftar Pesanan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pemesan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanans as $pesanan)
            <tr>
                <td>{{ $pesanan->user->nama_lengkap ?? 'Tidak Diketahui' }}</td>
                <td>{{ $pesanan->produk->nama_produk ?? 'Produk Dihapus' }}</td>
                <td>{{ $pesanan->jumlah }}</td>
                <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                <td>{{ $pesanan->status }}</td>
                <td>
                    <a href="{{ route('petugas.editPesanan', $pesanan->id) }}" class="btn btn-sm btn-warning">Ubah Status</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
