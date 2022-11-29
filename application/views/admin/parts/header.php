<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?> - CPIB BKIPM Cirebon</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/vendor/magnific-popup/magnific-popup.css">
    <link rel="shortcut icon" href="<?= base_url('assets') ?>/img/logo_bkipm2.png">

    <!-- Perpage CSS -->
    <?php if (isset($style['css'])) : ?>
        <link rel="stylesheet" href="<?= base_url('assets') ?>/css/<?= $style['css'] ?>">
    <?php endif ?>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets') ?>/img/logo_bkipm2.png" width="40">
                </div>
                <div class="sidebar-brand-text mx-3">CPIB BKIPM</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Sertifikasi CPIB</div>
            <li class="nav-item <?= ($this->uri->segment(1) == 'pengajuan') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('pengajuan') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Permohonan Sertifikasi</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'penilaian') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('penilaian') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Penilaian Ajuan</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'perbaikan') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('perbaikan') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Perbaikan Ajuan</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'sertifikat') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('sertifikat') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Sertifikat CPIB</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Master Data</div>
            <li class="nav-item <?= ($this->uri->segment(1) == 'daftar_isian') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('daftar_isian') ?>">
                    <i class="far fa-fw fa-file-alt"></i>
                    <span>Daftar Isian</span>
                </a>
            </li>

            <!-- <li class="nav-item <?= ($this->uri->segment(1) == 'jenis_produk') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('jenis_produk') ?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Jenis Produk</span>
                </a>
            </li> -->

            <li class="nav-item <?= ($this->uri->segment(1) == 'penanganan') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('penanganan') ?>">
                    <i class="fas fa-fw fa-exchange-alt"></i>
                    <span>Tahapan Penanganan</span>
                </a>
            </li>

            <li class="nav-item <?= ($this->uri->segment(1) == 'sertifikat_template') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('sertifikat_template') ?>">
                    <i class="fas fa-fw fa-medal"></i>
                    <span>Template Sertifikat</span>
                </a>
            </li>

            <li class="nav-item <?= ($this->uri->segment(1) == 'suppliers') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('suppliers') ?>">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Supplier Terdaftar</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'tim_inspeksi') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('tim_inspeksi') ?>">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Daftar Tim Inspeksi</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'users') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('users') ?>">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Pengguna (Administrator)</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">Lainnya</div>
            <li class="nav-item <?= ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == '') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('user') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil Saya</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(2) == 'setting') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('user/setting') ?>">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Pengaturan Akun</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link py-2" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Log Out</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link py-2 dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link py-2 dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                $this->db->join('admin', 'admin.kd_admin = users.kd_admin');
                                $user = $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row()
                                ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= strtok($user->nama_admin, ' ') ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/' . $user->avatar) ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('user') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil Saya
                                </a>
                                <a class="dropdown-item" href="<?= base_url('user/setting') ?>">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pengaturan Akun
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->