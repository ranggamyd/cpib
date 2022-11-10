-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 09:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `kd_admin`, `nama_admin`, `jenis_kelamin`, `alamat`, `jabatan`) VALUES
(1, 'ADM-001', 'Rangga', 'Laki-laki', 'rangga', 'Administrator'),
(2, 'ADM-002', 'Jeri', 'Laki-laki', '', 'Administrator'),
(3, 'ADM-003', 'Wiky', 'Laki-laki', '', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `checklist_kelayakan_supplier`
--

CREATE TABLE `checklist_kelayakan_supplier` (
  `id` int(11) NOT NULL,
  `nama_isian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist_kelayakan_supplier`
--

INSERT INTO `checklist_kelayakan_supplier` (`id`, `nama_isian`) VALUES
(1, 'KEAMANAN AIR DAN ES'),
(2, 'PERMUKAAN YANG KONTAK LANGSUNG DENGAN PRODUK'),
(3, 'PENCEGAHAN KONTAMINASI SILANG'),
(4, 'FASILITAS SANITASI'),
(5, 'PELABELAN, PENYIMPANAN DAN PENGGUNAAN BAHAN KIMIA '),
(6, 'KESEHATAN DAN KEBERSIHAN KARYAWAN'),
(7, 'PENGENDALIAN PEST (PEST CONTROL)'),
(8, 'PENGENDALIAN PROSES'),
(9, 'PENGEMASAN DAN PELABELAN'),
(10, 'PENYIMPANAN'),
(11, 'DISTRIBUSI / TRANSPORTASI'),
(12, 'MONITORING'),
(13, 'REKAMAN');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_inspeksi`
--

CREATE TABLE `hasil_inspeksi` (
  `id` int(11) NOT NULL,
  `kd_inspeksi` varchar(20) NOT NULL,
  `tgl_inspeksi` date NOT NULL,
  `kd_tim_inspeksi` varchar(20) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `status` enum('Diterima','Ditolak','Direvisi') NOT NULL,
  `jml_minor` int(11) NOT NULL,
  `jml_mayor` int(11) NOT NULL,
  `jml_serius` int(11) NOT NULL,
  `jml_kritis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL,
  `kd_jenis_produk` varchar(20) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `kd_jenis_produk`, `jenis_produk`, `deskripsi`) VALUES
(1, 'JPK-001', 'JP A', ''),
(2, 'JPK-002', 'JP B', ''),
(3, 'JPK-003', 'JP C', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk_supplier`
--

CREATE TABLE `jenis_produk_supplier` (
  `id` int(11) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `kd_jenis_produk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_produk_supplier`
--

INSERT INTO `jenis_produk_supplier` (`id`, `kd_supplier`, `kd_jenis_produk`) VALUES
(1, 'SPL-001', 'JPK-001'),
(2, 'SPL-001', 'JPK-002'),
(3, 'SPL-001', 'JPK-003'),
(4, 'SPL-002', 'JPK-002'),
(5, 'SPL-002', 'JPK-003');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` enum('Tertunda','Perlu Revisi','Diterima') NOT NULL,
  `ktp` text NOT NULL,
  `npwp` text NOT NULL,
  `nib` text NOT NULL,
  `siup` text NOT NULL,
  `akta_usaha` text NOT NULL,
  `imb` text NOT NULL,
  `layout` text NOT NULL,
  `panduan_mutu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan_ajuan`
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
-- Table structure for table `sub_checklist_pks`
--

CREATE TABLE `sub_checklist_pks` (
  `id` int(11) NOT NULL,
  `id_checklist_pks` int(11) NOT NULL,
  `nama_subisian` varchar(255) NOT NULL,
  `is_mayor` tinyint(1) NOT NULL,
  `is_minor` tinyint(1) NOT NULL,
  `is_serius` tinyint(1) NOT NULL,
  `is_kritis` tinyint(1) NOT NULL,
  `acuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_checklist_pks`
--

INSERT INTO `sub_checklist_pks` (`id`, `id_checklist_pks`, `nama_subisian`, `is_mayor`, `is_minor`, `is_serius`, `is_kritis`, `acuan`) VALUES
(1, 1, 'Pasokan air tidak memadai dan tidak aman untuk digunakan', 0, 0, 1, 1, 'Persyaratan air dan es untuk penanganan dan pengolahan hasil perikanan'),
(2, 1, 'Memungkinkan terjadinya kontaminasi antara air bersih dan air kotor', 0, 0, 1, 0, 'Persyaratan air dan es untuk penanganan dan pengolahan hasil perikanan'),
(3, 1, 'Es tidak dibuat, ditangani atau digunakan dengan cara yang bersih', 0, 0, 1, 1, 'Persyaratan air dan es untuk penanganan dan pengolahan hasil perikanan'),
(4, 2, 'Peralatan, perlengkapan, dan fasilitas yang kontak langsung dengan produk memungkinkan terjadinya kontaminasi.', 0, 0, 1, 1, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F. 3'),
(5, 3, 'Cara penanganan tidak mencegah terjadinya kontaminasi silang', 0, 1, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013,Bab II.F. 2b3'),
(6, 3, 'Limbah tidak ditangani dengan baik dan dapat menyebabkan kontaminasi silang.', 0, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II'),
(7, 3, 'Konstruksi dan lay out tidak dirancang untuk mencegah kontaminasi silang.', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b2'),
(8, 4, 'Jumlah, desain dan fasilitas toilet tidak memadai dan berhubungan langsung dengan ruang proses', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b7a'),
(9, 4, 'Jumlah, lokasi, desain dan fasilitas pencuci tangan tidak memadai.', 0, 0, 1, 1, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b7d');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `nama_miniplant` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kd_jenis_produk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `kd_supplier`, `nama_supplier`, `nama_miniplant`, `alamat`, `kd_jenis_produk`) VALUES
(1, 'SPL-001', 'H. Ta\'lim', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tim_inspeksi`
--

CREATE TABLE `tim_inspeksi` (
  `id` int(11) NOT NULL,
  `kd_tim_inspeksi` varchar(20) NOT NULL,
  `pimpinan_supplier` varchar(20) NOT NULL,
  `ketua_inspeksi` varchar(20) NOT NULL,
  `anggota1` varchar(20) NOT NULL,
  `anggota2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim_inspeksi`
--

INSERT INTO `tim_inspeksi` (`id`, `kd_tim_inspeksi`, `pimpinan_supplier`, `ketua_inspeksi`, `anggota1`, `anggota2`) VALUES
(1, 'INS-001', 'SPL-001', 'ADM-001', 'ADM-002', 'ADM-003');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `phone`, `password`, `avatar`, `kd_admin`, `kd_supplier`, `is_active`) VALUES
(1, 'Rangga', '123@123.com', 'rangga', '123', '863c2a4b6bff5e22294081e376fc1f51', 'PIXL_20220919_175340_83.png', 'ADM-001', '', 1),
(4, 'H. Ta\'lim', '123@gmail.com', 'paktalim', '123', '202cb962ac59075b964b07152d234b70', '', '', 'SPL-001', 1),
(5, 'Jeri', '', 'ADM-002_Jeri', '', '5280cd280f75766e827fa6283689467d', '', 'ADM-002', '', 1),
(6, 'Wiky', '', 'ADM-003_Wiky', '', 'bf6a4a64c2a8c0a8c2623850d757f981', '', 'ADM-003', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checklist_kelayakan_supplier`
--
ALTER TABLE `checklist_kelayakan_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_inspeksi`
--
ALTER TABLE `hasil_inspeksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_produk_supplier`
--
ALTER TABLE `jenis_produk_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_pengajuan` (`kd_pengajuan`),
  ADD KEY `kd_supplier` (`kd_supplier`);

--
-- Indexes for table `perbaikan_ajuan`
--
ALTER TABLE `perbaikan_ajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_checklist_pks`
--
ALTER TABLE `sub_checklist_pks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_supplier` (`kd_supplier`);

--
-- Indexes for table `tim_inspeksi`
--
ALTER TABLE `tim_inspeksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checklist_kelayakan_supplier`
--
ALTER TABLE `checklist_kelayakan_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hasil_inspeksi`
--
ALTER TABLE `hasil_inspeksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_produk_supplier`
--
ALTER TABLE `jenis_produk_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perbaikan_ajuan`
--
ALTER TABLE `perbaikan_ajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_checklist_pks`
--
ALTER TABLE `sub_checklist_pks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tim_inspeksi`
--
ALTER TABLE `tim_inspeksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
