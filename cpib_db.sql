-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2022 pada 20.13
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpib_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `kd_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` enum('Administrator','Inspektur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `kd_admin`, `nama_admin`, `jenis_kelamin`, `alamat`, `jabatan`) VALUES
(1, 'ADM-001', 'Jeri Maulana', 'Laki-laki', 'Cirebon', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL,
  `kd_jenis_produk` varchar(20) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `kd_jenis_produk`, `jenis_produk`, `deskripsi`) VALUES
(1, 'JPK-001', 'Ikan Asin', 'asin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` enum('Tertunda','Perlu Revisi','Diterima') NOT NULL,
  `ktp` text NOT NULL,
  `npwp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `kd_pengajuan`, `kd_supplier`, `tgl_pengajuan`, `status`, `ktp`, `npwp`) VALUES
(5, 'AJU-0001', 'SPL-001', '2022-11-09', 'Tertunda', 'SERTIFIKAT_-_FATEH_NUR_MUHAMMAD.pdf', 'SURAT_PENGALAMAN_KERJA_-_FATEH_NUR_MUHAMMAD.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan_ajuan`
--

CREATE TABLE `perbaikan_ajuan` (
  `id` int(11) NOT NULL,
  `kd_perbaikan_ajuan` varchar(20) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `tgl_perbaikan` date NOT NULL,
  `status` enum('Lolos','Tidak Lolos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `nama_miniplant` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kd_jenis_produk` varchar(20) NOT NULL,
  `ktp` text NOT NULL,
  `npwp` text NOT NULL,
  `nib` text NOT NULL,
  `siup` text NOT NULL,
  `akta_usaha` text NOT NULL,
  `imb` text NOT NULL,
  `layout` text NOT NULL,
  `panduan_mutu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `kd_supplier`, `nama_supplier`, `nama_miniplant`, `alamat`, `kd_jenis_produk`, `ktp`, `npwp`, `nib`, `siup`, `akta_usaha`, `imb`, `layout`, `panduan_mutu`) VALUES
(1, 'SPL-001', 'Jeri adalah supplier', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` char(20) NOT NULL,
  `phone` char(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` text NOT NULL,
  `kd_admin` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `phone`, `password`, `avatar`, `kd_admin`, `kd_supplier`, `is_active`) VALUES
(1, 'Jeri adalah supplier', 'jersup@gmail.com', 'jersup', '123', 'fcff8aed60e0bedf984ea8e872ade9c6', '', '', 'SPL-001', 0),
(2, 'Jeri Maulana', 'email@email.com', 'jeri1', '0822', '827ccb0eea8a706c4c34a16891f84e7b', 'cropped-logo-PDIP.jpg', 'ADM-001', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_pengajuan` (`kd_pengajuan`),
  ADD KEY `kd_supplier` (`kd_supplier`);

--
-- Indeks untuk tabel `perbaikan_ajuan`
--
ALTER TABLE `perbaikan_ajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_supplier` (`kd_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `perbaikan_ajuan`
--
ALTER TABLE `perbaikan_ajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
