<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Tim Inspeksi</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#buat_tim_inspeksi" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Buat Tim</button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
              <th>Kode Tim Inspeksi</th>
              <th>Pimpinan Supplier</th>
              <th>Ketua Inspeksi</th>
              <th>Anggota 1</th>
              <th>Anggota 2</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($tim_inspeksi as $ti) { ?>
              <tr>
                <td align="center"><?= $no++; ?></td>
                <td class="text-center"><span class="badge badge-white"><?= $ti['kd_tim_inspeksi']; ?></span></td>
                <td><?= $ti['nama_supplier'] ?></td>
                <td><?= $this->db->get_where('admin', ['kd_admin' => $ti['ketua_inspeksi']])->row('nama_admin'); ?></td>
                <td><?= $this->db->get_where('admin', ['kd_admin' => $ti['anggota1']])->row('nama_admin'); ?></td>
                <td><?= $this->db->get_where('admin', ['kd_admin' => $ti['anggota2']])->row('nama_admin'); ?></td>
                <td align="center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#detail_tim_inspeksi<?= $ti['kd_tim_inspeksi']; ?>"><i class="fas fa-info-circle"></i></a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit_tim_inspeksi<?= $ti['kd_tim_inspeksi'] ?>" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-target="#hapus_tim_inspeksi<?= $ti['kd_tim_inspeksi'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal tambah tim_inspeksi -->
<div class="modal fade" id="buat_tim_inspeksi" tabindex="-1" role="dialog" aria-labelledby="buat_tim_inspeksiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="buat_tim_inspeksiLabel">Buat Tim Inspeksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('tim_inspeksi/tambah') ?>" method="post">
        <div class="modal-body">
          <label for="kd_tim_inspeksi">Kode Tim_inspeksi :</label>
          <input type="text" name="kd_tim_inspeksi" id="kd_tim_inspeksi" class="form-control mb-3 <?= form_error('kd_tim_inspeksi') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_tim_inspeksi', $kd_tim_inspeksi_auto) ?>" readonly required>
          <div id='kd_tim_inspeksi' class='invalid-feedback'>
            <?= form_error('kd_tim_inspeksi') ?>
          </div>
          <label for="pimpinan_supplier">Pimpinan Supplier :</label>
          <select name="pimpinan_supplier" id="pimpinan_supplier" class="form-control mb-3 <?= form_error('pimpinan_supplier') ? 'is-invalid' : '' ?>" required>
            <option selected disabled></option>
            <?php foreach ($suppliers as $sup) : ?>
              <option value="<?= $sup['kd_supplier'] ?>" <?= set_select('kd_supplier', $sup['kd_supplier']); ?>><?= $sup['nama_supplier'] ?></option>
            <?php endforeach ?>
          </select>
          <div id='pimpinan_supplier' class='invalid-feedback'>
            <?= form_error('pimpinan_supplier') ?>
          </div>
          <div class="row">
            <div class="col">
              <label for="ketua_inspeksi">Ketua Inspeksi :</label>
              <select name="ketua_inspeksi" id="ketua_inspeksi" class="form-control mb-3 <?= form_error('ketua_inspeksi') ? 'is-invalid' : '' ?>" required>
                <option selected disabled></option>
                <?php foreach ($admin as $adm) : ?>
                  <option value="<?= $adm['kd_admin'] ?>" <?= set_select('kd_admin', $adm['kd_admin']); ?>><?= $adm['nama_admin'] ?></option>
                <?php endforeach ?>

              </select>
            </div>
            <div class="col">
              <label for="anggota1">Anggota 1 :</label>
              <select name="anggota1" id="anggota1" class="form-control mb-3 <?= form_error('anggota1') ? 'is-invalid' : '' ?>" required>
                <option selected disabled></option>
                <?php foreach ($admin as $adm) : ?>
                  <option value="<?= $adm['kd_admin'] ?>" <?= set_select('kd_admin', $adm['kd_admin']); ?>><?= $adm['nama_admin'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col">
              <label for="anggota2">Ketua Inspeksi :</label>
              <select name="anggota2" id="anggota2" class="form-control mb-3 <?= form_error('anggota2') ? 'is-invalid' : '' ?>" required>
                <option selected disabled></option>
                <?php foreach ($admin as $adm) : ?>
                  <option value="<?= $adm['kd_admin'] ?>" <?= set_select('kd_admin', $adm['kd_admin']); ?>><?= $adm['nama_admin'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <small>Info :
            <i>Data yang sudah di tambahkan akan segera muncul di dalam daftar Pimpinan Supplier.
              <b>mohon di cek kembali data tim_inspeksi yang ada demi menghindari duplikasi data / data
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

<?php foreach ($tim_inspeksi as $ti) { ?>
  <div class="modal fade" id="detail_tim_inspeksi<?= $ti['kd_tim_inspeksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="detail_tim_inspeksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detail_tim_inspeksiLabel">Detail tim_inspeksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table border-bottom">
              <tr>
                <th scope="row">Kode Tim_inspeksi</th>
                <td>:</td>
                <td><?= $ti['kd_tim_inspeksi']; ?></td>
              </tr>
              <tr>
                <th scope="row">Pimpinan Supplier</th>
                <td>:</td>
                <td><?= $ti['pimpinan_supplier']; ?></td>
              </tr>
              <tr>
                <th scope="row">Ketua Inspeksi</th>
                <td>:</td>
                <td><?= $ti['ketua_inspeksi']; ?></td>
              </tr>
              <tr>
                <th scope="row">Jenis Produk</th>
                <td>:</td>
                <td><?= $ti['jenis_produk']; ?></td>
              </tr>
              <tr>
                <th scope="row">anggota1</th>
                <th scope="row">anggota2</th>
                <td>:</td>
                <td><?= $ti['anggota1']; ?></td>
                <td><?= $ti['anggota2']; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit Tim_inspeksi -->
  <div class="modal fade" id="edit_tim_inspeksi<?= $ti['kd_tim_inspeksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_tim_inspeksi<?= $ti['kd_tim_inspeksi'] ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit_tim_inspeksi<?= $ti['kd_tim_inspeksi'] ?>Label">Ubah Data Tim_inspeksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('tim_inspeksi/ubah') ?>" method="post">
          <div class="modal-body">
            <label for="kd_tim_inspeksi">Kode Tim_inspeksi :</label>
            <input type="text" name="kd_tim_inspeksi" id="kd_tim_inspeksi" class="form-control mb-3 <?= form_error('kd_tim_inspeksi') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_tim_inspeksi', $ti['kd_tim_inspeksi']) ?>" readonly>
            <div id='kd_tim_inspeksi' class='invalid-feedback'>
              <?= form_error('kd_tim_inspeksi') ?>
            </div>
            <label for="pimpinan_supplier">Pimpinan Supplier :</label>
            <input type="text" name="pimpinan_supplier" id="pimpinan_supplier" class="form-control mb-3 <?= form_error('pimpinan_supplier') ? 'is-invalid' : '' ?>" value="<?= set_value('pimpinan_supplier', $ti['pimpinan_supplier']) ?>" required>
            <div id='pimpinan_supplier' class='invalid-feedback'>
              <?= form_error('pimpinan_supplier') ?>
            </div>
            <div class="row">
              <div class="col">
                <label for="ketua_inspeksi">Ketua Inspeksi :</label>
                <input type="text" name="ketua_inspeksi" id="ketua_inspeksi" class="form-control mb-3 <?= form_error('ketua_inspeksi') ? 'is-invalid' : '' ?>" value="<?= set_value('ketua_inspeksi', $ti['ketua_inspeksi']) ?>" required>
                <div id='ketua_inspeksi' class='invalid-feedback'>
                  <?= form_error('ketua_inspeksi') ?>
                </div>
              </div>
              <div class="col">
                <label for="kd_jenis_produk[]">Jenis Produk :</label>
                <select name="kd_jenis_produk[]" multiple id="kd_jenis_produk[]" class="form-control mb-3 <?= form_error('kd_jenis_produk[]') ? 'is-invalid' : '' ?>" required>
                  <?php foreach ($jenis_produk as $jp) : ?>
                    <option value="<?= $jp['kd_jenis_produk'] ?>" <?= set_select('kd_jenis_produk[]', $jp['kd_jenis_produk']); ?>><?= $jp['jenis_produk'] ?></option>
                  <?php endforeach ?>
                </select>
                <div id='kd_jenis_produk[]' class='invalid-feedback'>
                  <?= form_error('kd_jenis_produk[]') ?>
                </div>
              </div>
            </div>
            <label for=" anggota1">anggota1 :</label>
            <label for=" anggota1">anggota1 :</label>
            <label for=" anggota2">anggota2 :</label>
            <textarea name="anggota1" id="anggota1" rows="4" class="form-control mb-3"><?= set_value('anggota1', $ti['anggota1']) ?></textarea>
            <textarea name="anggota1" id="anggota1" rows="4" class="form-control mb-3"><?= set_value('anggota1', $ti['anggota1']) ?></textarea>
            <textarea name="anggota1" id="anggota1" rows="4" class="form-control mb-3"><?= set_value('anggota1', $ti['anggota1']) ?></textarea>
            <textarea name="anggota1" id="anggota1" rows="4" class="form-control mb-3"><?= set_value('anggota1', $ti['anggota1']) ?></textarea>
            <textarea name="anggota2" id="anggota2" rows="4" class="form-control mb-3"><?= set_value('anggota2', $ti['anggota2']) ?></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
            <input type="submit" value="Simpan Perubahan!" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Hapus tim_inspeksi-->
  <div class="modal fade" id="hapus_tim_inspeksi<?= $ti['kd_tim_inspeksi'] ?>" tabindex="-1" aria-labelledby="hapus_tim_inspeksiLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapus_tim_inspeksiLabel">Konfirmasi Hapus !!!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('tim_inspeksi/hapus') ?>" method="post">
            <input type="hidden" name="kd_tim_inspeksi" id="kd_tim_inspeksi" value="<?= $ti['kd_tim_inspeksi'] ?>" readonly>
            Apakah Yakin Ingin Menghapus Data tim_inspeksi Ini :<br>
            <b><?= $ti['kd_tim_inspeksi'] ?> - <?= $ti['pimpinan_supplier'] ?></b>
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