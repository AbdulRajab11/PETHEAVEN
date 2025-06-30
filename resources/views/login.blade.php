@extends('layouts.master')

@section('content')
<div class="text-center mb-4">
    <h4 class="fw-bold">Masuk</h4>
    <p>Silakan masuk untuk melanjutkan</p>
</div>

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required autofocus>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Masuk</button>
</form>

<div class="text-center mt-3">
    Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
</div>
@endsection
