@extends('layouts.app')

@section('title', 'My Account')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Akun Saya</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $user->nama_lengkap }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>No. HP:</strong> {{ $user->no_hp }}</p>
            <p class="card-text"><strong>Alamat:</strong> {{ $user->alamat }}</p>
            <p class="card-text"><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

            {{-- Tombol Edit Profil kalau mau --}}
            {{-- <a href="{{ route('user.editprofile') }}" class="btn btn-primary">Edit Profil</a> --}}
        </div>
    </div>
</div>
@endsection
