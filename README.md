# Sistem Penjualan CI3

Aplikasi Sistem Sales Order berbasis web menggunakan CodeIgniter 3.

## Fitur Aplikasi

* Login dengan hak akses Admin, Sales, dan Manager.
* Admin dapat mengelola data produk, pelanggan, dan seluruh data pesanan.
* Sales dapat membuat dan mengelola pesanan miliknya sendiri.
* Manager dapat melihat laporan penjualan.
* Manajemen data produk (kode produk, nama produk, harga, dan stok).
* Manajemen data pelanggan (nama, alamat, dan nomor telepon).
* Manajemen data sales.
* Pembuatan sales order beserta detail produk yang dipesan.
* Perhitungan total harga order secara otomatis.
* Pengelolaan status order (draft, dikirim, selesai, dibatalkan).
* Laporan penjualan per periode, per sales, dan per produk.
* Export laporan ke format PDF.

## Requirements
- XAMPP
- CodeIgniter 3

## Cara Menjalankan

1. Clone atau download project ini.
2. Simpan folder project ke dalam folder `htdocs`.
3. Import file `db_uas.sql` ke phpMyAdmin.
4. Buat database dengan nama `db_uas`.
5. Sesuaikan konfigurasi database pada file:

   `application/config/database.php`

6. Jalankan Apache dan MySQL melalui XAMPP.
7. Buka aplikasi melalui browser:

   `http://localhost/CI3_UAS/index.php/auth`

## Akun Login

### Admin
- Username: `admin`
- Password: `123`

### Manager
- Username: `manager`
- Password: `123`

### Sales
- Username: `sales1`
- Password: `123`

- Username: `sales2`
- Password: `123`

- Username: `sales3`
- Password: `123`

- Username: `sales4`
- Password: `123`

- Username: `sales5`
- Password: `123`

## Database

File database terdapat pada:

`db_uas.sql`