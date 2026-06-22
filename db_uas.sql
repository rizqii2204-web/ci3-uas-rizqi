-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2026 pada 00.57
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('draft','dikirim','selesai','batal') DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_pelanggan`, `id_sales`, `tanggal`, `status`, `total`, `user_id`) VALUES
(1, 1, 1, '2025-01-01', 'selesai', 10600000, 1),
(2, 10, 1, '2025-01-02', 'draft', 600000, 1),
(3, 3, 1, '2025-01-03', 'selesai', 500000, 1),
(4, 4, 1, '2025-01-04', 'draft', 2000000, 1),
(5, 5, 1, '2025-01-05', 'dikirim', 6600000, 1),
(6, 6, 2, '2025-01-06', 'selesai', 80000, 2),
(7, 7, 2, '2025-01-07', 'dikirim', 600000, 2),
(8, 8, 2, '2025-01-08', 'selesai', 1800000, 2),
(9, 9, 2, '2025-01-09', 'draft', 250000, 2),
(10, 10, 2, '2025-01-10', 'selesai', 10300000, 2),
(11, 11, 3, '2025-01-11', 'dikirim', 400000, 3),
(12, 12, 3, '2025-01-12', 'draft', 50000, 3),
(13, 13, 3, '2025-01-13', 'selesai', 200000, 3),
(14, 14, 3, '2025-01-14', 'dikirim', 3000000, 3),
(15, 15, 3, '2025-01-15', 'draft', 7500000, 3),
(16, 5, 4, '2026-06-06', 'selesai', 30600000, 4),
(17, 10, 4, '2026-06-10', 'draft', 20400000, 4),
(18, 18, 4, '2026-06-20', 'dikirim', 25500000, 4),
(19, 16, 4, '2026-06-20', 'dikirim', 40800000, 4),
(20, 8, 4, '2026-06-22', 'selesai', 500000, 4),
(21, 2, 5, '2026-02-21', 'dikirim', 2400000, 5),
(22, 2, 5, '2026-06-22', 'draft', 8000000, 5),
(23, 5, 5, '2026-07-01', 'draft', 11100000, 5),
(24, 7, 5, '2026-06-21', 'dikirim', 1000000, 5),
(25, 3, 5, '2026-07-01', 'selesai', 7200000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_backup`
--

CREATE TABLE `orders_backup` (
  `id` int(11) NOT NULL DEFAULT 0,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('draft','dikirim','selesai','batal') DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders_backup`
--

INSERT INTO `orders_backup` (`id`, `id_pelanggan`, `id_sales`, `tanggal`, `status`, `total`, `user_id`) VALUES
(1, 1, 1, '2025-01-01', 'selesai', 10600000, 2),
(2, 10, 1, '2025-01-02', 'draft', 600000, 2),
(3, 3, 1, '2025-01-03', 'selesai', 500000, 2),
(4, 4, 3, '2025-01-04', 'draft', 2000000, 2),
(5, 5, 2, '2025-01-05', 'dikirim', 1800000, 2),
(6, 6, 1, '2025-01-06', 'draft', 80000, 2),
(7, 7, 3, '2025-01-07', 'dikirim', 600000, 2),
(8, 8, 2, '2025-01-08', 'selesai', 1800000, 2),
(9, 9, 1, '2025-01-09', 'draft', 250000, 2),
(10, 10, 3, '2025-01-10', 'selesai', 300000, 2),
(11, 11, 2, '2025-01-11', 'dikirim', 400000, 2),
(12, 12, 1, '2025-01-12', 'draft', 50000, 2),
(13, 13, 3, '2025-01-13', 'selesai', 200000, 2),
(14, 14, 2, '2025-01-14', 'dikirim', 3000000, 2),
(15, 15, 1, '2025-01-15', 'draft', 7500000, 2),
(16, 5, 2, '2026-06-06', 'selesai', 30600000, 2),
(17, 10, 1, '2026-06-10', 'draft', 20400000, 2),
(18, 18, 2, '2026-06-20', 'dikirim', 25500000, 2),
(19, 16, 2, '2026-06-20', 'dikirim', 40800000, 2),
(20, 8, 2, '2026-06-22', 'selesai', 500000, 2),
(21, 2, 2, '2026-02-21', 'dikirim', 0, 2),
(22, 2, 2, '2026-06-22', 'draft', 0, 2),
(23, 5, 3, '2026-07-01', 'draft', 0, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_produk`, `jumlah`, `harga`, `subtotal`) VALUES
(2, 2, 3, 4, 150000, 600000),
(3, 3, 4, 1, 500000, 500000),
(4, 4, 5, 1, 2000000, 2000000),
(5, 5, 6, 2, 1800000, 3600000),
(6, 6, 7, 3, 80000, 240000),
(7, 7, 8, 1, 600000, 600000),
(8, 8, 9, 2, 900000, 1800000),
(9, 9, 10, 1, 250000, 250000),
(10, 10, 11, 2, 300000, 600000),
(11, 11, 12, 1, 400000, 400000),
(12, 12, 13, 4, 50000, 200000),
(13, 13, 14, 2, 200000, 400000),
(14, 14, 15, 1, 3000000, 3000000),
(15, 15, 2, 1, 7500000, 7500000),
(19, 1, 1, 2, 5100000, 10200000),
(20, 1, 17, 8, 50000, 400000),
(21, 19, 1, 8, 5100000, 40800000),
(22, 18, 1, 5, 5100000, 25500000),
(24, 17, 1, 4, 5100000, 20400000),
(26, 16, 1, 6, 5100000, 30600000),
(27, 20, 10, 2, 250000, 500000),
(29, 5, 15, 1, 3000000, 3000000),
(30, 21, 12, 6, 400000, 2400000),
(31, 22, 4, 16, 500000, 8000000),
(32, 23, 6, 2, 1800000, 3600000),
(33, 23, 2, 1, 7500000, 7500000),
(34, 24, 10, 4, 250000, 1000000),
(35, 25, 15, 2, 3000000, 6000000),
(36, 10, 6, 1, 1800000, 1800000),
(37, 10, 2, 1, 7500000, 7500000),
(38, 10, 12, 1, 400000, 400000),
(39, 25, 11, 4, 300000, 1200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `telepon`) VALUES
(1, 'Andi', 'Jakarta', '081234567007'),
(2, 'Budi', 'Bandung', '081234567002'),
(3, 'Citra', 'Surabaya', '081234567003'),
(4, 'Dewi', 'Yogyakarta', '081234567004'),
(5, 'Eko', 'Semarang', '081234567005'),
(6, 'Fajar', 'Malang', '081234567006'),
(7, 'Gina', 'Medan', '081234567007'),
(8, 'Hadi', 'Bekasi', '081234567008'),
(9, 'Intan', 'Depok', '081234567009'),
(10, 'Joko', 'Tangerang', '081234567010'),
(11, 'Kiki', 'Bogor', '081234567011'),
(12, 'Lina', 'Palembang', '081234567012'),
(13, 'Mira', 'Batam', '081234567013'),
(14, 'Nina', 'Bali', '081234567014'),
(15, 'Oki', 'Makassar', '081234567015'),
(16, 'Laras', 'Bandung', '087887109932'),
(18, 'Ucup', 'Yogyakarta', '081285498663');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(50) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kode_produk`, `nama_produk`, `harga`, `stok`) VALUES
(1, 'P001', 'Laptop Lenovo', 5100000, 9),
(2, 'P002', 'Laptop Asus', 7500000, 8),
(3, 'P003', 'Mouse Logitech', 150000, 50),
(4, 'P004', 'Keyboard Mechanical', 500000, 30),
(5, 'P005', 'Monitor LG 24 inch', 2000000, 12),
(6, 'P006', 'Printer Epson', 1800000, 7),
(7, 'P007', 'Flashdisk 32GB', 80000, 100),
(8, 'P008', 'Harddisk 1TB', 600000, 20),
(9, 'P009', 'SSD 512GB', 900000, 15),
(10, 'P010', 'Webcam HD', 250000, 25),
(11, 'P011', 'Speaker Bluetooth', 300000, 18),
(12, 'P012', 'Router Wifi', 400000, 10),
(13, 'P013', 'Kabel HDMI', 50000, 60),
(14, 'P014', 'Powerbank 10000mAh', 200000, 40),
(15, 'P015', 'Smartphone Samsung', 3000000, 9),
(17, 'P016', 'Charger Second', 50000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id`, `nama`, `telepon`, `alamat`) VALUES
(1, 'Budi Santoso', '081234567890', 'Jakarta'),
(2, 'Siti Aminah', '082345678901', 'Bandung'),
(3, 'Andi Pratama', '083456789012', 'Surabaya'),
(4, 'Dewi Lestari', '084567890123', 'Yogyakarta'),
(5, 'Rizky Maulana', '085678901234', 'Medan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','sales','manager') DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `last_login`) VALUES
(1, 'sales1', '123', 'sales', '2026-06-21 22:21:12'),
(2, 'sales2', '123', 'sales', '2026-06-21 22:29:03'),
(3, 'sales3', '123', 'sales', NULL),
(4, 'sales4', '123', 'sales', NULL),
(5, 'sales5', '123', 'sales', '2026-06-22 23:45:26'),
(6, 'admin', '123', 'admin', '2026-06-22 23:30:51'),
(7, 'manager', '123', 'manager', '2026-06-22 23:21:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_backup`
--

CREATE TABLE `users_backup` (
  `id` int(11) NOT NULL DEFAULT 0,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','sales','manager') DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_backup`
--

INSERT INTO `users_backup` (`id`, `username`, `password`, `role`, `last_login`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin', '2026-06-21 19:34:09'),
(2, 'manager', '202cb962ac59075b964b07152d234b70', 'manager', '2026-06-21 18:18:31'),
(3, 'sales1', '202cb962ac59075b964b07152d234b70', 'sales', '2026-06-21 20:12:47'),
(4, 'sales2', '202cb962ac59075b964b07152d234b70', 'sales', '2026-06-21 18:46:31'),
(5, 'sales3', '202cb962ac59075b964b07152d234b70', 'sales', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
