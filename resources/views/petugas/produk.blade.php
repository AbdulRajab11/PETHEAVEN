@extends('layouts.app')

@section('title', 'Kelola Stok Produk')

@section('content')
<div class="container mt-5">
    <h2>Daftar Produk</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produks as $produk)
            <tr>
                <td>{{ $produk->nama_produk }}</td>
                <td>{{ $produk->stok }}</td>
                <td>
                    <a href="{{ route('petugas.produk.editStok', $produk->id_produk) }}" class="btn btn-sm btn-warning">Edit Stok</a>
                </td>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
