CREATE TABLE `daftar_isian` (
  `id` int(11) NOT NULL,
  `kd_daftar_isian` varchar(20) NOT NULL,
  `nama_isian` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

INSERT INTO
  `daftar_isian` (
    `id`,
    `kd_daftar_isian`,
    `nama_isian`,
    `deskripsi`
  )
VALUES
  (1, 'CKS-001', 'KEAMANAN AIR DAN ES', ''),
  (
    2,
    'CKS-002',
    'PERMUKAAN YANG KONTAK LANGSUNG DENGAN PRODUK',
    ''
  ),
  (
    3,
    'CKS-003',
    'PENCEGAHAN KONTAMINASI SILANG',
    ''
  ),
  (4, 'CKS-004', 'FASILITAS SANITASI', ''),
  (
    5,
    'CKS-005',
    'PELABELAN, PENYIMPANAN DAN PENGGUNAAN BAHAN KIMIA ',
    ''
  ),
  (
    6,
    'CKS-006',
    'KESEHATAN DAN KEBERSIHAN KARYAWAN',
    ''
  ),
  (
    7,
    'CKS-007',
    'PENGENDALIAN PEST (PEST CONTROL)',
    ''
  ),
  (8, 'CKS-008', 'PENGENDALIAN PROSES', ''),
  (9, 'CKS-009', 'PENGEMASAN DAN PELABELAN', ''),
  (10, 'CKS-010', 'PENYIMPANAN', ''),
  (11, 'CKS-011', 'DISTRIBUSI / TRANSPORTASI', ''),
  (12, 'CKS-012', 'MONITORING', ''),
  (13, 'CKS-013', 'REKAMAN', '');

CREATE TABLE `sub_daftar_isian` (
  `id` int(11) NOT NULL,
  `kd_daftar_isian` varchar(20) NOT NULL,
  `nama_subisian` varchar(255) NOT NULL,
  `is_mayor` tinyint(1) NOT NULL,
  `is_minor` tinyint(1) NOT NULL,
  `is_serius` tinyint(1) NOT NULL,
  `is_kritis` tinyint(1) NOT NULL,
  `acuan` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table `sub_daftar_isian`
--
INSERT INTO
  `sub_daftar_isian` (
    `id`,
    `kd_daftar_isian`,
    `nama_subisian`,
    `is_mayor`,
    `is_minor`,
    `is_serius`,
    `is_kritis`,
    `acuan`
  )
VALUES
  (
    1,
    'CKS-001',
    'Pasokan air tidak memadai dan tidak aman untuk digunakan',
    0,
    0,
    1,
    1,
    'Persyaratan air dan es untuk penanganan dan pengolahan hasil perikanan'
  ),
  (
    2,
    'CKS-001',
    'Memungkinkan terjadinya kontaminasi antara air bersih dan air kotor',
    0,
    0,
    1,
    0,
    'Persyaratan air dan es untuk penanganan dan pengolahan hasil perikanan'
  ),
  (
    3,
    'CKS-001',
    'Es tidak dibuat, ditangani atau digunakan dengan cara yang bersih',
    0,
    0,
    1,
    1,
    'Persyaratan air dan es untuk penanganan dan pengolahan hasil perikanan'
  ),
  (
    4,
    'CKS-002',
    'Peralatan, perlengkapan, dan fasilitas yang kontak langsung dengan produk memungkinkan terjadinya kontaminasi.',
    0,
    0,
    1,
    1,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F. 3'
  ),
  (
    5,
    'CKS-003',
    'Cara penanganan tidak mencegah terjadinya kontaminasi silang',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013,Bab II.F. 2b3'
  ),
  (
    6,
    'CKS-003',
    'Limbah tidak ditangani dengan baik dan dapat menyebabkan kontaminasi silang.',
    0,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II'
  ),
  (
    7,
    'CKS-003',
    'Konstruksi dan lay out tidak dirancang untuk mencegah kontaminasi silang.',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b2'
  ),
  (
    8,
    'CKS-004',
    'Jumlah, desain dan fasilitas toilet tidak memadai dan berhubungan langsung dengan ruang proses',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b7a'
  ),
  (
    9,
    'CKS-004',
    'Jumlah, lokasi, desain dan fasilitas pencuci tangan tidak memadai.',
    0,
    0,
    1,
    1,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b7d'
  ),
  (
    10,
    'CKS-004',
    'Bak cuci kaki tidak tersedia, tidak sesuai, tidak menggunakan air bersih dan tidak didefinisikan **)',
    0,
    0,
    1,
    1,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b7c'
  ),
  (
    11,
    'CKS-005',
    'Bahan-bahan kimia berbahaya tidak diberi label dengan benar',
    1,
    0,
    0,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1e'
  ),
  (
    12,
    'CKS-005',
    'Bahan-bahan kimia tidak disimpan ditempat yang terpisahdari ruang proses dan tidak terkunci serta digunakan atau ditangani dengan cara yang tidak benar.',
    0,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b8'
  ),
  (
    13,
    'CKS-006',
    'Tingkah laku karyawan yang menangani produk tidak menjaga kebersihan individu dan tidak menggunakan pakaian kerja yang sesuai.',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.g\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.3'
  ),
  (
    14,
    'CKS-006',
    'Unit supplier/pengumpul/ tidak mempunyai sistem yang dapat mencegah karyawan berpenyakit menangani produk',
    0,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.h\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.4'
  ),
  (
    15,
    'CKS-007',
    'Unit supplier/pengumpul tidak mempunyai tindakan pencegahan terhadap masuknya hewan pengganggu',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b5'
  ),
  (
    16,
    'CKS-007',
    'Unit supplier/pengumpul tidak memiliki tindakan menghilangkan hewan pengganggu dari unit pengolahan',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.2b5'
  ),
  (
    17,
    'CKS-008',
    'Tidak dilakukan pengendalian dan pemantauan terhadap mutu dan keamanan bahan baku, bahan tambahan dan bahan penolong selama penanganan/pengolahan',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.5'
  ),
  (
    18,
    'CKS-008',
    'Tidak dilakukan pengendalian dan pemantauan terhadap suhu selama penanganan/pengolahan',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.d\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1g\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1h'
  ),
  (
    19,
    'CKS-008',
    'Penanganan atau pengolahan tidak dilakukan dengan teknologi yang sesuai',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.5'
  ),
  (
    20,
    'CKS-009',
    'Bahan pengemas dan label/kode terbuat dari bahan yang tidak mencemari, tidak dapat melindungi dan dapat merubah karakteristik produk',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.6b'
  ),
  (
    21,
    'CKS-009',
    'pengemasan tidak dilakukan secara higienis',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.6a'
  ),
  (
    22,
    'CKS-009',
    'Pelabelan tidak memenuhi persyaratan',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.6f'
  ),
  (
    23,
    'CKS-009',
    'Tidak dilakukan pelabelan yang memadai terhadap produk hasil perikanan yang dapat membahayakan kesehatan manusia(alergen, beracun, bahan tambahan makanan, dsb)',
    1,
    0,
    0,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1c\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1d\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.6g'
  ),
  (
    24,
    'CKS-010',
    'Penyimpanan produk akhir tidak mampu menjamin suhu sesuai dengan spesifikasi produk',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.D\r\nNOMOR 52 A/KEPMEN-KP/2013, Bab II.F.1g'
  ),
  (
    25,
    'CKS-011',
    'Pengangkutan produk tidak menjamin suhu sesuai dengan spesifikasi produk',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.G'
  ),
  (
    26,
    'CKS-012',
    'Monitoring tidak diterapkan',
    0,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.7b'
  ),
  (
    27,
    'CKS-012',
    'Tindakan koreksi tidak dilakukan ',
    1,
    0,
    1,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.7b'
  ),
  (
    28,
    'CKS-013',
    'Rekaman data tidak tersedia',
    1,
    0,
    0,
    0,
    'NOMOR 52 A/KEPMEN-KP/2013, Bab II.F.7b'
  );