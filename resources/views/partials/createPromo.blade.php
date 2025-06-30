@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Tambah Promo</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('promo.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="judul_promo" class="form-label">Judul Promo</label>
            <input type="text" class="form-control" id="judul_promo" name="judul_promo" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('promo.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
