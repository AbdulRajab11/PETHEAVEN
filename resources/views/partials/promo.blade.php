@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Promo</h2>
    <a href="{{ route('promo.create') }}" class="btn btn-primary mb-3">Tambah Promo</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul Promo</th>
                <th>Deskripsi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($promos as $promo)
                <tr>
                    <td>{{ $promo->judul_promo }}</td>
                    <td>{{ $promo->deskripsi }}</td>
                    <td>{{ \Carbon\Carbon::parse($promo->tanggal_mulai)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($promo->tanggal_selesai)->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('promo.edit', $promo) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('promo.destroy', $promo) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus promo ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
