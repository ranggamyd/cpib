-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Des 2022 pada 07.28
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

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
  `no_reg` varchar(20) NOT NULL,
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

INSERT INTO `admin` (`id`, `kd_admin`, `no_reg`, `nama_admin`, `no_telp`, `email`, `jenis_kelamin`, `alamat`, `avatar`) VALUES
(1, 'ADM-001', 'REG-0021', 'Rangga', '123', '123@123.com', 'Laki-laki', 'rangga', '5f8ac77c52c298a335791ed2ca59cf751.jpg'),
(7, 'ADM-002', 'REG-0023', 'Jeri', '1234', '', 'Laki-laki', '', ''),
(8, 'ADM-003', '', 'Wiky', '12345', '', 'Laki-laki', '', '');

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
  `kd_pengajuan` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_produk`
--

INSERT INTO `jenis_produk` (`id`, `kd_pengajuan`, `kd_supplier`, `jenis_produk`) VALUES
(1, 'REG-0001', 'SPL-001', 'jp1'),
(2, 'REG-0002', 'SPL-002', 'jp2'),
(3, 'REG-0003', 'SPL-002', 'jp2'),
(4, 'REG-0004', 'SPL-001', 'Udang Segar'),
(5, 'REG-0005', 'SPL-004', 'Ikan Tuna');

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
(1, 'PNG-001', 'P1', ''),
(2, 'PNG-002', 'P2', ''),
(3, 'PNG-003', 'P3', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `kd_pengajuan` varchar(20) NOT NULL,
  `kd_supplier` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` enum('Tertunda','Dokumen tidak lengkap','Dalam proses Inspeksi','Lolos','Tidak Lolos') NOT NULL,
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
  `catatan` text DEFAULT NULL,
  `jml_minor` int(11) NOT NULL,
  `jml_mayor` int(11) NOT NULL,
  `jml_serius` int(11) NOT NULL,
  `jml_kritis` int(11) NOT NULL,
  `klasifikasi` enum('Sangat Baik','Baik','Cukup','Kurang','Tidak Valid') NOT NULL,
  `is_need_revisi` tinyint(1) NOT NULL,
  `status` enum('Perlu Revisi','Menunggu validasi perbaikan','Menunggu Sertifikat','Lolos','Tidak Lolos') NOT NULL
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
  `status` enum('Menunggu Validasi','Perlu revisi kembali','Lolos','Tidak Lolos') NOT NULL
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
-- Struktur dari tabel `sertifikat`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat_template`
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
-- Dumping data untuk tabel `sertifikat_template`
--

INSERT INTO `sertifikat_template` (`id`, `kd_sertifikat`, `nama_sertifikat`, `file_template`, `preview_template`, `no_surat`, `s_no_surat`, `x_no_surat`, `y_no_surat`, `supplier`, `s_supplier`, `x_supplier`, `y_supplier`, `alamat`, `w_alamat`, `s_alamat`, `x_alamat`, `y_alamat`, `jenis_produk`, `s_jenis_produk`, `x_jenis_produk`, `y_jenis_produk`, `penanganan`, `w_penanganan`, `s_penanganan`, `x_penanganan`, `y_penanganan`, `klasifikasi`, `s_klasifikasi`, `x_klasifikasi`, `y_klasifikasi`, `tgl_inspeksi`, `s_tgl_inspeksi`, `x_tgl_inspeksi`, `y_tgl_inspeksi`, `berlaku_sampai`, `s_berlaku_sampai`, `x_berlaku_sampai`, `y_berlaku_sampai`, `dikeluarkan_di`, `s_dikeluarkan_di`, `x_dikeluarkan_di`, `y_dikeluarkan_di`, `tgl`, `s_tgl`, `x_tgl`, `y_tgl`, `kepala_upt`, `s_kepala_upt`, `x_kepala_upt`, `y_kepala_upt`, `head_of`, `s_head_of`, `x_head_of`, `y_head_of`) VALUES
(1, 'CPIB-001', 'CPIB 1', 'template.jpg', NULL, '1001/cpib 32/XI/2022', 14, 600, 475, 'Tb. Sinmatupang', 14, 600, 743, 'kjahds', 60, 14, 600, 840, 'Udang Asin', 14, 600, 937, 'alksdl', 75, 14, 600, 1033, 'aksjdh', 14, 600, 1128, '1 september 2022', 14, 600, 1224, '1 september 2023', 14, 420, 1612, 'cirebon', 14, 910, 1612, '1 september 2022', 14, 910, 1674, 'Rudy barmara', 16, 890, 1823, 'kuningan', 14, 1145, 1854),
(2, 'CPIB-002', 'CPIB 2', 'template1.jpg', NULL, '', 18, 580, 475, NULL, 18, 560, 743, NULL, 60, 18, 560, 840, NULL, 18, 560, 937, NULL, 60, 18, 560, 1033, NULL, 18, 560, 1128, NULL, 18, 560, 1224, NULL, 18, 389, 1580, NULL, 18, 910, 1580, NULL, 18, 910, 1674, NULL, 18, 890, 1823, NULL, 18, 1145, 1854),
(9, 'CPIB-004', 'CPIB-004', 'template111.jpg', 'preview-template111.jpg', '1001/cpib 32/XI/2022', 20, 580, 475, 'MP. AMBARITA', 20, 560, 745, 'JL. JENDRAL SUDIRMAN NO, 54 BANDUNG JAKARTA YOGYAKARTA SURABAYA KUNINGAN MAJALENGKA CIREBON', 45, 20, 560, 844, 'IKAN ASIN', 20, 560, 940, 'PENGECEKAN - SORTASI - PENYIMPANAN - PEMINJAMAN - JUDI ONLINE - BANGKAR - ANJAY - COBAIN', 45, 20, 560, 1035, 'SANGAT BAIK', 20, 560, 1130, '02 DESEMBER 2022', 20, 560, 1225, '02 DESEMBER 2026', 18, 390, 1580, 'CIREBON', 18, 900, 1580, '02 DESEMBER 2022', 18, 900, 1675, 'R. RUDI BARBARIAN', 20, 900, 1820, 'CIREBON', 18, 1150, 1855);

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
(1, 'SPL-001', 'MP. H. Ta\'lim', 'H. Ta\'lim', '123456', '', '', 'Blok Lawang Gede RT 002 RW 002, Mertasinga, Gunungjati, Cirebon', ''),
(4, 'SPL-002', 'MP. Abdul Fattah', 'Abdul Fattah', '111', '', '', 'jalan jalan', ''),
(5, 'SPL-003', 'MP. MULIA JAYA', 'Babang Ganteng', '1234567', '', '', 'jl. jalan kemana saja', ''),
(6, 'SPL-004', 'MP. Alfalah', 'H. Apud', '0812', '', '', 'JL. Bandung No 57 JL. Bandung No 57 JL. Bandung No 57 MAJALAYA INDONESIA SUMATRA INDIA', '');

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
  `anggota2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Rangga', '123', '123@123.com', '202cb962ac59075b964b07152d234b70', 'ADM-001', '', 1),
(17, 'MP. H. Ta\'lim', '123456', '', 'e10adc3949ba59abbe56e057f20f883e', '', 'SPL-001', 1),
(18, 'Jeri', '1234', '', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-002', '', 1),
(19, 'Wiky', '12345', '', '827ccb0eea8a706c4c34a16891f84e7b', 'ADM-003', '', 1),
(23, 'MP. Abdul Fattah', '111', '', '698d51a19d8a121ce581499d7b701668', '', 'SPL-002', 1),
(24, 'MP. MULIA JAYA', '1234567', '', 'fcea920f7412b5da7be0cf42b8c93759', '', 'SPL-003', 0),
(25, 'MP. Alfalah', '0812', '', '669e40b854e5ed89bc374e62800f507d', '', 'SPL-004', 0);

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
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sertifikat_template`
--
ALTER TABLE `sertifikat_template`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `jenis_produk`
--
ALTER TABLE `jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori_daftar_isian`
--
ALTER TABLE `kategori_daftar_isian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `penanganan`
--
ALTER TABLE `penanganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaian_detail`
--
ALTER TABLE `penilaian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaian_notes`
--
ALTER TABLE `penilaian_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaian_penanganan`
--
ALTER TABLE `penilaian_penanganan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perbaikan`
--
ALTER TABLE `perbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perbaikan_detail`
--
ALTER TABLE `perbaikan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sertifikat_template`
--
ALTER TABLE `sertifikat_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tim_inspeksi`
--
ALTER TABLE `tim_inspeksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
