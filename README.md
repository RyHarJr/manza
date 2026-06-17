# 📘 Dokumentasi Aplikasi Web — Admin Manza

> **Sistem Point of Sale (POS) & Manajemen Toko Modern**
> Dibangun dengan Laravel, Bootstrap 5, Custom CSS, dan Highcharts.

---

## 📋 Daftar Isi

1. [Tentang Aplikasi](#-tentang-aplikasi)
2. [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
3. [Instalasi & Konfigurasi](#-instalasi--konfigurasi)
4. [Struktur Folder](#-struktur-folder)
5. [Skema Database (ERD)](#-skema-database-erd)
6. [Fitur Aplikasi](#-fitur-aplikasi)
7. [Routing & Endpoint](#-routing--endpoint)
8. [Autentikasi & Otorisasi](#-autentikasi--otorisasi)
9. [Desain UI / Tema](#-desain-ui--tema)

---

## 🏪 Tentang Aplikasi

**Admin Manza** adalah aplikasi web berbasis Point of Sale (POS) untuk mengelola operasional toko retail. Aplikasi ini mencakup:

- Dashboard analitik dengan grafik interaktif (Highcharts)
- Modul Kasir (Point of Sale) untuk proses transaksi cepat
- Manajemen data master (Produk, Karyawan, Pelanggan, Pemasok)
- Manajemen stok/gudang
- Rekap transaksi dan detail transaksi
- Manajemen pengguna dengan role-based access (Superadmin)

---

## 🛠 Teknologi yang Digunakan

| Komponen     | Teknologi                         |
| ------------ | --------------------------------- |
| **Backend**  | PHP ^8.3, Laravel ^13.8           |
| **Frontend** | Bootstrap 5.3, Custom Admin Theme |
| **Database** | MySQL / SQLite                    |
| **Grafik**   | Highcharts JS                     |
| **Ikon**     | Bootstrap Icons 1.11              |
| **Font**     | Plus Jakarta Sans (Google Fonts)  |
| **Select**   | Select2 (Bootstrap 5 Theme)       |
| **Alert**    | SweetAlert2                       |

---

## ⚙ Instalasi & Konfigurasi

### Prasyarat

- PHP >= 8.2
- Composer
- Node.js & NPM (opsional, untuk asset)
- MySQL atau SQLite

### Langkah Instalasi

```bash
# 1. Clone repository
git clone <repository-url>
cd manza

# 2. Install dependensi PHP
composer install

# 3. Salin file environment
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Konfigurasi database di file .env
#    Sesuaikan DB_CONNECTION, DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 6. Jalankan migrasi database
php artisan migrate

# 7. (Opsional) Jalankan seeder
php artisan db:seed

# 8. Buat symbolic link untuk storage (upload foto produk)
php artisan storage:link

# 9. Jalankan server development
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`.

---

## 📂 Struktur Folder

```
manza/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php         # Login & Logout
│   │   │   ├── DashboardController.php    # Dashboard analitik
│   │   │   ├── KasirController.php        # Point of Sale
│   │   │   ├── ProdukController.php       # CRUD Produk
│   │   │   ├── KaryawanController.php     # CRUD Karyawan
│   │   │   ├── PelangganController.php    # CRUD Pelanggan
│   │   │   ├── PemasokController.php      # CRUD Pemasok
│   │   │   ├── GudangController.php       # CRUD Gudang/Stok
│   │   │   ├── TransaksiController.php    # CRUD Transaksi
│   │   │   ├── DetailTransaksiController.php  # CRUD Detail Transaksi
│   │   │   └── UserController.php         # CRUD User (Superadmin only)
│   │   └── Middleware/
│   │       └── SuperadminMiddleware.php   # Proteksi akses superadmin
│   └── Models/
│       ├── User.php
│       ├── Produk.php
│       ├── Karyawan.php
│       ├── Pelanggan.php
│       ├── Pemasok.php
│       ├── Gudang.php
│       ├── Transaksi.php
│       └── DetailTransaksi.php
├── database/
│   └── migrations/                        # 12 file migrasi
├── resources/
│   └── views/
│       ├── main.blade.php                 # Layout utama (sidebar + navbar)
│       ├── landing.blade.php              # Landing page publik
│       ├── dashboard.blade.php            # Dashboard analitik
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       ├── components/
│       │   └── sidebar.blade.php          # Sidebar navigasi
│       ├── kasir/                          # POS interface
│       ├── produk/                         # index, create, edit
│       ├── karyawan/                       # index, create, edit
│       ├── pelanggan/                      # index, create, edit
│       ├── pemasok/                        # index, create, edit
│       ├── gudang/                         # index, create, edit
│       ├── transaksi/                      # index, create, edit
│       ├── detail-transaksi/               # index, create, edit
│       └── users/                          # index, create, edit (superadmin)
└── routes/
    └── web.php                            # Definisi seluruh route
```

---

## 🗄 Skema Database (ERD)

### Tabel `users`

| Kolom      | Tipe        | Keterangan             |
| ---------- | ----------- | ---------------------- |
| id         | bigint (PK) | Auto increment         |
| name       | varchar     | Nama pengguna          |
| email      | varchar     | Email (unik)           |
| password   | varchar     | Password (hash)        |
| role       | string      | `superadmin` / `admin` |
| timestamps | datetime    | created_at, updated_at |

### Tabel `produks`

| Kolom          | Tipe          | Keterangan           |
| -------------- | ------------- | -------------------- |
| id             | bigint (PK)   | Auto increment       |
| KategoriProduk | varchar(20)   | Kategori produk      |
| NamaProduk     | varchar(100)  | Nama produk          |
| Deskripsi      | varchar(255)  | Deskripsi produk     |
| Harga          | decimal(10,2) | Harga jual           |
| Satuan         | varchar(10)   | Pcs, Kg, Liter, dll  |
| Foto           | varchar       | Path foto (nullable) |
| timestamps     | datetime      |                      |

### Tabel `pemasoks`

| Kolom        | Tipe         | Keterangan     |
| ------------ | ------------ | -------------- |
| id           | bigint (PK)  | Auto increment |
| NamaPemasok  | varchar(100) | Nama pemasok   |
| Alamat       | varchar(255) | Alamat pemasok |
| NoTlp        | varchar(14)  | Nomor telepon  |
| KontakPerson | varchar(50)  | Nama kontak    |
| timestamps   | datetime     |                |

### Tabel `pelanggans`

| Kolom         | Tipe         | Keterangan       |
| ------------- | ------------ | ---------------- |
| id            | bigint (PK)  | Auto increment   |
| NamaPelanggan | varchar(100) | Nama pelanggan   |
| Alamat        | varchar(255) | Alamat pelanggan |
| NoTlp         | varchar(14)  | Nomor telepon    |
| TglDaftar     | date         | Tanggal daftar   |
| timestamps    | datetime     |                  |

### Tabel `karyawans`

| Kolom        | Tipe         | Keterangan     |
| ------------ | ------------ | -------------- |
| id           | bigint (PK)  | Auto increment |
| NamaKaryawan | varchar(100) | Nama karyawan  |
| Jabatan      | varchar(50)  | Jabatan        |
| NoTlp        | varchar(14)  | Nomor telepon  |
| TglMasuk     | date         | Tanggal masuk  |
| timestamps   | datetime     |                |

### Tabel `gudangs`

| Kolom      | Tipe          | Keterangan              |
| ---------- | ------------- | ----------------------- |
| id         | bigint (PK)   | Auto increment          |
| pemasok_id | bigint (FK)   | → pemasoks.id (CASCADE) |
| produk_id  | bigint (FK)   | → produks.id (CASCADE)  |
| Jumlah     | integer       | Jumlah stok masuk       |
| Harga      | decimal(10,2) | Harga beli per unit     |
| timestamps | datetime      |                         |

### Tabel `transaksis`

| Kolom            | Tipe          | Keterangan                          |
| ---------------- | ------------- | ----------------------------------- |
| id               | bigint (PK)   | Auto increment                      |
| karyawan_id      | bigint (FK)   | → karyawans.id (CASCADE)            |
| pelanggan_id     | bigint (FK)   | → pelanggans.id (nullable, CASCADE) |
| TglTransaksi     | date          | Tanggal transaksi                   |
| TotalHarga       | decimal(10,2) | Total harga transaksi               |
| MetodePembayaran | varchar(10)   | Cash, Transfer, QRIS, Debit         |
| StatusPembayaran | enum          | sukses, proses, gagal               |
| timestamps       | datetime      |                                     |

### Tabel `detail_transaksis`

| Kolom        | Tipe          | Keterangan                    |
| ------------ | ------------- | ----------------------------- |
| id           | bigint (PK)   | Auto increment                |
| transaksi_id | bigint (FK)   | → transaksis.id (CASCADE)     |
| produk_id    | bigint (FK)   | → produks.id (CASCADE)        |
| jumlah       | integer       | Jumlah item dibeli            |
| harga_satuan | decimal(10,2) | Harga per unit saat transaksi |
| subtotal     | decimal(10,2) | jumlah × harga_satuan         |
| timestamps   | datetime      |                               |

### Relasi Antar Tabel

```
pemasoks ──┐
           ├──→ gudangs ←── produks
           │
karyawans ─┤
           ├──→ transaksis ──→ detail_transaksis ←── produks
           │
pelanggans ┘

users (standalone, role-based auth)
```

---

## 🚀 Fitur Aplikasi

### 1. 📊 Dashboard Analitik

- **Kartu Ringkasan**: Total Modal dan Keuntungan Bersih
- **Grafik Tren Harian**: Area chart transaksi & revenue (14 hari terakhir)
- **Produk Paling Laris**: Bar chart horizontal (Top 5)
- **Metode Pembayaran Terbanyak**: Donut chart (Cash, Transfer, QRIS, Debit)
- **Produk per Kategori**: Pie chart distribusi kategori
- **Loyalty Pelanggan**: Top 5 pelanggan berdasarkan total belanja
- **Top Kasir**: Top 5 karyawan berdasarkan jumlah transaksi
- **Stok Terendah**: Daftar produk dengan stok paling sedikit

### 2. 🛒 Point of Sale (Kasir)

- Tampilan grid produk dengan foto, harga, dan stok real-time
- Pencarian produk secara live (by nama / kategori)
- Keranjang belanja interaktif dengan penambahan/pengurangan qty
- Validasi stok otomatis (tidak bisa melebihi stok tersedia)
- Pemilihan pelanggan (opsional) dan karyawan kasir
- Pilihan metode pembayaran (Cash, Transfer, QRIS, Debit)
- Konfirmasi pembayaran via SweetAlert2
- Pengurangan stok gudang otomatis setelah transaksi

### 3. 📦 Manajemen Produk

- CRUD lengkap (Create, Read, Update, Delete)
- Upload foto produk
- Kategori: Makanan, Minuman, Snack, Bumbu, Sembako, Peralatan, Lainnya
- Satuan: Pcs, Kg, Liter, Dus, Pack, Botol, Sachet, Box

### 4. 👥 Manajemen Data Master

- **Karyawan**: Nama, Jabatan, No. Telp, Tanggal Masuk
- **Pelanggan**: Nama, Alamat, No. Telp, Tanggal Daftar
- **Pemasok**: Nama, Alamat, No. Telp, Kontak Person

### 5. 🏬 Manajemen Gudang/Stok

- Pencatatan stok masuk dari pemasok
- Relasi ke produk dan pemasok
- Harga beli per unit untuk penghitungan modal

### 6. 🧾 Transaksi & Detail Transaksi

- Riwayat semua transaksi dengan status pembayaran
- Detail item per transaksi (produk, jumlah, harga satuan, subtotal)
- CRUD manual untuk koreksi data

### 7. 👤 Manajemen User (Superadmin Only)

- CRUD pengguna sistem
- Pembagian role: `superadmin` dan `admin`
- Hanya superadmin yang dapat mengakses menu ini

---

## 🔀 Routing & Endpoint

### Route Publik (Tanpa Login)

| Method | URI      | Aksi          |
| ------ | -------- | ------------- |
| GET    | `/`      | Landing page  |
| GET    | `/login` | Halaman login |
| POST   | `/login` | Proses login  |

### Route Terproteksi (Memerlukan Login)

| Method | URI          | Controller          | Aksi               |
| ------ | ------------ | ------------------- | ------------------ |
| POST   | `/logout`    | AuthController      | Proses logout      |
| GET    | `/dashboard` | DashboardController | Dashboard analitik |
| GET    | `/kasir`     | KasirController     | Halaman POS        |
| POST   | `/kasir`     | KasirController     | Proses transaksi   |

### Resource Routes (CRUD Penuh — `index`, `create`, `store`, `edit`, `update`, `destroy`)

| URI Prefix          | Controller                |
| ------------------- | ------------------------- |
| `/pemasok`          | PemasokController         |
| `/produk`           | ProdukController          |
| `/pelanggan`        | PelangganController       |
| `/karyawan`         | KaryawanController        |
| `/gudang`           | GudangController          |
| `/transaksi`        | TransaksiController       |
| `/detail-transaksi` | DetailTransaksiController |

### Route Superadmin Only

| URI Prefix | Controller     | Middleware           |
| ---------- | -------------- | -------------------- |
| `/users`   | UserController | `auth`, `superadmin` |

---

## 🔐 Autentikasi & Otorisasi

### Mekanisme Login

- Menggunakan `Auth::attempt()` bawaan Laravel
- Session-based authentication
- Middleware `auth` melindungi seluruh halaman CRUD
- Middleware `guest` mencegah user yang sudah login mengakses halaman login
- **Fitur Register telah dinonaktifkan** — pendaftaran user baru hanya bisa dilakukan oleh Superadmin melalui menu Manajemen User

### Role-Based Access

| Role         | Akses                                           |
| ------------ | ----------------------------------------------- |
| `admin`      | Dashboard, Kasir, semua CRUD data master        |
| `superadmin` | Semua akses admin + Manajemen User (CRUD users) |

### Middleware Kustom

- **`SuperadminMiddleware`**: Memeriksa `auth()->user()->role === 'superadmin'`. Jika bukan, redirect ke dashboard dengan pesan error.

---

## 🎨 Desain UI / Tema

### Admin Light Theme

Aplikasi menggunakan tema terang (light theme) yang bersih dan profesional:

| Elemen           | Warna / Style                           |
| ---------------- | --------------------------------------- |
| Background Body  | `#f8f9fa` (abu-abu sangat muda)         |
| Card / Panel     | `#ffffff` (putih murni)                 |
| Primary Accent   | `#3b82f6` (biru terang)                 |
| Primary Hover    | `#2563eb` (biru gelap)                  |
| Teks Utama       | `#1f2937` (charcoal gelap)              |
| Teks Sekunder    | `#6b7280` (abu-abu medium)              |
| Border           | `#e5e7eb` (abu-abu tipis)               |
| Sidebar          | Putih dengan indikator biru transparan  |
| Tombol Utama     | Solid `#3b82f6` dengan shadow lembut    |
| Tabel Header     | `#f9fafb` dengan teks uppercase abu-abu |
| Form Input Focus | Ring biru `rgba(59, 130, 246, 0.15)`    |

### Library CSS & JS

- **Custom CSS** — Layout sidebar dan admin panel
- **Bootstrap 5.3** — Grid, form, dan komponen UI
- **Highcharts** — Grafik dashboard (areaspline, bar, pie, donut)
- **Select2** — Enhanced dropdown select
- **SweetAlert2** — Konfirmasi dan notifikasi
- **Plus Jakarta Sans** — Font utama aplikasi

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan akademik — **Tugas Mata Kuliah Pemrograman Berbasis Web, Semester 4**.

---

> _Dokumentasi ini di-generate pada 12 Juni 2026._
