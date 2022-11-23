-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2022 pada 14.37
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
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `kd_admin`, `nama_admin`, `no_telp`, `email`, `jenis_kelamin`, `alamat`, `avatar`) VALUES
(1, 'ADM-001', 'Rangga', '123', '123@123.com', 'Laki-laki', 'rangga', ''),
(7, 'ADM-002', 'Jeri', '12345', '', 'Laki-laki', 'majalengka', ''),
(8, 'ADM-003', 'Wiky', '123456', '', 'Laki-laki', 'Cibaduyut', ''),
(9, 'ADM-004', 'anjay', '081', '', 'Laki-laki', 'a', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_isian`
--

CREATE TABLE `daftar_isian` (
  `id` int(11) NOT NULL,
  `kd_daftar_isian` varchar(20) NOT NULL,
  `nama_subisian` varchar(255) NOT NULL,
  `is_mayor` tinyint(1) NOT NULL,
  `is_minor` tinyint(1) NOT NULL,
  `is_serius` tinyint(1) NOT NULL,
  `is_kritis` tinyint(1) NOT NULL,
  `acuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_isian`
--

INSERT INTO `daftar_isian` (`id`, `kd_daftar_isian`, `nama_subisian`, `is_mayor`, `is_minor`, `is_serius`, `is_kritis`, `acuan`) VALUES
(1, 'CKS-001', 'Pasokan air tidak memadai dan tidak aman untuk digunakan', 1, 1, 1, 1, 'Persyaratan air dan es untuk penanganan dan pengolahan hasil perikanan'),
(2, 'CKS-001', 'Memungkinkan terjadinya kontaminasi antara air bersih dan air kotor', 1, 0, 0, 1, 'Persyaratan air dan es untuk penanganan dan pengolahan hasil perikanan'),
(3, 'CKS-001', 'Es tidak dibuat, ditangani atau digunakan dengan cara yang bersih', 1, 1, 0, 0, 'Persyaratan air dan es untuk penanganan dan pengolahan hasil perikanan'),
(4, 'CKS-002', 'Peralatan, perlengkapan, dan fasilitas yang kontak langsung dengan produk memungkinkan terjadinya kontaminasi.', 0, 0, 1, 1, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F. 3'),
(5, 'CKS-003', 'Cara penanganan tidak mencegah terjadinya kontaminasi silang', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013,Bab II.F. 2b3'),
(6, 'CKS-003', 'Limbah tidak ditangani dengan baik dan dapat menyebabkan kontaminasi silang.', 0, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II'),
(7, 'CKS-003', 'Konstruksi dan lay out tidak dirancang untuk mencegah kontaminasi silang.', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b2'),
(8, 'CKS-004', 'Jumlah, desain dan fasilitas toilet tidak memadai dan berhubungan langsung dengan ruang proses', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b7a'),
(9, 'CKS-004', 'Jumlah, lokasi, desain dan fasilitas pencuci tangan tidak memadai.', 0, 0, 1, 1, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b7d'),
(10, 'CKS-004', 'Bak cuci kaki tidak tersedia, tidak sesuai, tidak menggunakan air bersih dan tidak didefinisikan **)', 0, 0, 1, 1, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b7c'),
(11, 'CKS-005', 'Bahan-bahan kimia berbahaya tidak diberi label dengan benar', 1, 0, 0, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1e'),
(12, 'CKS-005', 'Bahan-bahan kimia tidak disimpan ditempat yang terpisahdari ruang proses dan tidak terkunci serta digunakan atau ditangani dengan cara yang tidak benar.', 0, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b8'),
(13, 'CKS-006', 'Tingkah laku karyawan yang menangani produk tidak menjaga kebersihan individu dan tidak menggunakan pakaian kerja yang sesuai.', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.g\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.3'),
(14, 'CKS-006', 'Unit supplier/pengumpul/ tidak mempunyai sistem yang dapat mencegah karyawan berpenyakit menangani produk', 0, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.h\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.4'),
(15, 'CKS-007', 'Unit supplier/pengumpul tidak mempunyai tindakan pencegahan terhadap masuknya hewan pengganggu', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b5'),
(16, 'CKS-007', 'Unit supplier/pengumpul tidak memiliki tindakan menghilangkan hewan pengganggu dari unit pengolahan', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b5'),
(17, 'CKS-008', 'Tidak dilakukan pengendalian dan pemantauan terhadap mutu dan keamanan bahan baku, bahan tambahan dan bahan penolong selama penanganan/pengolahan', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.5'),
(18, 'CKS-008', 'Tidak dilakukan pengendalian dan pemantauan terhadap suhu selama penanganan/pengolahan', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.d\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1g\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1h'),
(19, 'CKS-008', 'Penanganan atau pengolahan tidak dilakukan dengan teknologi yang sesuai', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.5'),
(20, 'CKS-009', 'Bahan pengemas dan label/kode terbuat dari bahan yang tidak mencemari, tidak dapat melindungi dan dapat merubah karakteristik produk', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.6b'),
(21, 'CKS-009', 'pengemasan tidak dilakukan secara higienis', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.6a'),
(22, 'CKS-009', 'Pelabelan tidak memenuhi persyaratan', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.6f'),
(23, 'CKS-009', 'Tidak dilakukan pelabelan yang memadai terhadap produk hasil perikanan yang dapat membahayakan kesehatan manusia(alergen, beracun, bahan tambahan makanan, dsb)', 1, 0, 0, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1c\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1d\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.6g'),
(24, 'CKS-010', 'Penyimpanan produk akhir tidak mampu menjamin suhu sesuai dengan spesifikasi produk', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.D\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1g'),
(25, 'CKS-011', 'Pengangkutan produk tidak menjamin suhu sesuai dengan spesifikasi produk', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.G'),
(26, 'CKS-012', 'Monitoring tidak diterapkan', 0, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.7b'),
(27, 'CKS-012', 'Tindakan koreksi tidak dilakukan ', 1, 0, 1, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.7b'),
(28, 'CKS-013', 'Rekaman data tidak tersedia', 1, 0, 0, 0, 'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.7b');

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
(1, 'JPK-001', 'JP A', ''),
(2, 'JPK-002', 'JP B', ''),
(3, 'JPK-003', 'JP C', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_produk_supplier`
--

CREATE TABLE `jenis_produk_supplier` (
  `id` int(11) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `kd_jenis_produk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_produk_supplier`
--

INSERT INTO `jenis_produk_supplier` (`id`, `kd_pengajuan`, `kd_supplier`, `kd_jenis_produk`) VALUES
(3, 'REG-0001', 'SPL-001', 'JPK-001'),
(4, 'REG-0001', 'SPL-001', 'JPK-003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_daftar_isian`
--

CREATE TABLE `kategori_daftar_isian` (
  `id` int(11) NOT NULL,
  `kd_daftar_isian` varchar(20) NOT NULL,
  `nama_isian` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_daftar_isian`
--

INSERT INTO `kategori_daftar_isian` (`id`, `kd_daftar_isian`, `nama_isian`, `deskripsi`) VALUES
(1, 'CKS-001', 'KEAMANAN AIR DAN ES', ''),
(2, 'CKS-002', 'PERMUKAAN YANG KONTAK LANGSUNG DENGAN PRODUK', ''),
(3, 'CKS-003', 'PENCEGAHAN KONTAMINASI SILANG', ''),
(4, 'CKS-004', 'FASILITAS SANITASI', ''),
(5, 'CKS-005', 'PELABELAN, PENYIMPANAN DAN PENGGUNAAN BAHAN KIMIA ', ''),
(6, 'CKS-006', 'KESEHATAN DAN KEBERSIHAN KARYAWAN', ''),
(7, 'CKS-007', 'PENGENDALIAN PEST (PEST CONTROL)', ''),
(8, 'CKS-008', 'PENGENDALIAN PROSES', ''),
(9, 'CKS-009', 'PENGEMASAN DAN PELABELAN', ''),
(10, 'CKS-010', 'PENYIMPANAN', ''),
(11, 'CKS-011', 'DISTRIBUSI / TRANSPORTASI', ''),
(12, 'CKS-012', 'MONITORING', ''),
(13, 'CKS-013', 'REKAMAN', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanganan`
--

CREATE TABLE `penanganan` (
  `id` int(11) NOT NULL,
  `kd_penanganan` varchar(20) NOT NULL,
  `nama_penanganan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penanganan`
--

INSERT INTO `penanganan` (`id`, `kd_penanganan`, `nama_penanganan`, `deskripsi`) VALUES
(2, 'PNG-001', 'Penerimaan', '1'),
(3, 'PNG-002', 'Penampungan1', '21'),
(4, 'PNG-003', 'Pencucian I', '3'),
(5, 'PNG-004', 'Sortasi', '4'),
(6, 'PNG-005', 'Pencucian II', '5'),
(7, 'PNG-006', 'Penimbangan', '6'),
(8, 'PNG-007', 'Pengepakan', '7'),
(9, 'PNG-008', 'Pengangkutan', '8'),
(10, 'PNG-009', 'Pengiriman', '9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` enum('Tertunda','Dalam proses Inspeksi','Perlu Revisi','Lolos Inspeksi') NOT NULL,
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
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `kd_pengajuan`, `kd_supplier`, `tgl_pengajuan`, `status`, `ktp`, `npwp`, `nib`, `siup`, `akta_usaha`, `imb`, `layout`, `panduan_mutu`) VALUES
(2, 'REG-0001', 'SPL-001', '2022-11-23', 'Dalam proses Inspeksi', '854878.png', 'data_100_download-logo-bumdes-nasional-0.png', 'download-removebg-preview.png', 'wrekodara-dr-buku-bratajoeda-kartapradja-19373-removebg-preview.png', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `tgl_inspeksi` date NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `jenis_supplier` enum('Baru','Lama') NOT NULL,
  `kd_tim_inspeksi` varchar(20) NOT NULL,
  `jml_minor` int(11) NOT NULL,
  `jml_mayor` int(11) NOT NULL,
  `jml_serius` int(11) NOT NULL,
  `jml_kritis` int(11) NOT NULL,
  `klasifikasi` enum('Sangat Baik','Baik','Cukup','Kurang','Tidak Valid') NOT NULL,
  `is_need_revisi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_detail`
--

CREATE TABLE `penilaian_detail` (
  `id` int(11) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `id_daftar_isian` int(11) NOT NULL,
  `is_minor` tinyint(1) NOT NULL,
  `is_mayor` tinyint(1) NOT NULL,
  `is_serius` tinyint(1) NOT NULL,
  `is_kritis` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_notes`
--

CREATE TABLE `penilaian_notes` (
  `id` int(11) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_penanganan`
--

CREATE TABLE `penilaian_penanganan` (
  `id` int(11) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `kd_penanganan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id` int(11) NOT NULL,
  `kd_perbaikan` varchar(20) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `tgl_perbaikan` date NOT NULL,
  `status` enum('Menunggu Validasi Admin','Lolos','Perlu Revisi Kembali','Tidak Lolos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan_detail`
--

CREATE TABLE `perbaikan_detail` (
  `id` int(11) NOT NULL,
  `kd_perbaikan` varchar(20) NOT NULL,
  `id_notes` int(11) NOT NULL,
  `file_perbaikan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `nama_miniplant` varchar(100) NOT NULL,
  `nama_pimpinan` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_fax` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `kd_supplier`, `nama_miniplant`, `nama_pimpinan`, `no_telp`, `email`, `no_fax`, `alamat`, `avatar`) VALUES
(3, 'SPL-001', 'CV. EMPAL GENTONG', 'H. Apud', '1234', '', '', 'Cirebon\r\n', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tim_inspeksi`
--

CREATE TABLE `tim_inspeksi` (
  `id` int(11) NOT NULL,
  `kd_tim_inspeksi` varchar(20) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `pimpinan_supplier` varchar(20) NOT NULL,
  `ketua_inspeksi` varchar(20) NOT NULL,
  `anggota1` varchar(20) NOT NULL,
  `anggota2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tim_inspeksi`
--

INSERT INTO `tim_inspeksi` (`id`, `kd_tim_inspeksi`, `kd_pengajuan`, `pimpinan_supplier`, `ketua_inspeksi`, `anggota1`, `anggota2`) VALUES
(2, 'INS-001', 'REG-0001', 'H. Apud', 'ADM-003', 'ADM-004', 'ADM-001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kd_admin` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `kd_admin`, `kd_supplier`, `is_active`) VALUES
(1, 'Rangga', '123', '123@123.com', '863c2a4b6bff5e22294081e376fc1f51', 'ADM-001', '', 1),
(14, 'CV. EMPAL GENTONG', '1234', '', '81dc9bdb52d04dc20036dbd8313ed055', '', 'SPL-001', 0),
(15, 'Jeri', '12345', '', '827ccb0eea8a706c4c34a16891f84e7b', 'ADM-002', '', 1),
(16, 'Wiky', '123456', '', 'e10adc3949ba59abbe56e057f20f883e', 'ADM-003', '', 1),
(17, 'anjay', '081', '', '13c022b0b3f191667e834e0e155b0651', 'ADM-004', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_isian`
--
ALTER TABLE `daftar_isian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_produk_supplier`
--
ALTER TABLE `jenis_produk_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_daftar_isian`
--
ALTER TABLE `kategori_daftar_isian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_pengajuan` (`kd_pengajuan`),
  ADD KEY `kd_supplier` (`kd_supplier`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian_detail`
--
ALTER TABLE `penilaian_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian_notes`
--
ALTER TABLE `penilaian_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian_penanganan`
--
ALTER TABLE `penilaian_penanganan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbaikan_detail`
--
ALTER TABLE `perbaikan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_supplier` (`kd_supplier`);

--
-- Indeks untuk tabel `tim_inspeksi`
--
ALTER TABLE `tim_inspeksi`
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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `daftar_isian`
--
ALTER TABLE `daftar_isian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_produk_supplier`
--
ALTER TABLE `jenis_produk_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kategori_daftar_isian`
--
ALTER TABLE `kategori_daftar_isian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penilaian_detail`
--
ALTER TABLE `penilaian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `penilaian_notes`
--
ALTER TABLE `penilaian_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penilaian_penanganan`
--
ALTER TABLE `penilaian_penanganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `perbaikan_detail`
--
ALTER TABLE `perbaikan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tim_inspeksi`
--
ALTER TABLE `tim_inspeksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
