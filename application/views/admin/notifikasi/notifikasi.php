<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Notifikasi <i class="fas fa-bell ml-2"></i></h1>
    </div>
    <hr>
    <div class="card shadow mb-4">
        <div class="card-header pb-0 border-bottom-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">Semua Notifikasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="unread-tab" data-toggle="tab" href="#unread" role="tab" aria-controls="unread" aria-selected="false">Belum Dibaca</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" id="hapus-tab" data-toggle="tab" href="#hapus" role="tab" aria-controls="hapus" aria-selected="false">Dihapus</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <?php foreach ($notifikasi as $item) : ?>
                        <a href="#" class="d-block btn btn-flat text-left alert alert-<?= $item['is_read'] == 0 ? 'secondary' : 'light' ?> border" role="alert" data-toggle="modal" data-target="#detail-<?= $item['id']; ?>" id="notif-<?= $item['id'] ?>">
                            <div class="row">
                                <div class="col-md-1 col-3 d-flex align-items-center justify-content-center"><img src="<?= base_url('assets/img/') . $item['avatar']; ?>" alt="" class="rounded-circle" width="75" height="75" style="object-fit: cover;"></div>
                                <div class="col d-flex justify-content-start flex-column">
                                    <?php if ($item['type'] == 'registrasi') : ?>
                                        <h4 class="alert-heading font-weight-bold">Pendaftar Baru !</h4>
                                    <?php elseif ($item['type'] == 'pengajuan') : ?>
                                        <h4 class="alert-heading font-weight-bold">Pengajuan Baru !</h4>
                                    <?php elseif ($item['type'] == 'perbaikan') : ?>
                                        <h4 class="alert-heading font-weight-bold">Validasi Perbaikan !</h4>
                                    <?php elseif ($item['type'] == 'sertifikat') : ?>
                                        <h4 class="alert-heading font-weight-bold">Generate Sertifikat !</h4>
                                    <?php endif ?>
                                    <p class="mb-0"><?= $item['pesan']; ?></p>
                                    <small class="float-right"><?= date('d M Y : H:i', strtotime($item['datetime'])); ?></small>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                </div>
                <div class="tab-pane fade" id="unread" role="tabpanel" aria-labelledby="unread-tab">
                    <?php foreach ($unread_notifikasi as $item) : ?>
                        <a href="#" class="d-block btn btn-flat text-left alert alert-<?= $item['is_read'] == 0 ? 'secondary' : 'light' ?> border" role="alert" data-toggle="modal" data-target="#detail-<?= $item['id']; ?>" id="notif-<?= $item['id'] ?>">
                            <div class="row">
                                <div class="col-md-1 col-3 d-flex align-items-center justify-content-center"><img src="<?= base_url('assets/img/') . $item['avatar']; ?>" alt="" class="rounded-circle" width="75" height="75" style="object-fit: cover;"></div>
                                <div class="col d-flex justify-content-start flex-column">
                                    <?php if ($item['type'] == 'registrasi') : ?>
                                        <h4 class="alert-heading font-weight-bold">Pendaftar Baru !</h4>
                                    <?php elseif ($item['type'] == 'pengajuan') : ?>
                                        <h4 class="alert-heading font-weight-bold">Pengajuan Baru !</h4>
                                    <?php elseif ($item['type'] == 'perbaikan') : ?>
                                        <h4 class="alert-heading font-weight-bold">Validasi Perbaikan !</h4>
                                    <?php elseif ($item['type'] == 'sertifikat') : ?>
                                        <h4 class="alert-heading font-weight-bold">Generate Sertifikat !</h4>
                                    <?php endif ?>
                                    <p class="mb-0"><?= $item['pesan']; ?></p>
                                    <small class="float-right"><?= date('d M Y : H:i', strtotime($item['datetime'])); ?></small>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                </div>
                <!-- <div class="tab-pane fade" id="read" role="tabpanel" aria-labelledby="read-tab"></div> -->
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- </div> -->
<!-- End of Main Content -->

<?php foreach ($notifikasi as $item) : ?>
    <div class="modal fade" id="detail-<?= $item['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="detail-<?= $item['id']; ?>Label" aria-hidden="true" data-is_read="<?= $item['is_read']; ?>" data-url="<?= base_url('notifikasi/read'); ?>" data-id="<?= $item['id']; ?>">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detail-<?= $item['id']; ?>Label"><i class="fas fa-bell mr-2"></i>Notifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card shadow h-100">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <a href="<?= base_url() . 'assets/img/' . $item['avatar']; ?>" class="imgPopup"><img src="<?= base_url() . 'assets/img/' . $item['avatar']; ?>" class="rounded-circle" width="170" height="170" alt="" style="object-fit: cover;"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table border-bottom">
                                            <tr>
                                                <th scope="row">Mini Plant</th>
                                                <td>:</td>
                                                <td><?= $item['nama_miniplant']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Pimpinan Supplier</th>
                                                <td>:</td>
                                                <td><?= $item['nama_pimpinan']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">No. Telepon</th>
                                                <td>:</td>
                                                <td><?= $item['no_telp']; ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Alamat</th>
                                                <td>:</td>
                                                <td><?= $item['alamat']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="card shadow py-3 container">
                                <h4 class="text-center mb-3"><?= $item['pesan']; ?></h4>
                                <?php if ($item['type'] == 'registrasi') : ?>
                                    <a href="<?= base_url('suppliers/activation/') . $item['kd_supplier'] ?>" onclick="return confirm('Apakah anda yakin ingin mengaktifkan Supplier ?')" class="btn btn-primary <?= $item['is_active'] == 1 ? 'disabled' : '' ?>" data-toggle="tooltip" data-placement="right" title="Nonaktifkan Supplier?">Aktifkan Supplier</a>
                                <?php elseif ($item['type'] == 'pengajuan') : ?>
                                    <a href="<?= base_url('pengajuan/detail/') . $item['kd_pengajuan'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Detail Pengajuan">Lihat Pengajuan</a>
                                <?php elseif ($item['type'] == 'perbaikan') : ?>
                                    <a href="<?= base_url('perbaikan/detail/') . $item['kd_perbaikan'] ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Detail Perbaikan">Lihat Perbaikan</a>
                                <?php elseif ($item['type'] == 'sertifikat') : ?>
                                    <?php $is_generated = $this->db->get_where('sertifikat', ['kd_penilaian' => $item['kd_penilaian']])->row() ? 1 : 0; ?>
                                    <a href="<?= base_url('sertifikat/generate/') . $item['kd_penilaian'] ?>" class="btn btn-primary <?= $is_generated == 1 ? 'disabled' : '' ?>" data-toggle="tooltip" data-placement="right" title="Generate Sertifikat">Generate Sertifikat</a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
</div>