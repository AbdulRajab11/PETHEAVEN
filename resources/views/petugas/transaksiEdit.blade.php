@extends('layouts.app')

@section('title', 'Ubah Status Transaksi')

@section('content')
<div class="container mt-5">
    <h2>Ubah Status Transaksi</h2>
    <form action="{{ route('petugas.transaksi.update', $transaksi->id_transaksi) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Status Transaksi:</label>
            <select name="status_transaksi" class="form-control" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status }}" {{ $transaksi->status_transaksi == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('petugas.transaksi') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
