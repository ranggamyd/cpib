<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tahapan Penanganan</h1>
    <hr>

    <button class="btn btn-sm shadow btn-primary mb-3" data-toggle="modal" data-target="#tambah_penanganan" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Penanganan</button>
    <div class="row">
        <?php
        $no = 1;
        $colors = ["bg-primary", "bg-success", "bg-danger", "bg-warning", "badge-info"];
        foreach ($penanganan as $png) {
        ?>
            <div class="col-4">
                <div class="card shadow mb-4">
                    <a href="#<?= $png['kd_penanganan'] ?>" class="d-block card-header <?= $colors[array_rand($colors)] ?> py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="<?= $png['kd_penanganan'] ?>">
                        <h6 class="m-0 font-weight-bold text-light"><?= $png['tahap_penanganan'] ?></h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="<?= $png['kd_penanganan'] ?>">
                        <div class="card-body bg-light">
                            <?= $png['deskripsi'] ?>
                            <div class="text-right">
                                <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#edit_penanganan<?= $png['kd_penanganan'] ?>" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-edit"></i></a>
                                <a href="#" data-toggle="modal" data-target="#hapus_penanganan<?= $png['kd_penanganan'] ?>" class="badge badge-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Modal tambahPenanganan -->
<div class="modal fade" id="tambah_penanganan" tabindex="-1" role="dialog" aria-labelledby="tambah_penangananLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_penangananLabel">Tambah Penanganan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('penanganan/tambah') ?>" method="post">
                <div class="modal-body">
                    <label for="kd_penanganan">Kode Penanganan :</label>
                    <input type="text" name="kd_penanganan" id="kd_penanganan" class="form-control mb-3 <?= form_error('kd_penanganan') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_penanganan', $kd_penanganan_auto); ?>" readonly required>
                    <div id='kd_penanganan' class='invalid-feedback'>
                        <?= form_error('kd_penanganan') ?>
                    </div>
                    <label for="tahap_penanganan">Tahap Penanganan :</label>
                    <input type="text" name="tahap_penanganan" value="<?= set_value('tahap_penanganan') ?>" id="tahap_penanganan" class="form-control mb-3 <?= form_error('tahap_penanganan') ? 'is-invalid' : '' ?>" required>
                    <div id='tahap_penanganan' class='invalid-feedback'>
                        <?= form_error('tahap_penanganan') ?>
                    </div>
                    <label for="deskripsi">Deskripsi :</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control mb-3"><?= set_value('deskripsi') ?></textarea>

                    <!-- <small>Info :
                        <i>Data yang sudah di tambahkan akan segera muncul di dalam daftar Penanganan.
                            <b>mohon di cek kembali Penanganan yang ada demi menghindari duplikasi data / data
                                ganda
                            </b>
                        </i>
                    </small> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                    <input type="submit" value="Tambahkan !!!!" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($penanganan as $png) { ?>
    <!-- Modal EditPenanganan -->
    <div class="modal fade" id="edit_penanganan<?= $png['kd_penanganan'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_penanganan<?= $png['kd_penanganan'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_penanganan<?= $png['kd_penanganan'] ?>Label">Ubah Penanganan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('penanganan/ubah') ?>" method="post">
                    <div class="modal-body">
                        <label for="kd_penanganan">Kode Penanganan :</label>
                        <input type="text" name="kd_penanganan" id="kd_penanganan" class="form-control mb-3 <?= form_error('kd_penanganan') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_penanganan', $png['kd_penanganan']) ?>" readonly required>
                        <div id='kd_penanganan' class='invalid-feedback'>
                            <?= form_error('kd_penanganan') ?>
                        </div>
                        <label for="tahap_penanganan">Tahap Penanganan :</label>
                        <input type="text" name="tahap_penanganan" id="tahap_penanganan" class="form-control mb-3" value="<?= set_value('tahap_penanganan', $png['tahap_penanganan']) ?>" required>
                        <div id='tahap_penanganan' class='invalid-feedback'>
                            <?= form_error('tahap_penanganan') ?>
                        </div>
                        <label for="deskripsi">Deskripsi :</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control mb-3"><?= set_value('deskripsi', $png['deskripsi']) ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                        <input type="submit" value="Simpan Perubahan!" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal HapusPenanganan-->
    <div class="modal fade" id="hapus_penanganan<?= $png['kd_penanganan'] ?>" tabindex="-1" aria-labelledby="hapus_penangananLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapus_penangananLabel">Konfirmasi Hapus !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('penanganan/hapus') ?>" method="post">
                        <input type="hidden" name="kd_penanganan" id="kd_penanganan" value="<?= $png['kd_penanganan'] ?>" readonly>
                        Apakah Yakin Ingin Menghapus Penanganan Ini :<br>
                        <b><?= $png['kd_penanganan'] ?> - <?= $png['tahap_penanganan'] ?></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>