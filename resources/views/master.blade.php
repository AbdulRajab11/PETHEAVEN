<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pet Haven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSS (gunakan Bootstrap atau Tailwind sesuai pilihan kamu) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Tambahkan file CSS tambahan di sini jika ada --}}
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F9F9F9;
        }
        .nav-item i {
            font-size: 18px;
        }
        .bottom-nav {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: #fff;
            border-top: 1px solid #ddd;
        }
        .bottom-nav .nav-link {
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>

    {{-- Header --}}
    <nav class="navbar bg-white shadow-sm px-3 py-2 mb-3">
        <div class="container-fluid justify-content-between align-items-center d-flex">
            <div>
                <strong>Albert Frank</strong><br>
                <small class="text-muted">Indonesia</small>
            </div>
            <span class="badge bg-secondary">09.00</span>
        </div>
    </nav>

    {{-- Konten dinamis --}}
    <div class="container mb-5">
        @yield('content')
    </div>

    {{-- Bottom Navigation --}}
    <div class="bottom-nav d-flex justify-content-around py-2">
        <a href="{{ route('home') }}" class="nav-link text-center">
            <i class="bi bi-house"></i><br>Home
        </a>
        <a href="{{ route('products.index') }}" class="nav-link text-center">
            <i class="bi bi-bag"></i><br>Shop
        </a>
        <a href="{{ route('profile') }}" class="nav-link text-center">
            <i class="bi bi-person"></i><br>Profile
        </a>
        <a href="{{ route('settings') }}" class="nav-link text-center">
            <i class="bi bi-gear"></i><br>Setting
        </a>
    </div>

    {{-- JS (icon & Bootstrap) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
