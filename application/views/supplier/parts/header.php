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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard_supplier') ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('assets') ?>/img/logo_bkipm2.png" width="40">
                </div>
                <div class="sidebar-brand-text mx-3">CPIB BKIPM</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('dashboard_supplier') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Sertifikasi CPIB</div>
            <li class="nav-item <?= ($this->uri->segment(1) == 'pengajuan_supplier') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('pengajuan_supplier') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Permohonan Sertifikasi</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'penilaian_supplier') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('penilaian_supplier') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Penilaian Ajuan</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'perbaikan_supplier') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('perbaikan_supplier') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Perbaikan Ajuan</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'sertifikat_supplier') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('sertifikat_supplier') ?>">
                    <i class="fas fa-fw fa-list"></i>
                    <span>Sertifikat CPIB</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">Lainnya</div>

            <li class="nav-item <?= ($this->uri->segment(1) == 'notifikasi') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('notifikasi_supplier') ?>">
                    <i class="fas fa-fw fa-bell"></i>
                    <span>Notifikasi</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(1) == 'user_supplier') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('user_supplier') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil Saya</span>
                </a>
            </li>
            <li class="nav-item <?= ($this->uri->segment(2) == 'setting') ? 'active' : ''; ?>">
                <a class="nav-link py-2" href="<?= base_url('user_supplier/setting') ?>">
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
                        <?php
                        $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier', 'left');
                        $supplier = $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row();
                        $this->db->select('notifikasi_supplier.*, suppliers.nama_miniplant, suppliers.nama_pimpinan, suppliers.no_telp, suppliers.alamat, suppliers.avatar, users.is_active');
                        $this->db->join('suppliers', 'suppliers.kd_supplier=notifikasi_supplier.kd_supplier');
                        $this->db->join('users', 'users.kd_supplier=suppliers.kd_supplier');
                        $this->db->order_by('datetime', 'desc');
                        $this->db->limit(3);
                        $unread_notifikasi = $this->db->get_where('notifikasi_supplier', ['is_read' => 0, 'notifikasi_supplier.kd_supplier' => $supplier->kd_supplier])->result_array();
                        $total_unread_notifikasi = $this->db->get_where('notifikasi_supplier', ['is_read' => 0, 'notifikasi_supplier.kd_supplier' => $supplier->kd_supplier])->num_rows();
                        ?>
                        <?php if ($total_unread_notifikasi >= 1) : ?>
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link py-2 dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw text-secondary"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter" id="totalNotif"><?= $total_unread_notifikasi; ?></span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Notifikasi <i class="fas fa-bell ml-2"></i>
                                    </h6>
                                    <?php foreach ($unread_notifikasi as $item) : ?>
                                        <a href="<?= base_url('notifikasi_supplier/detail/') . $item['id']; ?>" class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="mr-3">
                                                <img src="<?= base_url('assets/img/') . $item['avatar']; ?>" alt="" class="rounded-circle" width="45" height="45" style="object-fit: cover;">
                                            </div>
                                            <div>
                                                <?= $item['pesan']; ?>
                                                <div class="small text-gray-500"><?= date('d M Y : H:i', strtotime($item['datetime'])); ?></div>
                                            </div>
                                        </a>
                                    <?php endforeach; ?>
                                    <a class="dropdown-item text-center small text-gray-500" href="<?= base_url('notifikasi_supplier') ?>">Tampilkan semua notifikasi</a>
                                </div>
                            </li>
                        <?php endif ?>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link py-2 dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                $this->db->join('suppliers', 'suppliers.kd_supplier = users.kd_supplier');
                                $user = $this->db->get_where('users', ['users.id' => $this->session->userdata('id')])->row()
                                ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= strtok($user->nama_miniplant, ' ') ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/' . $user->avatar) ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('user_supplier') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil Saya
                                </a>
                                <a class="dropdown-item" href="<?= base_url('user_supplier/setting') ?>">
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