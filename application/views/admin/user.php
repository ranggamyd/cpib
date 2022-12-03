<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Profil Saya</h1>
  <hr>

  <div class="row">
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-body text-center">
          <a class="imgPopup" href="<?= base_url() . 'assets/img/' . $user->avatar; ?>">
            <img src="<?= base_url() . 'assets/img/' . $user->avatar; ?>" class="rounded-circle" width="200" height="200" alt="Avatar" style="object-fit: cover;">
          </a>
        </div>
        <button type="button" class="btn btn-primary mx-5" data-toggle="modal" data-target="#edit_avatar"><i class="fas fa-camera fa-fw"></i> Perbarui Avatar</button>
        <hr>
        <h4 class="text-center"><?= $user->name ?></h4>
        <p class="text-center mb-4"><?= $user->email ? $user->email : $user->phone ?></p>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table border-bottom">
              <tr>
                <th scope="row">Kode Pengguna</th>
                <td>:</td>
                <td><?= $user->kd_admin; ?></td>
              </tr>
              <tr>
                <th scope="row">Nama Lengkap</th>
                <td>:</td>
                <td><?= $user->name; ?></td>
              </tr>
              <tr>
                <th scope="row">No. Telepon</th>
                <td>:</td>
                <td><?= $user->phone; ?></td>
              </tr>
              <tr>
                <th scope="row">Email</th>
                <td>:</td>
                <td><?= $user->email; ?></td>
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
            </table>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#edit_user"><i class="fa fa-fw fa-edit"></i> Perbarui Profil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal Edit Avatar -->
<div class="modal fade" id="edit_avatar" tabindex="-1" role="dialog" aria-labelledby="edit_avatarLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm text-center" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_avatarLabel">Perbarui Avatar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('user/ubah_avatar') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body py-4">
          <input type="hidden" name="kd_admin" value="<?= set_value('kd_admin', $user->kd_admin) ?>" required>
          <img src="<?= base_url() . 'assets/img/' . $user->avatar; ?>" class="imgPreview rounded-circle mb-4 justify-content-center" width="200" height="200" alt="Avatar" style="object-fit: cover;"><br>
          <label for="avatar" class="text-dark font-weight-bold text-left">PILIH FOTO</label>
          <input type="file" name="avatar" accept="image/*" class="form-control-file <?= form_error('avatar') ? 'is-invalid' : '' ?>" id="avatar" required>
          <div id='avatar' class='invalid-feedback'>
            <?= form_error('avatar') ?>
          </div>
          <hr>
          <div class="mt-3">
            <button type="button" class="btn btn-outline-danger text-center" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Tutup</button>
            <button type="submit" class="btn btn-success text-center"><i class="fas fa-check mr-2"></i>Simpan</button>
          </div>
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
        <h5 class="modal-title" id="edit_userLabel">Perbarui Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('user/ubah_profil') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col border-right-primary">
              <label for="kd_admin">Kode Pengguna :</label>
              <input type="text" name="kd_admin" value="<?= set_value('kd_admin', $user->kd_admin) ?>" class="form-control mb-3 <?= form_error('kd_admin') ? 'is-invalid' : '' ?>" id="kd_admin" readonly required>
              <div id="kd_admin" class="invalid-feedback">
                <?= form_error('kd_admin') ?>
              </div>
              <label for="nama_admin">Nama Lengkap :</label>
              <input type="text" name="nama_admin" value="<?= set_value('nama_admin', $user->nama_admin) ?>" class="form-control mb-3 <?= form_error('nama_admin') ? 'is-invalid' : '' ?>" id="nama_admin" required>
              <div id="nama_admin" class="invalid-feedback">
                <?= form_error('nama_admin') ?>
              </div>
              <label for=" jenis_kelamin">Jenis Kelamin :</label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control mb-3">
                <option value="Laki-laki" <?= set_select('jenis_kelamin', 'Laki-laki', $user->jenis_kelamin == 'Laki-laki' ? TRUE : FALSE) ?>>Laki-laki</option>
                <option value="Perempuan" <?= set_select('jenis_kelamin', 'Perempuan', $user->jenis_kelamin == 'Perempuan' ? TRUE : FALSE) ?>>Perempuan</option>
              </select>
              <label for=" alamat">Alamat :</label>
              <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3"><?= set_value('alamat', $user->alamat) ?></textarea>
            </div>
            <div class="col">
              <label for="no_telp">No. Telepon :</label>
              <input type="text" name="no_telp" value="<?= set_value('no_telp', $user->no_telp) ?>" class="form-control mb-3 <?= form_error('no_telp') ? 'is-invalid' : '' ?>" id="no_telp" required>
              <div id="no_telp" class="invalid-feedback">
                <?= form_error('no_telp') ?>
              </div>
              <label for="email">Email :</label>
              <input type="email" name="email" value="<?= set_value('email', $user->email) ?>" class="form-control mb-3 <?= form_error('email') ? 'is-invalid' : '' ?>" id="email">
              <div id="email" class="invalid-feedback">
                <?= form_error('email') ?>
              </div>
              <div class="bg-secondary p-3 text-light rounded">
                <label for="avatar">Foto Profil :</label>
                <input type="file" name="avatar" id="avatar" accept="image/*" class="form-control-file mb-4">
                <div class="row">
                  <div class="col">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control mb-3">
                  </div>
                </div>
                <h6 class="text-warning text-right">*Kosongkan jika tidak ada perubahan</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-times mr-2"></i>Tutup</button>
          <button type="submit" class="btn btn-success"><i class="fas fa-check mr-2"></i>Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>