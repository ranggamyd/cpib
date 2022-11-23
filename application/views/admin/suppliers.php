<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Supplier Terdaftar</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_supplier"><i class="fas fa-plus-circle mr-2"></i>Tambah Supplier</button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
              <th>Kode Supplier</th>
              <th>Mini Plant</th>
              <th>Pimpinan Supplier</th>
              <th>No. Telepon</th>
              <th>Email</th>
              <th>No. Faximile</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($suppliers as $item) : ?>
              <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><span class="badge badge-white"><?= $item['kd_supplier']; ?></span></td>
                <td><?= $item['nama_miniplant'] ?></td>
                <td><?= $item['nama_pimpinan'] ?></td>
                <td><?= $item['no_telp'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['no_fax'] ?></td>
                <td class="text-center">
                  <?php if ($item['is_active'] == 1) : ?>
                    <a href="<?= base_url('suppliers/activation/') . $item['kd_supplier'] ?>" onclick="return confirm('Apakah anda yakin ingin mengaktifkan Supplier ?')" class="badge badge-sm badge-success" data-toggle="tooltip" data-placement="right" title="Nonaktifkan Supplier?">Aktif</a>
                  <?php else : ?>
                    <a href="<?= base_url('suppliers/activation/') . $item['kd_supplier'] ?>" onclick="return confirm('Apakah anda yakin ingin menonaktifkan Supplier ?')" class="badge badge-sm badge-danger" data-toggle="tooltip" data-placement="right" title="Aktifkan Supplier?">Nonaktif</a>
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <div class="btn-group" role="group" aria-label="Opsi">
                    <a href="<?= base_url('suppliers/detail/' . $item['kd_supplier']) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Detail Supplier"><i class="fas fa-info-circle"></i></a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit_supplier-<?= $item['kd_supplier'] ?>" data-toggle="tooltip" data-placement="right" title="Edit Pengguna"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="<?= base_url('suppliers/hapus/' . $item['kd_supplier']) ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus Pengguna"><i class="fas fa-trash-alt"></i></a>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal tambah supplier -->
<div class="modal fade" id="tambah_supplier" tabindex="-1" role="dialog" aria-labelledby="tambah_supplierLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah_supplierLabel">Tambah Supplier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('suppliers/tambah') ?>" method="post">
        <div class="modal-body">
          <label for="kd_supplier">Kode Supplier :</label>
          <input type="text" name="kd_supplier" value="<?= set_value('kd_supplier', $kd_supplier_auto) ?>" class="form-control mb-3 <?= form_error('kd_supplier') ? 'is-invalid' : '' ?>" id="kd_supplier" readonly required>
          <div id='kd_supplier' class='invalid-feedback'>
            <?= form_error('kd_supplier') ?>
          </div>
          <label for="nama_miniplant">Mini Plant :</label>
          <input type="text" name="nama_miniplant" value="<?= set_value('nama_miniplant') ?>" class="form-control mb-3 <?= form_error('nama_miniplant') ? 'is-invalid' : '' ?>" id="nama_miniplant" required>
          <div id='nama_miniplant' class='invalid-feedback'>
            <?= form_error('nama_miniplant') ?>
          </div>
          <label for="nama_pimpinan">Pimpinan Supplier :</label>
          <input type="text" name="nama_pimpinan" value="<?= set_value('nama_pimpinan') ?>" class="form-control mb-3 <?= form_error('nama_pimpinan') ? 'is-invalid' : '' ?>" id="nama_pimpinan" required>
          <div id='nama_pimpinan' class='invalid-feedback'>
            <?= form_error('nama_pimpinan') ?>
          </div>
          <div class="row">
            <div class="col">
              <label for="no_telp">No. Telepon :</label>
              <input type="text" name="no_telp" value="<?= set_value('no_telp') ?>" class="form-control mb-3 <?= form_error('no_telp') ? 'is-invalid' : '' ?>" id="no_telp" required>
              <div id='no_telp' class='invalid-feedback'>
                <?= form_error('no_telp') ?>
              </div>
            </div>
            <div class="col">
              <label for="no_fax">No. Faximile :</label>
              <input type="text" name="no_fax" value="<?= set_value('no_fax') ?>" class="form-control mb-3 <?= form_error('no_fax') ? 'is-invalid' : '' ?>" id="no_fax">
              <div id='no_fax' class='invalid-feedback'>
                <?= form_error('no_fax') ?>
              </div>
            </div>
            <div class="col">
              <label for="email">Email :</label>
              <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control mb-3 <?= form_error('email') ? 'is-invalid' : '' ?>" id="email">
              <div id='email' class='invalid-feedback'>
                <?= form_error('email') ?>
              </div>
            </div>
          </div>
          <label for="alamat">Alamat :</label>
          <textarea name="alamat" rows="4" class="form-control mb-3" id="alamat"><?= set_value('alamat') ?></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <input type="submit" value="Tambahkan" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($suppliers as $item) { ?>
  <!-- Modal Edit Supplier -->
  <div class="modal fade" id="edit_supplier-<?= $item['kd_supplier'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_supplier-<?= $item['kd_supplier'] ?>Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit_supplier-<?= $item['kd_supplier'] ?>Label">Perbarui Supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('suppliers/ubah') ?>" method="post">
          <div class="modal-body">
            <label for="kd_supplier">Kode Supplier :</label>
            <input type="text" name="kd_supplier" value="<?= set_value('kd_supplier', $item['kd_supplier']) ?>" class="form-control mb-3 <?= form_error('kd_supplier') ? 'is-invalid' : '' ?>" id="kd_supplier" readonly required>
            <div id='kd_supplier' class='invalid-feedback'>
              <?= form_error('kd_supplier') ?>
            </div>
            <label for="nama_miniplant">Mini Plant :</label>
            <input type="text" name="nama_miniplant" value="<?= set_value('nama_miniplant', $item['nama_miniplant']) ?>" class="form-control mb-3 <?= form_error('nama_miniplant') ? 'is-invalid' : '' ?>" id="nama_miniplant" required>
            <div id='nama_miniplant' class='invalid-feedback'>
              <?= form_error('nama_miniplant') ?>
            </div>
            <label for="nama_pimpinan">Pimpinan Supplier :</label>
            <input type="text" name="nama_pimpinan" value="<?= set_value('nama_pimpinan', $item['nama_pimpinan']) ?>" class="form-control mb-3 <?= form_error('nama_pimpinan') ? 'is-invalid' : '' ?>" id="nama_pimpinan" required>
            <div id='nama_pimpinan' class='invalid-feedback'>
              <?= form_error('nama_pimpinan') ?>
            </div>
            <div class="row">
              <div class="col">
                <label for="no_telp">No. Telepon :</label>
                <input type="text" name="no_telp" value="<?= set_value('no_telp', $item['no_telp']) ?>" class="form-control mb-3 <?= form_error('no_telp') ? 'is-invalid' : '' ?>" id="no_telp" required>
                <div id='no_telp' class='invalid-feedback'>
                  <?= form_error('no_telp') ?>
                </div>
              </div>
              <div class="col">
                <label for="no_fax">No. Faximile :</label>
                <input type="text" name="no_fax" value="<?= set_value('no_fax', $item['no_fax']) ?>" class="form-control mb-3 <?= form_error('no_fax') ? 'is-invalid' : '' ?>" id="no_fax">
                <div id='no_fax' class='invalid-feedback'>
                  <?= form_error('no_fax') ?>
                </div>
              </div>
              <div class="col">
                <label for="email">Email :</label>
                <input type="email" name="email" value="<?= set_value('email', $item['email']) ?>" class="form-control mb-3 <?= form_error('email') ? 'is-invalid' : '' ?>" id="email">
                <div id='email' class='invalid-feedback'>
                  <?= form_error('email') ?>
                </div>
              </div>
            </div>
            <label for="alamat">Alamat :</label>
            <textarea name="alamat" rows="4" class="form-control mb-3" id="alamat"><?= set_value('alamat', $item['alamat']) ?></textarea>
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