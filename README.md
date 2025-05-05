<<<<<<< HEAD
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
# <p align="center" style="margin-bottom: 0px;">PETHEAVEN</p>
## <p align="center" style="margin-top: 0;">TOKO PERALATAN HEWAN</p>

<p align="center">
  <img src="LOGO-UNSULBAR.png" width="300" alt="Deskripsi gambar" />
</p>

### <p align="center">ABDUL RAJAB</p>
### <p align="center">D0223518</p></br>
### <p align="center">Framework Web Based</p>
### <p align="center">2025</p>


**Role dan Fitur**

|**Role**|**Fitur-Fitur**|
| :- | :- |
|Admin|- Mengelola data produk <br>- Mengelola kategori <br>- Melihat daftar transaksi <br>- Mengelola data user <br>- Mengelola promo/iklan|
|Petugas|- Mengelola stok barang <br>- Memproses pesanan <br>- Mengatur status transaksi <br>- Melihat daftar transaksi|
|User (Pelanggan)|- Registrasi akun <br>- Login/logout <br>- Melihat produk berdasarkan kategori <br>- Menambah produk ke keranjang <br>- Melakukan checkout <br>- Melihat status pesanan <br>- Menerima notifikasi promo|

**Tabel-tabel database beserta field dan tipe datanya**

**Tabel 1: users**

|**Nama Field**|**Tipe Data**|**Keterangan**|
| :- | :- | :- |
|id\_user|INT (PK)|Primary Key, Auto Increment|
|nama\_lengkap|STRING|Nama pengguna|
|email|STRING|Email pengguna|
|password|STRING|Password yang di-hash|
|no\_hp|STRING|Nomor telepon|
|alamat|TEXT|Alamat lengkap pengguna|
|role|ENUM('admin','petugas','user')|Status role pengguna|

**Tabel 2: produk**

|**Nama Field**|**Tipe Data**|**Keterangan**|
| :- | :- | :- |
|id\_produk|INT (PK)|Primary Key, Auto Increment|
|nama\_produk|STRING|Nama produk|
|harga|DECIMAL(12,2)|Harga produk|
|stok|INT|Stok produk yang tersedia|
|deskripsi|TEXT|Deskripsi produk|
|gambar|STRING|Nama file gambar produk|
|id\_kategori|INT (FK)|Foreign Key ke tabel kategori|

**Tabel 3: kategori**

|**Nama Field**|**Tipe Data**|**Keterangan**|
| :- | :- | :- |
|id\_kategori|INT (PK)|Primary Key, Auto Increment|
|nama\_kategori|STRING|Nama kategori produk|

**Tabel 4: keranjang**

|**Nama Field**|**Tipe Data**|**Keterangan**|
| :- | :- | :- |
|id\_keranjang|INT (PK)|Primary Key, Auto Increment|
|id\_user|INT (FK)|Foreign Key ke tabel users|
|id\_produk|INT (FK)|Foreign Key ke tabel produk|
|jumlah|INT|Jumlah item yang dibeli|



**Tabel 5: transaksi**

|**Nama Field**|**Tipe Data**|**Keterangan**|
| :- | :- | :- |
|id\_transaksi|INT (PK)|Primary Key, Auto Increment|
|id\_user|INT (FK)|Foreign Key ke tabel users → id\_user (pelanggan)|
|id\_petugas|INT (FK) (nullable)|Foreign Key ke tabel users → id\_user (petugas). Bisa NULL kalau belum diproses|
|tanggal|DATETIME|Tanggal saat transaksi dilakukan|
|total\_harga|DECIMAL(12,2)|Total harga dari transaksi tersebut|
|status|ENUM('Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan')|Status transaksi|
|metode\_pembayaran|ENUM('Transfer','COD','QRIS')|Metode pembayaran yang dipilih oleh pelanggan|
|alamat\_pengiriman|TEXT|Alamat pengiriman (ambil dari user saat transaksi, karena bisa beda tiap pesanan)|
|catatan|TEXT (nullable)|Catatan tambahan dari pelanggan (opsional)|






**Tabel 6: promo**

|**Nama Field**|**Tipe Data**|**Keterangan**|
| :- | :- | :- |
|id\_promo|INT (PK)|Primary Key, Auto Increment|
|judul\_promo|STRING|Judul promo|
|deskripsi|TEXT|Deskripsi promo|
|tanggal\_mulai|DATE|Tanggal mulai promo|
|tanggal\_selesai|DATE|Tanggal selesai promo|

**Jenis relasi dan tabel berelasi**

|**Tabel 1**|**Tabel 2**|**Jenis Relasi**|
| :- | :- | :- |
|users (user)|keranjang|**One to Many** (1 user bisa punya banyak keranjang)|
|users (user)|transaksi|**One to Many** (1 user bisa melakukan banyak transaksi)|
|users (petugas)|transaksi|**One to Many** (1 petugas memproses banyak transaksi — opsional, bisa tambah id\_petugas di tabel transaksi kalau perlu)|
|kategori|produk|**One to Many** (1 kategori bisa punya banyak produk)|
|produk|keranjang|**One to Many** (1 produk bisa masuk ke banyak keranjang)|
|produk|transaksi|**Many to Many** (Karena 1 transaksi bisa berisi banyak produk, dan 1 produk bisa masuk ke banyak transaksi — bisa menggunakan tabel pivot detail\_transaksi)|

>>>>>>> fcac4ae26f4dfa2abd34e3f2845b78f96eade804
