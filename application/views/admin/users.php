<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Data User</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_user" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah User</button>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
              <th>Kode User</th>
              <th>Nama User</th>
              <th>Jenis Kelamin</th>
              <th>Alamat</th>
              <th>Jabatan</th>
              <th style="text-align:center;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($users as $adm) { ?>
              <tr>
                <td align="center"><?= $no++; ?></td>
                <td class="text-center"><span class="badge badge-white"><?= $adm['kd_admin']; ?></span></td>
                <td><?= $adm['nama_admin'] ?></td>
                <td><?= $adm['jenis_kelamin']; ?></td>
                <td><?= $adm['alamat']; ?></td>
                <td><?= $adm['jabatan']; ?></td>
                <td align="center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#detail_user<?= $adm['kd_admin']; ?>"><i class="fas fa-info-circle"></i></a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit_user<?= $adm['kd_admin'] ?>" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-target="#hapus_user<?= $adm['kd_admin'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
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

<!-- Modal tambah user -->
<div class="modal fade" id="tambah_user" tabindex="-1" role="dialog" aria-labelledby="tambah_userLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambah_userLabel">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('users/tambah') ?>" method="post">
        <div class="modal-body">
          <label for="kd_admin">Kode User :</label>
          <input type="text" name="kd_admin" id="kd_admin" class="form-control mb-3" value="<?= $kd_admin_auto; ?>" readonly>
          <label for="nama_admin">Nama User :</label>
          <input type="text" name="nama_admin" id="nama_admin" class="form-control mb-3" required>
          <label for="jenis_kelamin">Jenis Kelamin :</label>
          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control mb-3" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
          <label for="alamat">Alamat :</label>
          <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3" required></textarea>
          <label for="jabatan">Jabatan :</label><br>
          <select name="jabatan" id="jabatan" class="form-control mb-3" required>
            <option value="Administrator">Administrator</option>
            <option value="Pegawai">Pegawai</option>
          </select>

          <small>Info :
            <i>Data yang sudah di tambahkan akan segera muncul di dalam daftar nama user.
              <b>mohon di cek kembali data user yang ada demi menghindari duplikasi data / data
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

<?php foreach ($users as $adm) { ?>
  <div class="modal fade" id="detail_user<?= $adm['kd_admin']; ?>" tabindex="-1" role="dialog" aria-labelledby="detail_userLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detail_userLabel">Detail user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table border-bottom">
              <tr>
                <th scope="row">Kode User</th>
                <td>:</td>
                <td><?= $adm['kd_admin']; ?></td>
              </tr>
              <tr>
                <th scope="row">Nama User</th>
                <td>:</td>
                <td><?= $adm['nama_admin']; ?></td>
              </tr>
              <tr>
                <th scope="row">Jenis Kelamin</th>
                <td>:</td>
                <td><?= $adm['jenis_kelamin']; ?></td>
              </tr>
              <tr>
                <th scope="row">Alamat</th>
                <td>:</td>
                <td><?= $adm['alamat']; ?></td>
              </tr>
              <tr>
                <th scope="row">Jabatan</th>
                <td>:</td>
                <td><?= $adm['jabatan']; ?></td>
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

  <!-- Modal Edit User -->
  <div class="modal fade" id="edit_user<?= $adm['kd_admin'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_user<?= $adm['kd_admin'] ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit_user<?= $adm['kd_admin'] ?>Label">Ubah Data User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('users/ubah') ?>" method="post">
          <div class="modal-body">
            <label for="kd_admin">Kode User :</label>
            <input type="text" name="kd_admin" id="kd_admin" class="form-control mb-3" value="<?= $adm['kd_admin'] ?>" readonly>
            <label for="nama_admin">Nama User :</label>
            <input type="text" name="nama_admin" id="nama_admin" class="form-control mb-3" value="<?= $adm['nama_admin'] ?>" required>
            <label for=" jenis_kelamin">Jenis Kelamin :</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control mb-3" required>
              <option value="Laki-laki" <?= $adm['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
              <option value="Perempuan" <?= $adm['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
            <label for=" alamat">Alamat :</label>
            <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3" required><?= $adm['alamat'] ?></textarea>
            <label for="jabatan">Jabatan :</label><br>
            <select name="jabatan" id="jabatan" class="form-control mb-3" required>
              <option value="Administrator" <?= $adm['jabatan'] == 'Administrator' ? 'selected' : '' ?>>Administrator</option>
              <option value="Pegawai" <?= $adm['jabatan'] == 'Pegawai' ? 'selected' : '' ?>>Pegawai</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
            <input type="submit" value="Simpan Perubahan!" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Hapus user-->
  <div class="modal fade" id="hapus_user<?= $adm['kd_admin'] ?>" tabindex="-1" aria-labelledby="hapus_userLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapus_userLabel">Konfirmasi Hapus !!!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('users/hapus') ?>" method="post">
            <input type="hidden" name="kd_admin" id="kd_admin" value="<?= $adm['kd_admin'] ?>" readonly>
            Apakah Yakin Ingin Menghapus Data user Ini :<br>
            <b><?= $adm['kd_admin'] ?> - <?= $adm['nama_admin'] ?></b>
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