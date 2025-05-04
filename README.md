# <p align="center" style="margin-bottom: 0px;">PETHEAVEN</p>
## <p align="center" style="margin-top: 0;">TOKO PERALATAN DAN PELAYAN HEWAN</p>

<p align="center">
  <img src="Logo Unsulbar.png" width="300" alt="Deskripsi gambar" />
</p>

### <p align="center">ABDUL</p>
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
|nama\_lengkap|VARCHAR(50)|Nama pengguna|
|email|VARCHAR(50)|Email pengguna|
|password|VARCHAR(255)|Password yang di-hash|
|no\_hp|VARCHAR(20)|Nomor telepon|
|alamat|TEXT|Alamat lengkap pengguna|
|role|ENUM('admin','petugas','user')|Status role pengguna|

**Tabel 2: produk**

|**Nama Field**|**Tipe Data**|**Keterangan**|
| :- | :- | :- |
|id\_produk|INT (PK)|Primary Key, Auto Increment|
|nama\_produk|VARCHAR(50)|Nama produk|
|harga|DECIMAL(12,2)|Harga produk|
|stok|INT|Stok produk yang tersedia|
|deskripsi|TEXT|Deskripsi produk|
|gambar|VARCHAR(255)|Nama file gambar produk|
|id\_kategori|INT (FK)|Foreign Key ke tabel kategori|

**Tabel 3: kategori**

|**Nama Field**|**Tipe Data**|**Keterangan**|
| :- | :- | :- |
|id\_kategori|INT (PK)|Primary Key, Auto Increment|
|nama\_kategori|VARCHAR(50)|Nama kategori produk|

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
|judul\_promo|VARCHAR(100)|Judul promo|
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

