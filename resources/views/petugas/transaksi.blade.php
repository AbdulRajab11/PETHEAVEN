@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
    <div class="container mt-5">
        <h2>Daftar Transaksi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->user->nama_lengkap ?? 'Tidak Diketahui' }}</td>
                        <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                        <td>{{ $transaksi->status }}</td>
                        <td>
                            <form action="{{ route('petugas.transaksi.update', $transaksi->id_transaksi) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <select name="status" class="form-select form-select-sm d-inline w-auto">
                                    @foreach (['Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'] as $status)
                                        <option value="{{ $status }}"
                                            {{ $transaksi->status === $status ? 'selected' : '' }}>
                                            {{ $status }}
                                        </option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
