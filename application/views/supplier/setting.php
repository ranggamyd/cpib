<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Pengaturan Akun</h1>
    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold mb-0">Perbarui Profil</h6>
        </div>

        <form action="<?= base_url('user_supplier/ubah_profil') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col border-right-primary">
                        <label for="kd_supplier">Kode Supplier :</label>
                        <input type="text" name="kd_supplier" value="<?= set_value('kd_supplier', $supplier->kd_supplier) ?>" class="form-control mb-3 <?= form_error('kd_supplier') ? 'is-invalid' : '' ?>" id="kd_supplier" readonly required>
                        <div id="kd_supplier" class="invalid-feedback">
                            <?= form_error('kd_supplier') ?>
                        </div>
                        <label for="nama_miniplant">Mini Plant :</label>
                        <input type="text" name="nama_miniplant" value="<?= set_value('nama_miniplant', $supplier->nama_miniplant) ?>" class="form-control mb-3 <?= form_error('nama_miniplant') ? 'is-invalid' : '' ?>" id="nama_miniplant" required>
                        <div id="nama_miniplant" class="invalid-feedback">
                            <?= form_error('nama_miniplant') ?>
                        </div>
                        <label for="nama_pimpinan">Pimpinan Supplier :</label>
                        <input type="text" name="nama_pimpinan" value="<?= set_value('nama_pimpinan', $supplier->nama_pimpinan) ?>" class="form-control mb-3 <?= form_error('nama_pimpinan') ? 'is-invalid' : '' ?>" id="nama_pimpinan" required>
                        <div id="nama_pimpinan" class="invalid-feedback">
                            <?= form_error('nama_pimpinan') ?>
                        </div>
                        <label for=" alamat">Alamat :</label>
                        <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3"><?= set_value('alamat', $supplier->alamat) ?></textarea>
                    </div>
                    <div class="col">
                        <label for="no_telp">No. Telepon :</label>
                        <input type="text" name="no_telp" value="<?= set_value('no_telp', $supplier->no_telp) ?>" class="form-control mb-3 <?= form_error('no_telp') ? 'is-invalid' : '' ?>" id="no_telp" required>
                        <div id="no_telp" class="invalid-feedback">
                            <?= form_error('no_telp') ?>
                        </div>
                        <label for="no_fax">No. Fax :</label>
                        <input type="text" name="no_fax" value="<?= set_value('no_fax', $supplier->no_fax) ?>" class="form-control mb-3 <?= form_error('no_fax') ? 'is-invalid' : '' ?>" id="no_fax">
                        <div id="no_fax" class="invalid-feedback">
                            <?= form_error('no_fax') ?>
                        </div>
                        <label for="email">Email :</label>
                        <input type="email" name="email" value="<?= set_value('email', $supplier->email) ?>" class="form-control mb-3 <?= form_error('email') ? 'is-invalid' : '' ?>" id="email">
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