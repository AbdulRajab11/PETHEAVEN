@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Transaksi</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama User</th>
                <th>Nama Petugas</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Metode Pembayaran</th>
                <th>Alamat Pengiriman</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td>{{ $transaksi->id_transaksi }}</td>
                    <td>{{ $transaksi->user->nama_lengkap ?? '-' }}</td>
                    <td>{{ $transaksi->petugas->nama_lengkap ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y H:i') }}</td>
                    <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $transaksi->status }}</td>
                    <td>{{ $transaksi->metode_pembayaran }}</td>
                    <td>{{ $transaksi->alamat_pengiriman }}</td>
                    <td>{{ $transaksi->catatan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
