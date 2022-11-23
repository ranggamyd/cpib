<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tahapan Penanganan</h1>
    <hr>

    <button class="btn btn-sm shadow btn-primary mb-3" data-toggle="modal" data-target="#tambah_penanganan" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Penanganan</button>
    <div class="row">
        <?php
        $no = 1;
        $colors = ["bg-primary", "bg-success", "bg-danger", "bg-warning", "badge-info"];
        foreach ($penanganan as $item) {
        ?>
            <div class="col-4">
                <div class="card shadow mb-4">
                    <a href="#<?= $item['kd_penanganan'] ?>" class="d-block card-header <?= $colors[array_rand($colors)] ?> py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="<?= $item['kd_penanganan'] ?>">
                        <h6 class="m-0 font-weight-bold text-light"><?= $item['nama_penanganan'] ?></h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse" id="<?= $item['kd_penanganan'] ?>">
                        <div class="card-body bg-light">
                            <?= $item['deskripsi'] ?>
                            <div class="text-right">
                                <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#edit_penanganan-<?= $item['kd_penanganan'] ?>" data-toggle="tooltip" data-placement="right" title="Perbarui Penanganan"><i class="fa fa-fw fa-edit"></i></a>
                                <a href="<?= base_url('penanganan/hapus/') . $item['kd_penanganan'] ?>" class="badge badge-danger" data-toggle="tooltip" data-placement="right" title="Hapus Penanganan"><i class="fas fa-trash-alt"></i></a>
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
                    <label for="nama_penanganan">Nama Penanganan :</label>
                    <input type="text" name="nama_penanganan" value="<?= set_value('nama_penanganan') ?>" id="nama_penanganan" class="form-control mb-3 <?= form_error('nama_penanganan') ? 'is-invalid' : '' ?>" required>
                    <div id='nama_penanganan' class='invalid-feedback'>
                        <?= form_error('nama_penanganan') ?>
                    </div>
                    <label for="deskripsi">Deskripsi :</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control mb-3"><?= set_value('deskripsi') ?></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                    <input type="submit" value="Tambahkan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($penanganan as $item) { ?>
    <!-- Modal EditPenanganan -->
    <div class="modal fade" id="edit_penanganan-<?= $item['kd_penanganan'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_penanganan-<?= $item['kd_penanganan'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_penanganan-<?= $item['kd_penanganan'] ?>Label">Ubah Penanganan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('penanganan/ubah') ?>" method="post">
                    <div class="modal-body">
                        <label for="kd_penanganan">Kode Penanganan :</label>
                        <input type="text" name="kd_penanganan" id="kd_penanganan" class="form-control mb-3 <?= form_error('kd_penanganan') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_penanganan', $item['kd_penanganan']) ?>" readonly required>
                        <div id='kd_penanganan' class='invalid-feedback'>
                            <?= form_error('kd_penanganan') ?>
                        </div>
                        <label for="nama_penanganan">Nama Penanganan :</label>
                        <input type="text" name="nama_penanganan" id="nama_penanganan" class="form-control mb-3" value="<?= set_value('nama_penanganan', $item['nama_penanganan']) ?>" required>
                        <div id='nama_penanganan' class='invalid-feedback'>
                            <?= form_error('nama_penanganan') ?>
                        </div>
                        <label for="deskripsi">Deskripsi :</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control mb-3"><?= set_value('deskripsi', $item['deskripsi']) ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                        <input type="submit" value="Simpan Perubahan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

</div>