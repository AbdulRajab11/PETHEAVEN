@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Transaksi User</h2>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaction)
                <tr>
                    <td>{{ $transaction->id_transaksi }}</td>
                    <td>{{ $transaction->user->nama_lengkap }}</td>
                    <td>Rp{{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($transaction->status) }}</td>
                    <td>{{ $transaction->created_at->format('d M Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
