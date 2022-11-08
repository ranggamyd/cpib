<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Profil Saya</h1>
  <hr>

  <div class="row">
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-body text-center">
          <img src="<?= base_url() . 'assets/img/' . $user->avatar; ?>" class="rounded-circle" width="200" height="200" alt="" style="object-fit: cover;">
        </div>
        <button type="button" class="btn btn-primary mx-5" data-toggle="modal" data-target="#edit_avatar" id="#myBtn" data-dismiss="modal"><i class="fas fa-camera fa-fw"></i> Perbarui foto</button>
        <hr>
        <h4 class="text-center"><?= $user->name ?></h4>
        <p class="text-center mb-4"><?= $user->jabatan ?></p>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table border-bottom">
              <tr>
                <th scope="row">Kode Admin</th>
                <td>:</td>
                <td><?= $user->kd_admin; ?></td>
              </tr>
              <tr>
                <th scope="row">Nama Lengkap</th>
                <td>:</td>
                <td><?= $user->name; ?></td>
              </tr>
              <tr>
                <th scope="row">Jenis Kelamin</th>
                <td>:</td>
                <td><?= $user->jenis_kelamin; ?></td>
              </tr>
              <tr>
                <th scope="row">Alamat</th>
                <td>:</td>
                <td><?= $user->alamat; ?></td>
              </tr>
              <tr>
                <th scope="row">Jabatan</th>
                <td>:</td>
                <td><?= $user->jabatan; ?></td>
              </tr>
            </table>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#edit_user" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-edit"></i> Edit Profil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal Edit Gambar -->
<div class="modal fade" id="edit_avatar" tabindex="-1" role="dialog" aria-labelledby="edit_userLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_userLabel">Ubah Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('user/ubah_avatar') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body text-center">
          <input type="hidden" name="kd_admin" value="<?= set_value('kd_admin', $user->kd_admin) ?>" id="kd_admin" class="form-control mb-3 <?= form_error('kd_admin') ? 'is-invalid' : '' ?>" readonly required>
          <img src="<?= base_url() . 'assets/img/' . $user->avatar; ?>" class="rounded-circle" width="200" height="200" alt="" style="object-fit: cover;"><br>
          <label for=""> PILIH AVATAR</label>
          <input type="file" class="form-control-file" name="avatar" id="avatar">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
          <input type="submit" value="Simpan Perubahan!" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit Profile -->
<div class="modal fade" id="edit_user" tabindex="-1" role="dialog" aria-labelledby="edit_userLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_userLabel">Ubah Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('user/ubah_profil') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col border-right-primary">
              <label for="kd_admin">Kode Admin :</label>
              <input type="text" name="kd_admin" value="<?= set_value('kd_admin', $user->kd_admin) ?>" id="kd_admin" class="form-control mb-3 <?= form_error('kd_admin') ? 'is-invalid' : '' ?>" readonly required>
              <div id="kd_admin" class="invalid-feedback">
                <?= form_error('kd_admin') ?>
              </div>
              <label for="nama_admin">Nama Lengkap :</label>
              <input type="text" name="nama_admin" value="<?= set_value('nama_admin', $user->nama_admin) ?>" id="nama_admin" class="form-control mb-3 <?= form_error('nama_admin') ? 'is-invalid' : '' ?>" required>
              <div id="nama_admin" class="invalid-feedback">
                <?= form_error('nama_admin') ?>
              </div>
              <label for="jabatan">Jabatan :</label><br>
              <select name="jabatan" id="jabatan" class="form-control mb-3" <?= form_error('jabatan') ? 'is-invalid' : '' ?> required>
                <option value="Administrator" <?= set_select('jabatan', 'Administrator', $user->jabatan == 'Administrator' ? TRUE : FALSE) ?>>Administrator</option>
                <option value="Inspektur" <?= set_select('jabatan', 'Inspektur', $user->jabatan == 'Inspektur' ? TRUE : FALSE) ?>>Inspektur</option>
              </select>
              <div id="jabatan" class="invalid-feedback">
                <?= form_error('jabatan') ?>
              </div>
              <label for=" jenis_kelamin">Jenis Kelamin :</label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control mb-3">
                <option value="Laki-laki" <?= set_select('jenis_kelamin', 'Laku-laki', $user->jenis_kelamin == 'Laku-laki' ? TRUE : FALSE) ?>>Laki-laki</option>
                <option value="Perempuan" <?= set_select('jenis_kelamin', 'Perempuan', $user->jenis_kelamin == 'Perempuan' ? TRUE : FALSE) ?>>Perempuan</option>
              </select>
              <label for=" alamat">Alamat :</label>
              <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3"><?= set_value('alamat', $user->alamat) ?></textarea>
            </div>
            <div class="col">
              <label for="username">Username :</label>
              <input type="text" name="username" value="<?= set_value('username', $user->username) ?>" id="username" class="form-control mb-3 <?= form_error('username') ? 'is-invalid' : '' ?>" required>
              <div id="username" class="invalid-feedback">
                <?= form_error('username') ?>
              </div>
              <label for="phone">No. Telepon :</label>
              <input type="text" name="phone" value="<?= set_value('phone', $user->phone) ?>" id="phone" class="form-control mb-3  <?= form_error('phone') ? 'is-invalid' : '' ?>" required>
              <div id="phone" class="invalid-feedback">
                <?= form_error('phone') ?>
              </div>
              <label for="email">Email :</label>
              <input type="email" name="email" value="<?= set_value('email', $user->email) ?>" id="email" class="form-control mb-3  <?= form_error('email') ? 'is-invalid' : '' ?>" required>
              <div id="email" class="invalid-feedback">
                <?= form_error('email') ?>
              </div>
              <div class="bg-secondary p-3 text-light rounded">
                <label for="avatar">Foto Profil :</label>
                <input type="file" name="avatar" id="avatar" class="form-control-file mb-4">
                <div class="row">
                  <div class="col">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control mb-3">
                  </div>
                  <!-- <div class="col">
                  </div>
                  <div class="col">
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" name="password2" id="password" class="form-control mb-3 <?= form_error('password2') ? 'is-invalid' : '' ?>">
                    <div id="password2" class="invalid-feedback text-warning">
                      <?= form_error('password2') ?>
                    </div>
                  </div> -->
                </div>
                <h6 class="text-warning text-right">*Kosongkan jika tidak ada perubahan</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
          <input type="submit" value="Simpan Perubahan!" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>