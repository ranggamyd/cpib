<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Profil Saya</h1>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <img src="<?= base_url() . 'assets/img/' . $supplier->avatar; ?>" class="rounded-circle" width="200" height="200" alt="" style="object-fit: cover;">
                </div>
                <button type="button" class="btn btn-primary mx-5" data-toggle="modal" data-target="#edit_avatar" id="#myBtn" data-dismiss="modal"><i class="fas fa-camera fa-fw"></i> Perbarui foto</button>
                <hr>
                <h4 class="text-center"><?= $supplier->nama_miniplant ?></h4>
                <h6 class="text-center"><?= $supplier->nama_pimpinan ?></h6>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-bottom">
                            <tr>
                                <th scope="row">Kode Supplier</th>
                                <td>:</td>
                                <td><?= $supplier->kd_supplier; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Mini Plant</th>
                                <td>:</td>
                                <td><?= $supplier->nama_miniplant; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Pimpinan Supplier</th>
                                <td>:</td>
                                <td><?= $supplier->nama_pimpinan; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">No. Telepon</th>
                                <td>:</td>
                                <td><?= $supplier->no_telp; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">No. Fax</th>
                                <td>:</td>
                                <td><?= $supplier->no_fax; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>:</td>
                                <td><?= $supplier->alamat; ?></td>
                            </tr>
                        </table>
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#edit_user" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-edit"></i> Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Gambar -->
<div class="modal fade" id="edit_avatar" tabindex="-1" role="dialog" aria-labelledby="edit_userLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm text-center" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_userLabel">Ubah Foto Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user_supplier/ubah_avatar') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body py-4">
                    <input type="hidden" name="kd_supplier" value="<?= set_value('kd_supplier', $supplier->kd_supplier) ?>" id="kd_supplier" class="form-control mb-3 <?= form_error('kd_supplier') ? 'is-invalid' : '' ?>" readonly required>
                    <div id='kd_supplier' class='invalid-feedback'>
                        <?= form_error('kd_supplier') ?>
                    </div>
                    <img src="<?= base_url() . 'assets/img/' . $supplier->avatar; ?>" class="imgPreview rounded-circle mb-4 justify-content-center" width="200" height="200" alt="" style="object-fit: cover;"><br>
                    <label for="avatar" class="text-dark font-weight-bold text-left">PILIH FOTO</label>
                    <input type="file" class="form-control-file <?= form_error('avatar') ? 'is-invalid' : '' ?>" name="avatar" accept="image/*" id="avatar" required>
                    <div id='avatar' class='invalid-feedback'>
                        <?= form_error('avatar') ?>
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
            <form action="<?= base_url('user_supplier/ubah_profil') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col border-right-primary">
                            <label for="kd_supplier">Kode Supplier :</label>
                            <input type="text" name="kd_supplier" value="<?= set_value('kd_supplier', $supplier->kd_supplier) ?>" id="kd_supplier" class="form-control mb-3 <?= form_error('kd_supplier') ? 'is-invalid' : '' ?>" readonly required>
                            <div id="kd_supplier" class="invalid-feedback">
                                <?= form_error('kd_supplier') ?>
                            </div>
                            <label for="nama_pimpinan">Mini Plant :</label>
                            <input type="text" name="nama_miniplant" value="<?= set_value('nama_miniplant', $supplier->nama_miniplant) ?>" id="nama_miniplant" class="form-control mb-3 <?= form_error('nama_miniplant') ? 'is-invalid' : '' ?>" required>
                            <div id="nama_miniplant" class="invalid-feedback">
                                <?= form_error('nama_miniplant') ?>
                            </div>
                            <label for="nama_pimpinan">Pimpinan Supplier :</label>
                            <input type="text" name="nama_pimpinan" value="<?= set_value('nama_pimpinan', $supplier->nama_pimpinan) ?>" id="nama_pimpinan" class="form-control mb-3 <?= form_error('nama_pimpinan') ? 'is-invalid' : '' ?>" required>
                            <div id="nama_pimpinan" class="invalid-feedback">
                                <?= form_error('nama_pimpinan') ?>
                            </div>
                            <label for=" alamat">Alamat :</label>
                            <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3"><?= set_value('alamat', $supplier->alamat) ?></textarea>
                        </div>
                        <div class="col">
                            <label for="no_telp">No. Telepon :</label>
                            <input type="text" name="no_telp" value="<?= set_value('no_telp', $supplier->no_telp) ?>" id="no_telp" class="form-control mb-3  <?= form_error('no_telp') ? 'is-invalid' : '' ?>" required>
                            <div id="no_telp" class="invalid-feedback">
                                <?= form_error('no_telp') ?>
                            </div>
                            <label for="no_fax">No. Fax :</label>
                            <input type="text" name="no_fax" value="<?= set_value('no_fax', $supplier->no_fax) ?>" id="no_fax" class="form-control mb-3  <?= form_error('no_fax') ? 'is-invalid' : '' ?>">
                            <div id="no_fax" class="invalid-feedback">
                                <?= form_error('no_fax') ?>
                            </div>
                            <label for="email">Email :</label>
                            <input type="email" name="email" value="<?= set_value('email', $supplier->email) ?>" id="email" class="form-control mb-3  <?= form_error('email') ? 'is-invalid' : '' ?>" required>
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
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Simpan Perubahan!" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>