@extends('layouts.app')

@section('title', 'Ubah Status Pesanan')

@section('content')
<div class="container mt-5">
    <h2>Ubah Status Pesanan</h2>
    <form action="{{ route('petugas.pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control" required>
                @foreach ($statuses as $status)
                    <option value="{{ $status }}" {{ $pesanan->status == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('petugas.pesanan') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
