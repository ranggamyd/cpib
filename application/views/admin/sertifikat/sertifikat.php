<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Sertifikat</h1>
  <hr>

  <button class="btn btn-sm shadow btn-primary mb-3" data-toggle="modal" data-target="#tambah_sertifikat" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Sertifikat</button>
  <div class="row">
    <?php
    $no = 1;
    $colors = ["bg-primary", "bg-success", "bg-danger", "bg-warning", "badge-info"];
    foreach ($sertifikat as $item) {
    ?>
      <div class="col-4">
        <div class="card shadow mb-4">
          <a href="#<?= $item['kd_sertifikat'] ?>" class="d-block card-header <?= $colors[array_rand($colors)] ?> py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="<?= $item['kd_sertifikat'] ?>">
            <h6 class="m-0 font-weight-bold text-light"><?= $item['nama_sertifikat'] ?></h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse" id="<?= $item['kd_sertifikat'] ?>">
            <div class="card-body bg-light">
              <img src="<?= base_url('assets/sertifikat/template/') . $item['file_template'] ?>" class="img-thumbnail w-100" alt="Template Sertifikat">
              <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="<?= base_url('assets/sertifikat/template/') . $item['file_template'] ?>" target="__blank" class="btn btn-flat btn-sm text-primary"><i class="fas fa-download mr-2"></i>Download Template</a>
                <div class="">
                  <a href="<?= base_url('sertifikat/edit/') . $item['kd_sertifikat'] ?>" class="badge badge-primary" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-fw fa-edit"></i></a>
                  <a href="<?= base_url('sertifikat/hapus/') . $item['kd_sertifikat'] ?>" class="badge badge-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<!-- Modal tambahSertifikat -->
<div class="modal fade" id="tambah_sertifikat" tabindex="-1" role="dialog" aria-labelledby="tambah_sertifikatLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah_sertifikatLabel">Tambah Sertifikat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('sertifikat/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <label for="kd_sertifikat">Kode Sertifikat :</label>
          <input type="text" name="kd_sertifikat" id="kd_sertifikat" class="form-control mb-3 <?= form_error('kd_sertifikat') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_sertifikat', $kd_sertifikat_auto); ?>" readonly required>
          <div id='kd_sertifikat' class='invalid-feedback'>
            <?= form_error('kd_sertifikat') ?>
          </div>
          <label for="nama_sertifikat">Nama Sertifikat :</label>
          <input type="text" name="nama_sertifikat" value="<?= set_value('nama_sertifikat') ?>" id="nama_sertifikat" class="form-control mb-3 <?= form_error('nama_sertifikat') ? 'is-invalid' : '' ?>" required>
          <div id='nama_sertifikat' class='invalid-feedback'>
            <?= form_error('nama_sertifikat') ?>
          </div>
          <label for="file_template">Upload Template :</label>
          <input type="file" name="file_template" class="form-control-file <?= form_error('file_template') ? 'is-invalid' : '' ?>" accept="image/*" id="file-Template" required>
          <div id='file_template' class='invalid-feedback'>
            <?= form_error('file_template') ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <input type="submit" value="Tambahkan" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>
</div>