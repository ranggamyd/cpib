<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Daftar Pengguna</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_user"><i class="fas fa-plus-circle mr-2"></i>Tambah Pengguna</button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
              <th>Kode Pengguna</th>
              <th>No Reg</th>
              <th>Nama Lengkap</th>
              <th>No. Telepon</th>
              <th>Email</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($users as $item) :
            ?>
              <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><span class="badge badge-white"><?= $item['kd_admin']; ?></span></td>
                <td class="text-center"><span class="badge badge-white"><?= $item['no_reg']; ?></span></td>
                <td><?= $item['nama_admin'] ?></td>
                <td><?= $item['no_telp']; ?></td>
                <td><?= $item['email']; ?></td>
                <td class="text-center">
                  <div class="btn-group" role="group" aria-label="Opsi">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#detail_user-<?= $item['kd_admin']; ?>" data-toggle="tooltip" data-placement="right" title="Detail Pengguna"><i class="fas fa-info-circle"></i></a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit_user-<?= $item['kd_admin'] ?>" data-toggle="tooltip" data-placement="right" title="Edit Pengguna"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="<?= base_url('users/hapus/') . $item['kd_admin'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus pengguna?')" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus Pengguna"><i class="fas fa-trash-alt"></i></a>
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

<!-- Modal tambah user -->
<div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="tambah_userLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah_userLabel">Tambah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('users/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <label for="kd_admin">Kode Pengguna :</label>
              <input type="text" name="kd_admin" value="<?= set_value('kd_admin', $kd_admin_auto) ?>" class="form-control mb-3 <?= form_error('kd_admin') ? 'is-invalid' : '' ?>" id="kd_admin" readonly required>
              <div id='kd_admin' class='invalid-feedback'>
                <?= form_error('kd_admin') ?>
              </div>
            </div>
            <div class="col-md-6">
              <label for="no_reg">No Reg :</label>
              <input type="text" name="no_reg" value="<?= set_value('no_reg') ?>" class="form-control mb-3 <?= form_error('no_reg') ? 'is-invalid' : '' ?>" id="no_reg" required>
              <div id='no_reg' class='invalid-feedback'>
                <?= form_error('no_reg') ?>
              </div>
            </div>
          </div>
          <label for="nama_admin">Nama Lengkap :</label>
          <input type="text" name="nama_admin" value="<?= set_value('nama_admin') ?>" class="form-control mb-3 <?= form_error('nama_admin') ? 'is-invalid' : '' ?>" id="nama_admin" required>
          <div id='nama_admin' class='invalid-feedback'>
            <?= form_error('nama_admin') ?>
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
              <label for="email">Email :</label>
              <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control mb-3 <?= form_error('email') ? 'is-invalid' : '' ?>" id="email">
              <div id='email' class='invalid-feedback'>
                <?= form_error('email') ?>
              </div>
            </div>
          </div>
          <label for="jenis_kelamin">Jenis Kelamin :</label>
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control mb-3">
            <option value="Laki-laki" <?= set_select('jenis_kelamin', 'Laki-laki') ?>>Laki-laki</option>
            <option value="Perempuan" <?= set_select('jenis_kelamin', 'Perempuan') ?>>Perempuan</option>
          </select>
          <label for="alamat">Alamat :</label>
          <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3"><?= set_value('alamat') ?></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <input type="submit" value="Tambahkan" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($users as $item) : ?>
  <!-- Modal detail user -->
  <div class="modal fade" id="detail_user-<?= $item['kd_admin']; ?>" tabindex="-1" role="dialog" aria-labelledby="detail_user-<?= $item['kd_admin']; ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detail_user-<?= $item['kd_admin']; ?>Label">Detail user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table border-bottom">
              <tr>
                <th scope="row">Kode Pengguna</th>
                <td>:</td>
                <td><?= $item['kd_admin']; ?></td>
              </tr>
              <tr>
                <th scope="row">No Reg</th>
                <td>:</td>
                <td><?= $item['no_reg']; ?></td>
              </tr>
              <tr>
                <th scope="row">Nama Lengkap</th>
                <td>:</td>
                <td><?= $item['nama_admin']; ?></td>
              </tr>
              <tr>
                <th scope="row">No. Telepon</th>
                <td>:</td>
                <td><?= $item['no_telp']; ?></td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td>:</td>
                <td><?= $item['email']; ?></td>
              </tr>
              <tr>
                <th scope="row">Jenis Kelamin</th>
                <td>:</td>
                <td><?= $item['jenis_kelamin']; ?></td>
              </tr>
              <tr>
                <th scope="row">Alamat</th>
                <td>:</td>
                <td><?= $item['alamat']; ?></td>
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

  <!-- Modal edit user -->
  <div class="modal fade" id="edit_user-<?= $item['kd_admin'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_user-<?= $item['kd_admin'] ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit_user-<?= $item['kd_admin'] ?>Label">Perbarui Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('users/ubah') ?>" method="post">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <label for="kd_admin">Kode Pengguna :</label>
                <input type="text" name="kd_admin" value="<?= set_value('kd_admin', $item['kd_admin']) ?>" class="form-control mb-3 <?= form_error('kd_admin') ? 'is-invalid' : '' ?>" id="kd_admin" readonly required>
                <div id='kd_admin' class='invalid-feedback'>
                  <?= form_error('kd_admin') ?>
                </div>
              </div>
              <div class="col-md-6">
                <label for="no_reg">No Reg :</label>
                <input type="text" name="no_reg" value="<?= set_value('no_reg', $item['no_reg']) ?>" class="form-control mb-3 <?= form_error('no_reg') ? 'is-invalid' : '' ?>" id="no_reg" required>
                <div id='no_reg' class='invalid-feedback'>
                  <?= form_error('no_reg') ?>
                </div>
              </div>
            </div>
            <label for="nama_admin">Nama Lengkap :</label>
            <input type="text" name="nama_admin" value="<?= set_value('nama_admin', $item['nama_admin']) ?>" class="form-control mb-3 <?= form_error('nama_admin', $item['nama_admin']) ? 'is-invalid' : '' ?>" id="nama_admin" required>
            <div id='nama_admin' class='invalid-feedback'>
              <?= form_error('nama_admin') ?>
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
                <label for="email">Email :</label>
                <input type="email" name="email" value="<?= set_value('email', $item['email']) ?>" class="form-control mb-3 <?= form_error('email') ? 'is-invalid' : '' ?>" id="email">
                <div id='email' class='invalid-feedback'>
                  <?= form_error('email') ?>
                </div>
              </div>
            </div>
            <label for="jenis_kelamin">Jenis Kelamin :</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control mb-3">
              <option value="Laki-laki" <?= set_select('jenis_kelamin', 'Laki-laki', $item['jenis_kelamin'] == 'Laki-laki' ? TRUE : FALSE) ?>>Laki-laki</option>
              <option value="Perempuan" <?= set_select('jenis_kelamin', 'Perempuan', $item['jenis_kelamin'] == 'Perempuan' ? TRUE : FALSE) ?>>Perempuan</option>
            </select>
            <label for="alamat">Alamat :</label>
            <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3"><?= set_value('alamat', $item['alamat']) ?></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
            <input type="submit" value="Simpan Perubahan" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach ?>

</div>