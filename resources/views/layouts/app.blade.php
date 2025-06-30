<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pet Haven</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .navbar-dark {
            background-color: #111;
        }
        .topbar {
            background-color: #111;
            color: white;
            font-size: 14px;
            padding: 5px 0;
        }
        .topbar a {
            color: white;
            margin-right: 15px;
        }
        .nav-link.active {
            font-weight: bold;
            border-bottom: 2px solid red;
        }
        .category-banner {
            position: relative;
            color: white;
        }
        .category-banner img {
            width: 100%;
            height: auto;
        }
        .category-banner .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,0,0,0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
        }
        .product-card {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .product-card img {
            width: 100%;
            height: auto;
        }
        .category-tabs a {
            margin-right: 10px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    @if (auth()->user()->role === 'user')
        
    
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#"><strong>PetHaven</strong>.</a>
            {{-- <form class="d-flex w-50" role="search">
                <select class="form-select me-2" style="width: 150px;">
                    <option>All Categories</option>
                    <option>Makanan</option>
                    <option>Mainan</option>
                </select>
                <input class="form-control me-2" type="search" placeholder="Search here" aria-label="Search">
                <button class="btn btn-danger" type="submit">Search</button>
            </form> --}}
            <div>
                <a href="{{ route('keranjang.index') }}" class="me-3">🛒 Cart</a>
                <a href="{{route('user.myaccount')}}">👤 My Account</a>
                <a href="{{ route('login') }}">Logout</a>
            </div>
        </div>
    </nav>
    
    @endif
    <!-- MENU -->
    @if (auth()->user()->role === 'admin')
        
    <div class="bg-white border-bottom py-2">
        <div class="container">
            <nav class="nav">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('products.index') }}">Product</a>
                <a class="nav-link" href="{{ route('kategori.index') }}">Categories</a>
                <a class="nav-link" href="{{ route('transaksi.index') }}">Transaksi</a>
                <a class="nav-link" href="{{ route('users.index') }}">User</a>
            </nav>
        </div>
    </div>
    @endif

    @if (auth()->user()->role === 'petugas')
    <div class="bg-white border-bottom py-2">
        <div class="container">
            {{-- <nav class="nav">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('products.index') }}">Product</a>
                <a class="nav-link" href="{{ route('kategori.index') }}">Categories</a>
                <a class="nav-link" href="{{ route('promo.index') }}">Discount</a>
                <a class="nav-link" href="{{ route('transaksi.index') }}">Transaksi</a>
                <a class="nav-link" href="{{ route('users.index') }}">User</a>
            </nav> --}}
        </div>
    </div>
    @endif

    @if (auth()->user()->role === 'user')
        
    <div class="bg-white border-bottom py-2">
    <div class="container d-flex align-items-center justify-content-between">
        <nav class="nav">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('user.home') }}">Home</a>
            <a class="nav-link" href="{{ route('user.produk') }}">Product</a>
            <a class="nav-link" href="{{ route('user.kategori') }}">Categories</a>
            <a class="nav-link" href="{{ route('user.transaksi') }}">Transaksi</a>
            
        </nav>

    </div>
</div>

    @endif

    <!-- CONTENT -->
    <div class="container py-4 flex-fill">
        @yield('content')
    </div>

    @include("layouts.footer")
</body>
</html>
