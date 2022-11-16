-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2022 pada 10.46
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
(1, 'ADM-001', 'Rangga', 'Laki-laki', 'rangga', 'Administrator'),
(2, 'ADM-002', 'Jeri', 'Laki-laki', '', 'Administrator'),
(3, 'ADM-003', 'Wiky', 'Laki-laki', '', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_isian`
--

CREATE TABLE `daftar_isian` (
  `id` int(11) NOT NULL,
  `kd_daftar_isian` varchar(20) NOT NULL,
  `nama_isian` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_isian`
--

INSERT INTO `daftar_isian` (`id`, `kd_daftar_isian`, `nama_isian`, `deskripsi`) VALUES
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
-- Struktur dari tabel `hasil_inspeksi`
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
(1, 'REG-0001', 'SPL-001', 'JPK-001'),
(2, 'REG-0001', 'SPL-001', 'JPK-003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `miniplant_supplier`
--

CREATE TABLE `miniplant_supplier` (
  `id` int(11) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `nama_miniplant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `miniplant_supplier`
--

INSERT INTO `miniplant_supplier` (`id`, `kd_pengajuan`, `kd_supplier`, `nama_miniplant`) VALUES
(1, 'REG-0001', 'SPL-001', 'mp-1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penanganan`
--

CREATE TABLE `penanganan` (
  `id` int(11) NOT NULL,
  `kd_penanganan` varchar(20) NOT NULL,
  `tahap_penanganan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penanganan`
--

INSERT INTO `penanganan` (`id`, `kd_penanganan`, `tahap_penanganan`, `deskripsi`) VALUES
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
  `nama_miniplant` varchar(50) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` enum('Tertunda','Dalam proses Inspeksi','Perlu Revisi','Diterima') NOT NULL,
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

INSERT INTO `pengajuan` (`id`, `kd_pengajuan`, `kd_supplier`, `nama_miniplant`, `tgl_pengajuan`, `status`, `ktp`, `npwp`, `nib`, `siup`, `akta_usaha`, `imb`, `layout`, `panduan_mutu`) VALUES
(2, 'REG-0001', 'SPL-001', 'mp-1', '2022-11-12', 'Tertunda', '0_Kontrak_Kuliah_dan_Silabus4.pdf', '1_Internet_dan_Web4.pdf', '1__Fuzzy_Set_Theory4.pdf', '1__Penelitian_Konsep,_Definisi_dan_Metode4.pdf', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `tgl_inspeksi` date NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `jenis_supplier` enum('Baru','Lama') NOT NULL,
  `kd_tim_inspeksi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_hasil_inspeksi`
--

CREATE TABLE `penilaian_hasil_inspeksi` (
  `id` int(11) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `id_subisian` int(11) NOT NULL,
  `is_minor` tinyint(1) NOT NULL,
  `is_mayor` tinyint(1) NOT NULL,
  `is_serius` tinyint(1) NOT NULL,
  `is_kritis` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status` enum('Lolos','Perlu Revisi Kembali','Tidak Lolos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `revision_notes`
--

CREATE TABLE `revision_notes` (
  `id` int(11) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `revisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_daftar_isian`
--

CREATE TABLE `sub_daftar_isian` (
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
-- Dumping data untuk tabel `sub_daftar_isian`
--

INSERT INTO `sub_daftar_isian` (`id`, `kd_daftar_isian`, `nama_subisian`, `is_mayor`, `is_minor`, `is_serius`, `is_kritis`, `acuan`) VALUES
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
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `no_fax` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `kd_supplier`, `nama_supplier`, `no_telp`, `no_fax`, `alamat`) VALUES
(1, 'SPL-001', 'H. Ta\'lim', '', '', '');

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
(3, 'INS-001', 'REG-0001', 'SPL-001', 'ADM-001', 'ADM-002', 'ADM-003');

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
(1, 'Rangga', '123@123.com', 'rangga', '123', '863c2a4b6bff5e22294081e376fc1f51', 'PIXL_20220919_175340_83.png', 'ADM-001', '', 1),
(4, 'H. Ta\'lim', '123@gmail.com', 'paktalim', '123', '202cb962ac59075b964b07152d234b70', 'logo_bkipm.png', '', 'SPL-001', 1),
(5, 'Jeri', 'admin@gmail.com', 'jeri', '08123', 'd63e6966c704eec1885b753d5b257b3c', 'cropped-logo-PDIP1.jpg', 'ADM-002', '', 1),
(6, 'Wiky', '', 'ADM-003_Wiky', '', 'bf6a4a64c2a8c0a8c2623850d757f981', '', 'ADM-003', '', 1);

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
-- Indeks untuk tabel `hasil_inspeksi`
--
ALTER TABLE `hasil_inspeksi`
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
-- Indeks untuk tabel `miniplant_supplier`
--
ALTER TABLE `miniplant_supplier`
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
-- Indeks untuk tabel `penilaian_hasil_inspeksi`
--
ALTER TABLE `penilaian_hasil_inspeksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbaikan_ajuan`
--
ALTER TABLE `perbaikan_ajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `revision_notes`
--
ALTER TABLE `revision_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_daftar_isian`
--
ALTER TABLE `sub_daftar_isian`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `daftar_isian`
--
ALTER TABLE `daftar_isian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `hasil_inspeksi`
--
ALTER TABLE `hasil_inspeksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_produk_supplier`
--
ALTER TABLE `jenis_produk_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `miniplant_supplier`
--
ALTER TABLE `miniplant_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaian_hasil_inspeksi`
--
ALTER TABLE `penilaian_hasil_inspeksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perbaikan_ajuan`
--
ALTER TABLE `perbaikan_ajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `revision_notes`
--
ALTER TABLE `revision_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sub_daftar_isian`
--
ALTER TABLE `sub_daftar_isian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tim_inspeksi`
--
ALTER TABLE `tim_inspeksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
