<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Jenis Produk</h1>
  <hr>

  <button class="btn btn-sm shadow btn-primary mb-3" data-toggle="modal" data-target="#tambah_jenis_produk" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Jenis Produk</button>
  <div class="row">
    <?php
    $no = 1;
    $colors = ["bg-primary","bg-success","bg-danger","bg-warning", "badge-info"];
    foreach ($jenis_produk as $jp) {
    ?>
      <div class="col-4">
        <div class="card shadow mb-4">
          <a href="#<?= $jp['kd_jenis_produk'] ?>" class="d-block card-header <?= $colors[array_rand($colors)] ?> py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="<?= $jp['kd_jenis_produk'] ?>">
            <h6 class="m-0 font-weight-bold text-light"><?= $jp['jenis_produk'] ?></h6>
          </a>
          <!-- Card Content - Collapse -->
          <div class="collapse" id="<?= $jp['kd_jenis_produk'] ?>">
            <div class="card-body bg-light">
              <?= $jp['deskripsi'] ?>
              <div class="text-right">
                <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#edit_jenis_produk<?= $jp['kd_jenis_produk'] ?>" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-edit"></i></a>
                <a href="#" data-toggle="modal" data-target="#hapus_jenis_produk<?= $jp['kd_jenis_produk'] ?>" class="badge badge-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<!-- Modal tambahjenis produk -->
<div class="modal fade" id="tambah_jenis_produk" tabindex="-1" role="dialog" aria-labelledby="tambah_jenis_produkLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah_jenis_produkLabel">Tambah Jenis Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('jenis_produk/tambah') ?>" method="post">
        <div class="modal-body">
          <label for="kd_jenis_produk">Kode Jenis Produk :</label>
          <input type="text" name="kd_jenis_produk" id="kd_jenis_produk" class="form-control mb-3 <?= form_error('kd_jenis_produk') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_jenis_produk', $kd_jenis_produk_auto); ?>" readonly required>
          <div id='kd_jenis_produk' class='invalid-feedback'>
            <?= form_error('kd_jenis_produk') ?>
          </div>
          <label for="jenis_produk">Jenis Produk :</label>
          <input type="text" name="jenis_produk" value="<?= set_value('jenis_produk') ?>" id="jenis_produk" class="form-control mb-3 <?= form_error('jenis_produk') ? 'is-invalid' : '' ?>" required>
          <div id='jenis_produk' class='invalid-feedback'>
            <?= form_error('jenis_produk') ?>
          </div>
          <label for="deskripsi">Deskripsi :</label>
          <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control mb-3"><?= set_value('deskripsi') ?></textarea>

          <small>Info :
            <i>Data yang sudah di tambahkan akan segera muncul di dalam daftar Jenis Produk.
              <b>mohon di cek kembali Jenis produk yang ada demi menghindari duplikasi data / data
                ganda
              </b>
            </i>
          </small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <input type="submit" value="Tambahkan !!!!" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($jenis_produk as $jp) { ?>
  <!-- Modal EditJenis Produk -->
  <div class="modal fade" id="edit_jenis_produk<?= $jp['kd_jenis_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_jenis_produk<?= $jp['kd_jenis_produk'] ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit_jenis_produk<?= $jp['kd_jenis_produk'] ?>Label">Ubah Jenis Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('jenis_produk/ubah') ?>" method="post">
          <div class="modal-body">
            <label for="kd_jenis_produk">Kode Jenis Produk :</label>
            <input type="text" name="kd_jenis_produk" id="kd_jenis_produk" class="form-control mb-3 <?= form_error('kd_jenis_produk') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_jenis_produk', $jp['kd_jenis_produk']) ?>" readonly required>
            <div id='kd_jenis_produk' class='invalid-feedback'>
              <?= form_error('kd_jenis_produk') ?>
            </div>
            <label for="jenis_produk">Jenis Produk :</label>
            <input type="text" name="jenis_produk" id="jenis_produk" class="form-control mb-3" value="<?= set_value('jenis_produk', $jp['jenis_produk']) ?>" required>
            <div id='jenis_produk' class='invalid-feedback'>
              <?= form_error('jenis_produk') ?>
            </div>
            <label for="deskripsi">Deskripsi :</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control mb-3"><?= set_value('deskripsi', $jp['deskripsi']) ?></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
            <input type="submit" value="Simpan Perubahan!" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Hapusjenis produk-->
  <div class="modal fade" id="hapus_jenis_produk<?= $jp['kd_jenis_produk'] ?>" tabindex="-1" aria-labelledby="hapus_jenis_produkLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapus_jenis_produkLabel">Konfirmasi Hapus !!!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('jenis_produk/hapus') ?>" method="post">
            <input type="hidden" name="kd_jenis_produk" id="kd_jenis_produk" value="<?= $jp['kd_jenis_produk'] ?>" readonly>
            Apakah Yakin Ingin Menghapus Jenis produk Ini :<br>
            <b><?= $jp['kd_jenis_produk'] ?> - <?= $jp['jenis_produk'] ?></b>
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