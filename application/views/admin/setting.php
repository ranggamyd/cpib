<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pengaturan Akun</h1>
    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold mb-0">Perbarui Profil</h6>
        </div>

        <form action="<?= base_url('user/ubah_profil') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
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
            <div class="card-footer text-right">
                <button type="button" class="btn btn-outline-danger">Tutup</button>
                <input type="submit" value="Simpan Perubahan" class="btn btn-success">
            </div>
        </form>
    </div>
</div>
</div>