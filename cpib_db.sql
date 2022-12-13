-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 12:53 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
  `no_reg` varchar(20) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `avatar` text NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `kd_admin`, `no_reg`, `nama_admin`, `no_telp`, `email`, `jenis_kelamin`, `alamat`, `avatar`) VALUES
(1, 'ADM-001', 'REG-0021', 'Rangga', '123', '123@123.com', 'Laki-laki', 'rangga', 'logo_kemendesa.png'),
(7, 'ADM-002', 'REG-0023', 'Jeri', '1234', '', 'Laki-laki', '', ''),
(8, 'ADM-003', 'R', 'Wiky', '12345', '12345@1234.com', 'Laki-laki', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_isian`
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
-- Dumping data for table `daftar_isian`
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
-- Table structure for table `jenis_produk`
--

CREATE TABLE `jenis_produk` (
  `id` int(11) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `kd_pengajuan`, `kd_supplier`, `jenis_produk`) VALUES
(1, 'REG-0001', 'SPL-001', 'jp1'),
(2, 'REG-0002', 'SPL-001', 'jp2'),
(3, 'REG-0003', 'SPL-001', 'Udang Segar'),
(4, 'REG-0001', 'SPL-001', 'udang rebon'),
(5, 'REG-0001', 'SPL-001', 'udang rebon'),
(6, 'REG-0002', 'SPL-002', 'Kerang Dara'),
(7, 'REG-0003', 'SPL-001', 'udang rebon'),
(8, 'REG-0004', 'SPL-003', 'udang rebon'),
(9, 'REG-0005', 'SPL-003', 'Rebon bakar'),
(10, 'REG-0006', 'SPL-001', 'Cumi-cumi');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_daftar_isian`
--

CREATE TABLE `kategori_daftar_isian` (
  `id` int(11) NOT NULL,
  `kd_daftar_isian` varchar(20) NOT NULL,
  `nama_isian` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_daftar_isian`
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
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `type` enum('registrasi','pengajuan','penilaian','perbaikan','sertifikat') NOT NULL,
  `kd_supplier` varchar(50) NOT NULL,
  `kd_pengajuan` varchar(50) DEFAULT NULL,
  `kd_penilaian` varchar(50) DEFAULT NULL,
  `kd_perbaikan` varchar(50) DEFAULT NULL,
  `kd_sertifikat` varchar(50) DEFAULT NULL,
  `pesan` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `type`, `kd_supplier`, `kd_pengajuan`, `kd_penilaian`, `kd_perbaikan`, `kd_sertifikat`, `pesan`, `is_read`, `datetime`) VALUES
(1, 'pengajuan', 'SPL-001', 'REG-0001', NULL, NULL, NULL, 'Pengajuan baru Tertunda, lanjutkan proses sekarang?', 0, '2022-12-09 04:00:43'),
(2, 'pengajuan', 'SPL-001', 'REG-0001', NULL, NULL, NULL, 'Pengajuan baru Tertunda, lanjutkan proses sekarang?', 0, '2022-12-09 04:01:00'),
(3, 'registrasi', 'SPL-002', NULL, NULL, NULL, NULL, 'Supplier baru telah mendaftar, aktivasi sekarang?', 1, '2022-12-13 05:02:11'),
(4, 'pengajuan', 'SPL-002', 'REG-0002', NULL, NULL, NULL, 'Pengajuan baru Tertunda, lanjutkan proses sekarang?', 1, '2022-12-13 05:05:17'),
(5, 'pengajuan', 'SPL-001', 'REG-0003', NULL, NULL, NULL, 'Pengajuan baru Tertunda, lanjutkan proses sekarang?', 1, '2022-12-13 10:01:08'),
(6, 'registrasi', 'SPL-003', NULL, NULL, NULL, NULL, 'Supplier baru telah mendaftar, aktivasi sekarang?', 1, '2022-12-13 10:17:20'),
(7, 'pengajuan', 'SPL-003', 'REG-0004', NULL, NULL, NULL, 'Pengajuan baru Tertunda, lanjutkan proses sekarang?', 1, '2022-12-13 10:18:39'),
(8, 'pengajuan', 'SPL-003', 'REG-0005', NULL, NULL, NULL, 'Pengajuan baru Tertunda, lanjutkan proses sekarang?', 1, '2022-12-13 10:21:48'),
(9, 'perbaikan', 'SPL-001', NULL, NULL, 'PAJ-0001', NULL, 'Supplier telah melakukan perbaikan, validasi sekarang?', 1, '2022-12-13 10:27:06'),
(10, 'sertifikat', 'SPL-001', NULL, 'PKS-0004', NULL, NULL, 'Satu permohonan menunggu sertifikat, Generate Sertifikat sekarang?', 0, '2022-12-13 10:27:59'),
(11, 'pengajuan', 'SPL-001', 'REG-0006', NULL, NULL, NULL, 'Pengajuan baru Tertunda, lanjutkan proses sekarang?', 1, '2022-12-13 10:55:44'),
(12, 'perbaikan', 'SPL-001', NULL, NULL, 'PAJ-0002', NULL, 'Supplier telah melakukan perbaikan, validasi sekarang?', 1, '2022-12-13 10:57:37'),
(13, 'perbaikan', 'SPL-001', NULL, NULL, 'PAJ-0003', NULL, 'Supplier telah melakukan perbaikan, validasi sekarang?', 1, '2022-12-13 11:19:12'),
(14, 'sertifikat', 'SPL-001', NULL, 'PKS-0005', NULL, NULL, 'Satu permohonan menunggu sertifikat, Generate Sertifikat sekarang?', 0, '2022-12-13 11:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi_supplier`
--

CREATE TABLE `notifikasi_supplier` (
  `id` int(11) NOT NULL,
  `type` enum('pengajuan','penilaian','perbaikan','sertifikat') NOT NULL,
  `kd_supplier` varchar(50) DEFAULT NULL,
  `kd_pengajuan` varchar(50) DEFAULT NULL,
  `kd_penilaian` varchar(50) DEFAULT NULL,
  `kd_perbaikan` varchar(50) DEFAULT NULL,
  `id_sertifikat` int(11) DEFAULT NULL,
  `pesan` text NOT NULL,
  `status` enum('Diterima','Ditolak') NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi_supplier`
--

INSERT INTO `notifikasi_supplier` (`id`, `type`, `kd_supplier`, `kd_pengajuan`, `kd_penilaian`, `kd_perbaikan`, `id_sertifikat`, `pesan`, `status`, `is_read`, `datetime`) VALUES
(1, 'pengajuan', 'SPL-001', 'REG-0003', NULL, NULL, NULL, 'Pengajuan Diterima, Mohon Menunggu Proses Inspeksi', 'Diterima', 1, '2022-12-13 10:16:26'),
(2, 'pengajuan', 'SPL-003', 'REG-0004', NULL, NULL, NULL, 'Pengajuan Ditolak, Mohon Upload ulang kelengkapan dokumen', 'Ditolak', 1, '2022-12-13 10:19:30'),
(3, 'pengajuan', 'SPL-003', 'REG-0005', NULL, NULL, NULL, 'Pengajuan Diterima, Mohon Menunggu Proses Inspeksi', 'Diterima', 1, '2022-12-13 10:25:38'),
(4, 'penilaian', 'SPL-003', NULL, 'PKS-0003', NULL, NULL, 'Selamat! Proses Inspeksi Telah Dilaksanakan, Mohon Menunggu Sertifikat', 'Diterima', 1, '2022-12-13 10:25:25'),
(5, 'penilaian', 'SPL-001', NULL, 'PKS-0004', NULL, NULL, 'Penilaian Tidak Memenuhi Klasifikasi, Mohon Perbaiki Catatan Berikut', 'Ditolak', 1, '2022-12-13 10:26:51'),
(6, 'perbaikan', 'SPL-001', NULL, NULL, 'PAJ-0001', NULL, 'Selamat! Perbaikan Telah Divalidasi, Mohon Menunggu Sertifikat', 'Diterima', 1, '2022-12-13 10:28:07'),
(7, 'sertifikat', 'SPL-001', NULL, NULL, NULL, 1, 'Selamat Sertifikat telah Dilegalisasi, Harap hubungi pihak BKIPM untuk pengambilan Sertifikat', 'Diterima', 1, '2022-12-13 10:53:37'),
(8, 'pengajuan', 'SPL-001', 'REG-0006', NULL, NULL, NULL, 'Pengajuan Diterima, Mohon Menunggu Proses Inspeksi', 'Diterima', 1, '2022-12-13 10:57:19'),
(9, 'penilaian', 'SPL-001', NULL, 'PKS-0005', NULL, NULL, 'Penilaian Tidak Memenuhi Klasifikasi, Mohon Perbaiki Catatan Berikut', 'Ditolak', 1, '2022-12-13 10:57:25'),
(10, 'perbaikan', 'SPL-001', NULL, NULL, 'PAJ-0002', NULL, 'Perbaikan Ditolak, Mohon Perbaiki Kembali List Berikut:', 'Ditolak', 1, '2022-12-13 10:58:26'),
(11, 'perbaikan', 'SPL-001', NULL, NULL, 'PAJ-0003', NULL, 'Selamat! Perbaikan Telah Divalidasi, Mohon Menunggu Sertifikat', 'Diterima', 1, '2022-12-13 11:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `penanganan`
--

CREATE TABLE `penanganan` (
  `id` int(11) NOT NULL,
  `kd_penanganan` varchar(20) NOT NULL,
  `nama_penanganan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penanganan`
--

INSERT INTO `penanganan` (`id`, `kd_penanganan`, `nama_penanganan`, `deskripsi`) VALUES
(1, 'PNG-001', 'P1', ''),
(2, 'PNG-002', 'P2', ''),
(3, 'PNG-003', 'P3', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` enum('Tertunda','Dalam proses Inspeksi','Lolos','Perlu Revisi','Menunggu validasi perbaikan','Menunggu Sertifikat','Tidak Lolos') NOT NULL,
  `ktp` text NOT NULL,
  `npwp` text NOT NULL,
  `nib` text DEFAULT NULL,
  `siup` text DEFAULT NULL,
  `akta_usaha` text DEFAULT NULL,
  `imb` text DEFAULT NULL,
  `layout` text NOT NULL,
  `panduan_mutu` text NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `kd_pengajuan`, `kd_supplier`, `tgl_pengajuan`, `status`, `ktp`, `npwp`, `nib`, `siup`, `akta_usaha`, `imb`, `layout`, `panduan_mutu`, `keterangan`) VALUES
(1, 'REG-0001', 'SPL-001', '2022-12-09', 'Menunggu Sertifikat', 'GAMBAR_183040084_B.pdf', 'Assignment_Analisi_183040084_B.pdf', NULL, NULL, NULL, NULL, 'A3-UTS-WIKY_WILDAN_ASSIDQIE.pdf', 'Investigasi_183040084_B.pdf', NULL),
(2, 'REG-0002', 'SPL-002', '2022-12-13', 'Perlu Revisi', 'ibs_inday.jpg', 'Investigasi_183040084_B1.pdf', NULL, NULL, NULL, NULL, 'GAMBAR_183040084_B1.pdf', 'Resume_costumer_relationship_183040084.pdf', NULL),
(3, 'REG-0003', 'SPL-001', '2022-12-13', 'Lolos', 'IMK183040084Wiky.pdf', 'IMK183040084Wiky1.pdf', NULL, NULL, NULL, NULL, 'IMK183040084Wiky2.pdf', 'IMK183040084Wiky3.pdf', NULL),
(4, 'REG-0004', 'SPL-003', '2022-12-13', 'Tidak Lolos', 'IMK183040084Wiky4.pdf', 'IMK183040084Wiky5.pdf', NULL, NULL, NULL, NULL, 'IMK183040084Wiky6.pdf', 'IMK183040084Wiky7.pdf', 'aksjdklaklsdjlasdk'),
(5, 'REG-0005', 'SPL-003', '2022-12-13', 'Menunggu Sertifikat', '117-File_Utama_Naskah-289-3-10-20210706.pdf', '31-61-1-SM.pdf', NULL, NULL, NULL, NULL, 'Sistem_Informasi_Pengolahan_Sertifikat_B.pdf', '2895-Article_Text-10513-1-10-20201111.pdf', NULL),
(6, 'REG-0006', 'SPL-001', '2022-12-13', 'Menunggu Sertifikat', '647-Article_Text-3376-1-10-20220215.pdf', '31-61-1-SM2.pdf', NULL, NULL, NULL, NULL, '31-61-1-SM3.pdf', 'Bab_01_Data_dan_Informasi.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `tgl_inspeksi` date NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `jenis_supplier` enum('Baru','Lama') NOT NULL,
  `kd_tim_inspeksi` varchar(20) NOT NULL,
  `catatan` text DEFAULT NULL,
  `jml_minor` int(11) NOT NULL,
  `jml_mayor` int(11) NOT NULL,
  `jml_serius` int(11) NOT NULL,
  `jml_kritis` int(11) NOT NULL,
  `klasifikasi` enum('Sangat Baik','Baik','Cukup','Kurang','Tidak Valid') NOT NULL,
  `is_need_revisi` tinyint(1) NOT NULL,
  `status` enum('Lolos','Perlu Revisi','Menunggu validasi perbaikan','Menunggu Sertifikat','Tidak Lolos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `kd_penilaian`, `kd_pengajuan`, `tgl_inspeksi`, `kd_supplier`, `jenis_supplier`, `kd_tim_inspeksi`, `catatan`, `jml_minor`, `jml_mayor`, `jml_serius`, `jml_kritis`, `klasifikasi`, `is_need_revisi`, `status`) VALUES
(1, 'PKS-0001', 'REG-0001', '2022-12-09', 'SPL-001', 'Baru', 'INS-001', '', 1, 4, 0, 0, 'Sangat Baik', 0, 'Menunggu Sertifikat'),
(2, 'PKS-0002', 'REG-0002', '2022-12-13', 'SPL-002', 'Baru', 'INS-002', '', 0, 0, 5, 1, 'Kurang', 1, 'Perlu Revisi'),
(3, 'PKS-0003', 'REG-0005', '2022-12-13', 'SPL-003', 'Lama', 'INS-004', '', 1, 1, 0, 0, 'Sangat Baik', 0, 'Menunggu Sertifikat'),
(4, 'PKS-0004', 'REG-0003', '2022-12-13', 'SPL-001', 'Lama', 'INS-003', 'sa.dna,sndhalsdla sklh la sdklklasj', 0, 0, 5, 1, 'Baik', 1, 'Lolos'),
(5, 'PKS-0005', 'REG-0006', '2022-12-13', 'SPL-001', 'Lama', 'INS-005', 'lksdhwlhdljhkjdh\r\naskndjhjdjhjksdh', 0, 0, 6, 1, 'Baik', 1, 'Menunggu Sertifikat');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_detail`
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

--
-- Dumping data for table `penilaian_detail`
--

INSERT INTO `penilaian_detail` (`id`, `kd_penilaian`, `id_daftar_isian`, `is_minor`, `is_mayor`, `is_serius`, `is_kritis`) VALUES
(1, 'PKS-0001', 1, 1, 0, 0, 0),
(2, 'PKS-0001', 2, 0, 1, 0, 0),
(3, 'PKS-0001', 3, 0, 1, 0, 0),
(4, 'PKS-0001', 5, 0, 1, 0, 0),
(5, 'PKS-0001', 7, 0, 1, 0, 0),
(6, 'PKS-0002', 1, 0, 0, 1, 0),
(7, 'PKS-0002', 2, 0, 0, 0, 1),
(8, 'PKS-0002', 4, 0, 0, 1, 0),
(9, 'PKS-0002', 5, 0, 0, 1, 0),
(10, 'PKS-0002', 6, 0, 0, 1, 0),
(11, 'PKS-0002', 21, 0, 0, 1, 0),
(12, 'PKS-0003', 1, 1, 0, 0, 0),
(13, 'PKS-0003', 2, 0, 1, 0, 0),
(14, 'PKS-0004', 1, 0, 0, 1, 0),
(15, 'PKS-0004', 2, 0, 0, 0, 1),
(16, 'PKS-0004', 4, 0, 0, 1, 0),
(17, 'PKS-0004', 5, 0, 0, 1, 0),
(18, 'PKS-0004', 6, 0, 0, 1, 0),
(19, 'PKS-0004', 7, 0, 0, 1, 0),
(20, 'PKS-0005', 1, 0, 0, 1, 0),
(21, 'PKS-0005', 2, 0, 0, 0, 1),
(22, 'PKS-0005', 4, 0, 0, 1, 0),
(23, 'PKS-0005', 5, 0, 0, 1, 0),
(24, 'PKS-0005', 6, 0, 0, 1, 0),
(25, 'PKS-0005', 7, 0, 0, 1, 0),
(26, 'PKS-0005', 8, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_notes`
--

CREATE TABLE `penilaian_notes` (
  `id` int(11) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `notes` text NOT NULL,
  `is_submit` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_notes`
--

INSERT INTO `penilaian_notes` (`id`, `kd_penilaian`, `notes`, `is_submit`) VALUES
(1, 'PKS-0002', 'Upload ulang KTP', 0),
(2, 'PKS-0004', 'gfdfgdsgtsdfgdf', 1),
(3, 'PKS-0005', 'HAHAHAHA', 1),
(4, 'PKS-0005', 'Upload ulang KTP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_penanganan`
--

CREATE TABLE `penilaian_penanganan` (
  `id` int(11) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `kd_penanganan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian_penanganan`
--

INSERT INTO `penilaian_penanganan` (`id`, `kd_penilaian`, `kd_penanganan`) VALUES
(1, 'PKS-0001', 'PNG-001'),
(2, 'PKS-0001', 'PNG-002'),
(3, 'PKS-0001', 'PNG-003'),
(4, 'PKS-0002', 'PNG-001'),
(5, 'PKS-0002', 'PNG-002'),
(6, 'PKS-0002', 'PNG-003'),
(7, 'PKS-0003', 'PNG-001'),
(8, 'PKS-0003', 'PNG-002'),
(9, 'PKS-0003', 'PNG-003'),
(10, 'PKS-0004', 'PNG-001'),
(11, 'PKS-0004', 'PNG-003'),
(12, 'PKS-0004', 'PNG-002'),
(13, 'PKS-0005', 'PNG-002'),
(14, 'PKS-0005', 'PNG-001'),
(15, 'PKS-0005', 'PNG-003');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan`
--

CREATE TABLE `perbaikan` (
  `id` int(11) NOT NULL,
  `kd_perbaikan` varchar(20) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `tgl_perbaikan` date NOT NULL,
  `status` enum('Lolos','Perlu Revisi','Menunggu validasi perbaikan','Menunggu Sertifikat','Tidak Lolos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perbaikan`
--

INSERT INTO `perbaikan` (`id`, `kd_perbaikan`, `kd_penilaian`, `kd_supplier`, `tgl_perbaikan`, `status`) VALUES
(1, 'PAJ-0001', 'PKS-0004', 'SPL-001', '2022-12-13', 'Lolos'),
(2, 'PAJ-0002', 'PKS-0005', 'SPL-001', '2022-12-13', 'Perlu Revisi'),
(3, 'PAJ-0003', 'PKS-0005', 'SPL-001', '2022-12-13', 'Menunggu Sertifikat');

-- --------------------------------------------------------

--
-- Table structure for table `perbaikan_detail`
--

CREATE TABLE `perbaikan_detail` (
  `id` int(11) NOT NULL,
  `kd_perbaikan` varchar(20) NOT NULL,
  `id_notes` int(11) NOT NULL,
  `file_perbaikan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perbaikan_detail`
--

INSERT INTO `perbaikan_detail` (`id`, `kd_perbaikan`, `id_notes`, `file_perbaikan`) VALUES
(1, 'PAJ-0001', 2, '31-61-1-SM1.pdf'),
(2, 'PAJ-0002', 3, '2895-Article_Text-10513-1-10-202011111.pdf'),
(3, 'PAJ-0003', 4, 'Sistem_Informasi_Pengolahan_Sertifikat_B1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int(11) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `kd_penilaian` varchar(20) NOT NULL,
  `kd_sertifikat` varchar(20) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `berlaku_sampai` date NOT NULL,
  `kepala_upt` varchar(50) NOT NULL,
  `file_sertifikat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `kd_supplier`, `kd_penilaian`, `kd_sertifikat`, `no_surat`, `tgl`, `berlaku_sampai`, `kepala_upt`, `file_sertifikat`) VALUES
(1, 'SPL-001', 'PKS-0004', 'CPIB-004', '1002/cpib-35/IX/2022', '2022-12-13', '2026-12-13', 'R. RUDI BARMARA', 'CPIB-004-SPL-001-20221213113804');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat_template`
--

CREATE TABLE `sertifikat_template` (
  `id` int(11) NOT NULL,
  `kd_sertifikat` varchar(20) NOT NULL,
  `nama_sertifikat` varchar(50) NOT NULL,
  `file_template` text NOT NULL,
  `preview_template` text DEFAULT NULL,
  `no_surat` text DEFAULT NULL,
  `s_no_surat` int(11) DEFAULT NULL,
  `x_no_surat` int(11) DEFAULT NULL,
  `y_no_surat` int(11) DEFAULT NULL,
  `supplier` text DEFAULT NULL,
  `s_supplier` int(11) DEFAULT NULL,
  `x_supplier` int(11) DEFAULT NULL,
  `y_supplier` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `w_alamat` int(11) DEFAULT NULL,
  `s_alamat` int(11) DEFAULT NULL,
  `x_alamat` int(11) DEFAULT NULL,
  `y_alamat` int(11) DEFAULT NULL,
  `jenis_produk` text DEFAULT NULL,
  `s_jenis_produk` int(11) DEFAULT NULL,
  `x_jenis_produk` int(11) DEFAULT NULL,
  `y_jenis_produk` int(11) DEFAULT NULL,
  `penanganan` text DEFAULT NULL,
  `w_penanganan` int(11) DEFAULT NULL,
  `s_penanganan` int(11) DEFAULT NULL,
  `x_penanganan` int(11) DEFAULT NULL,
  `y_penanganan` int(11) DEFAULT NULL,
  `klasifikasi` text DEFAULT NULL,
  `s_klasifikasi` int(11) DEFAULT NULL,
  `x_klasifikasi` int(11) DEFAULT NULL,
  `y_klasifikasi` int(11) DEFAULT NULL,
  `tgl_inspeksi` text DEFAULT NULL,
  `s_tgl_inspeksi` int(11) DEFAULT NULL,
  `x_tgl_inspeksi` int(11) DEFAULT NULL,
  `y_tgl_inspeksi` int(11) DEFAULT NULL,
  `berlaku_sampai` text DEFAULT NULL,
  `s_berlaku_sampai` int(11) DEFAULT NULL,
  `x_berlaku_sampai` int(11) DEFAULT NULL,
  `y_berlaku_sampai` int(11) DEFAULT NULL,
  `dikeluarkan_di` text DEFAULT NULL,
  `s_dikeluarkan_di` int(11) DEFAULT NULL,
  `x_dikeluarkan_di` int(11) DEFAULT NULL,
  `y_dikeluarkan_di` int(11) DEFAULT NULL,
  `tgl` text DEFAULT NULL,
  `s_tgl` int(11) DEFAULT NULL,
  `x_tgl` int(11) DEFAULT NULL,
  `y_tgl` int(11) DEFAULT NULL,
  `kepala_upt` text DEFAULT NULL,
  `s_kepala_upt` int(11) DEFAULT NULL,
  `x_kepala_upt` int(11) DEFAULT NULL,
  `y_kepala_upt` int(11) DEFAULT NULL,
  `head_of` text DEFAULT NULL,
  `s_head_of` int(11) DEFAULT NULL,
  `x_head_of` int(11) DEFAULT NULL,
  `y_head_of` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat_template`
--

INSERT INTO `sertifikat_template` (`id`, `kd_sertifikat`, `nama_sertifikat`, `file_template`, `preview_template`, `no_surat`, `s_no_surat`, `x_no_surat`, `y_no_surat`, `supplier`, `s_supplier`, `x_supplier`, `y_supplier`, `alamat`, `w_alamat`, `s_alamat`, `x_alamat`, `y_alamat`, `jenis_produk`, `s_jenis_produk`, `x_jenis_produk`, `y_jenis_produk`, `penanganan`, `w_penanganan`, `s_penanganan`, `x_penanganan`, `y_penanganan`, `klasifikasi`, `s_klasifikasi`, `x_klasifikasi`, `y_klasifikasi`, `tgl_inspeksi`, `s_tgl_inspeksi`, `x_tgl_inspeksi`, `y_tgl_inspeksi`, `berlaku_sampai`, `s_berlaku_sampai`, `x_berlaku_sampai`, `y_berlaku_sampai`, `dikeluarkan_di`, `s_dikeluarkan_di`, `x_dikeluarkan_di`, `y_dikeluarkan_di`, `tgl`, `s_tgl`, `x_tgl`, `y_tgl`, `kepala_upt`, `s_kepala_upt`, `x_kepala_upt`, `y_kepala_upt`, `head_of`, `s_head_of`, `x_head_of`, `y_head_of`) VALUES
(1, 'CPIB-001', 'CPIB 1', 'template.jpg', NULL, '1001/cpib 32/XI/2022', 14, 600, 475, 'Tb. Sinmatupang', 14, 600, 743, 'kjahds', 60, 14, 600, 840, 'Udang Asin', 14, 600, 937, 'alksdl', 75, 14, 600, 1033, 'aksjdh', 14, 600, 1128, '1 september 2022', 14, 600, 1224, '1 september 2023', 14, 420, 1612, 'cirebon', 14, 910, 1612, '1 september 2022', 14, 910, 1674, 'Rudy barmara', 16, 890, 1823, 'kuningan', 14, 1145, 1854),
(2, 'CPIB-002', 'CPIB 2', 'template1.jpg', NULL, '', 18, 580, 475, NULL, 18, 560, 743, NULL, 60, 18, 560, 840, NULL, 18, 560, 937, NULL, 60, 18, 560, 1033, NULL, 18, 560, 1128, NULL, 18, 560, 1224, NULL, 18, 389, 1580, NULL, 18, 910, 1580, NULL, 18, 910, 1674, NULL, 18, 890, 1823, NULL, 18, 1145, 1854),
(9, 'CPIB-004', 'CPIB-004', 'template111.jpg', 'preview-template111.jpg', '1001/cpib 32/XI/2022', 20, 580, 475, 'MP. AMBARITA', 20, 560, 745, 'JL. JENDRAL SUDIRMAN NO, 54 BANDUNG JAKARTA YOGYAKARTA SURABAYA KUNINGAN MAJALENGKA CIREBON', 45, 20, 560, 844, 'IKAN ASIN', 20, 560, 940, 'PENGECEKAN - SORTASI - PENYIMPANAN - PEMINJAMAN - JUDI ONLINE - BANGKAR - ANJAY - COBAIN', 45, 20, 560, 1035, 'SANGAT BAIK', 20, 560, 1130, '02 DESEMBER 2022', 20, 560, 1225, '02 DESEMBER 2026', 18, 390, 1580, 'CIREBON', 18, 900, 1580, '02 DESEMBER 2022', 18, 900, 1675, 'R. RUDI BARBARIAN', 20, 900, 1820, 'CIREBON', 18, 1150, 1855);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
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
  `avatar` text NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `kd_supplier`, `nama_miniplant`, `nama_pimpinan`, `no_telp`, `email`, `no_fax`, `alamat`, `avatar`) VALUES
(1, 'SPL-001', 'MP1', 'PMP1', '111', '111@email.com', '', 'jlasdkjksad', 'HAJAT_DESA_PAMFLET.png'),
(4, 'SPL-002', 'PT Coba', 'Wildan', '456', '456@456.com', '456', 'Jl. pahlawan no. 123 Sumber, Cirebon', 'default.jpg'),
(5, 'SPL-003', 'PT Hesoyam', 'JERI ', '678', '678@678.com', '', 'aoisjdlkajsldkjal sdaksjd lkajsldkjalks lkja slkdj ', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tim_inspeksi`
--

CREATE TABLE `tim_inspeksi` (
  `id` int(11) NOT NULL,
  `kd_tim_inspeksi` varchar(20) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `pimpinan_supplier` varchar(20) NOT NULL,
  `ketua_inspeksi` varchar(20) NOT NULL,
  `anggota1` varchar(20) NOT NULL,
  `anggota2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim_inspeksi`
--

INSERT INTO `tim_inspeksi` (`id`, `kd_tim_inspeksi`, `kd_pengajuan`, `pimpinan_supplier`, `ketua_inspeksi`, `anggota1`, `anggota2`) VALUES
(1, 'INS-001', 'REG-0001', 'PMP1', 'ADM-001', 'ADM-002', 'ADM-003'),
(2, 'INS-002', 'REG-0002', 'Wildan', 'ADM-001', 'ADM-002', 'ADM-003'),
(3, 'INS-003', 'REG-0003', 'PMP1', 'ADM-001', 'ADM-002', 'ADM-003'),
(4, 'INS-004', 'REG-0005', 'JERI ', 'ADM-001', 'ADM-002', NULL),
(5, 'INS-005', 'REG-0006', 'PMP1', 'ADM-001', 'ADM-002', 'ADM-003');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `kd_admin`, `kd_supplier`, `is_active`) VALUES
(1, 'Rangga', '123', '123@123.com', '202cb962ac59075b964b07152d234b70', 'ADM-001', '', 1),
(2, 'Jeri', '1234', '', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-002', '', 1),
(3, 'Wiky', '12345', '12345@1234.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ADM-003', '', 1),
(28, 'MP1', '111', '111@email.com', '698d51a19d8a121ce581499d7b701668', '', 'SPL-001', 1),
(31, 'PT Coba', '456', '456@456.com', '250cf8b51c773f3f8dc8b4be867a9a02', '', 'SPL-002', 1),
(32, 'PT Hesoyam', '678', '678@678.com', '9fe8593a8a330607d76796b35c64c600', '', 'SPL-003', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_isian`
--
ALTER TABLE `daftar_isian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_daftar_isian`
--
ALTER TABLE `kategori_daftar_isian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi_supplier`
--
ALTER TABLE `notifikasi_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penanganan`
--
ALTER TABLE `penanganan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_pengajuan` (`kd_pengajuan`),
  ADD KEY `kd_supplier` (`kd_supplier`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian_detail`
--
ALTER TABLE `penilaian_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian_notes`
--
ALTER TABLE `penilaian_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian_penanganan`
--
ALTER TABLE `penilaian_penanganan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbaikan`
--
ALTER TABLE `perbaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbaikan_detail`
--
ALTER TABLE `perbaikan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat_template`
--
ALTER TABLE `sertifikat_template`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `daftar_isian`
--
ALTER TABLE `daftar_isian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori_daftar_isian`
--
ALTER TABLE `kategori_daftar_isian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notifikasi_supplier`
--
ALTER TABLE `notifikasi_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian_detail`
--
ALTER TABLE `penilaian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `penilaian_notes`
--
ALTER TABLE `penilaian_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penilaian_penanganan`
--
ALTER TABLE `penilaian_penanganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `perbaikan_detail`
--
ALTER TABLE `perbaikan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sertifikat_template`
--
ALTER TABLE `sertifikat_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tim_inspeksi`
--
ALTER TABLE `tim_inspeksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
