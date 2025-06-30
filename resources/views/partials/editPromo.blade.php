@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Promo</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('promo.update', $promo->id_promo) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul_promo" class="form-label">Judul Promo</label>
            <input type="text" class="form-control" id="judul_promo" name="judul_promo"
                   value="{{ old('judul_promo', $promo->judul_promo) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $promo->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai"
                   value="{{ old('tanggal_mulai', $promo->tanggal_mulai) }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai"
                   value="{{ old('tanggal_selesai', $promo->tanggal_selesai) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('promo.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
