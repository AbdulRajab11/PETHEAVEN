# <p align="center" style="margin-bottom: 0px;">SIPAGI</p>
## <p align="center" style="margin-top: 0;">SISTEM PENJADWALAN GUDANG GABAH TERINTEGRASI</p>

<p align="center">
  <img src="Logo Unsulbar.png" width="300" alt="Deskripsi gambar" />
</p>

### <p align="center">AHMAD KHANIF IZZAH ARIFIN</p>
### <p align="center">D0223511</p></br>
### <p align="center">Framework Web Based</p>
### <p align="center">2025</p>

**Role dan Fitur**  

**Role** | **Fitur-Fitur**  
---|---
Admin | - Mengelola data produk<br>- Mengelola kategori<br>- Melihat daftar transaksi<br>- Mengelola data user<br>- Mengelola promo/iklan
Petugas | - Mengelola stok barang<br>- Memproses pesanan<br>- Mengatur status transaksi<br>- Melihat daftar transaksi
User (Pelanggan) | - Registrasi akun<br>- Login/logout<br>- Melihat produk berdasarkan kategori<br>- Menambah produk ke keranjang<br>- Melakukan checkout<br>- Melihat status pesanan<br>- Menerima notifikasi promo

**Tabel-tabel database beserta field dan tipe datanya**  

**Tabel 1: users**  
| Nama Field | Tipe Data | Keterangan |
|------------|----------|------------|
| id_user | INT (PK) | Primary Key, Auto Increment |
| nama_lengkap | VARCHAR(50) | Nama pengguna |
| email | VARCHAR(50) | Email pengguna |
| password | VARCHAR(255) | Password yang di-hash |
| no_hp | VARCHAR(20) | Nomor telepon |
| alamat | TEXT | Alamat lengkap pengguna |
| role | ENUM('admin','petugas','user') | Status role pengguna |

**Tabel 2: produk**  
| Nama Field | Tipe Data | Keterangan |
|------------|----------|------------|
| id_produk | INT (PK) | Primary Key, Auto Increment |
| nama_produk | VARCHAR(50) | Nama produk |
| harga | DECIMAL(12,2) | Harga produk |
| stok | INT | Stok produk yang tersedia |
| deskripsi | TEXT | Deskripsi produk |
| gambar | VARCHAR(255) | Nama file gambar produk |
| id_kategori | INT (FK) | Foreign Key ke tabel kategori |

**Tabel 3: kategori**  
| Nama Field | Tipe Data | Keterangan |
|------------|----------|------------|
| id_kategori | INT (PK) | Primary Key, Auto Increment |
| nama_kategori | VARCHAR(50) | Nama kategori produk |

**Tabel 4: keranjang**  
| Nama Field | Tipe Data | Keterangan |
|------------|----------|------------|
| id_keranjang | INT (PK) | Primary Key, Auto Increment |
| id_user | INT (FK) | Foreign Key ke tabel users |
| id_produk | INT (FK) | Foreign Key ke tabel produk |
| jumlah | INT | Jumlah item yang dibeli |

**Tabel 5: transaksi**  
| Nama Field | Tipe Data | Keterangan |
|------------|----------|------------|
| id_transaksi | INT (PK) | Primary Key, Auto Increment |
| id_user | INT (FK) | Foreign Key ke tabel users → id_user (pelanggan) |
| id_petugas | INT (FK) (nullable) | Foreign Key ke tabel users → id_user (petugas). Bisa NULL kalau belum diproses |
| tanggal | DATETIME | Tanggal saat transaksi dilakukan |
| total_harga | DECIMAL(12,2) | Total harga dari transaksi tersebut |
| status | ENUM('Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan') | Status transaksi |
| metode_pembayaran | ENUM('Transfer','COD','QRIS') | Metode pembayaran yang dipilih oleh pelanggan |
| alamat_pengiriman | TEXT | Alamat pengiriman (ambil dari user saat transaksi, karena bisa beda tiap pesanan) |
| catatan | TEXT (nullable) | Catatan tambahan dari pelanggan (opsional) |

**Tabel 6: promo**  
| Nama Field | Tipe Data | Keterangan |
|------------|----------|------------|
| id_promo | INT (PK) | Primary Key, Auto Increment |
| judul_promo | VARCHAR(100) | Judul promo |
| deskripsi | TEXT | Deskripsi promo |
| tanggal_mulai | DATE | Tanggal mulai promo |
| tanggal_selesai | DATE | Tanggal selesai promo |

**Jenis relasi dan tabel berelasi**  
```plaintext
Tabel 1          Tabel 2                Jenis Relasi
users (user)     keranjang              One to Many
users (user)     transaksi              One to Many
users (petugas)  transaksi              One to Many
kategori         produk                  One to Many
produk           keranjang              One to Many
produk           transaksi              Many to Many (via detail_transaksi)
```
