<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Profil Saya</h1>
  <hr>

  <div class="row">
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-body text-center">
          <img src="<?= base_url('assets/img/logo_bkipm2.png') ?>" class="rounded-circle" width="200" height="200" alt="" style="object-fit: cover;">
        </div>
        <button type="button" class="btn btn-primary mx-5" data-toggle="modal" data-target="#edit_avatar" id="#myBtn" data-dismiss="modal"><i class="fas fa-camera fa-fw"></i> Perbarui foto</button>
        <hr>
        <h4 class="text-center">Administrator</h4>
        <p class="text-center mb-4">Administrator</p>
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
                <!-- <td><?= $spl['kd_admin']; ?></td> -->
              </tr>
              <tr>
                <th scope="row">Nama Lengkap</th>
                <td>:</td>
                <!-- <td><?= $spl['nama_admin']; ?></td> -->
              </tr>
              <tr>
                <th scope="row">Jenis Kelamin</th>
                <td>:</td>
                <!-- <td><?= $spl['jenis_kelamin']; ?></td> -->
              </tr>
              <tr>
                <th scope="row">Alamat</th>
                <td>:</td>
                <!-- <td><?= $spl['Alamat']; ?></td> -->
              </tr>
              <tr>
                <th scope="row">Jabatan</th>
                <td>:</td>
                <!-- <td><?= $spl['jabatan']; ?></td> -->
              </tr>
            </table>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#edit_profile" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-edit"></i> Edit Profil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<!-- Modal Edit Profile -->
<div class="modal fade" id="edit_profil" tabindex="-1" role="dialog" aria-labelledby="edit_profilLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit_profilLabel">Edit Profil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('suppliers/ubah') ?>" method="post">
        <div class="modal-body">
          <label for="kd_supplier">Kode Supplier :</label>
          <input type="text" name="kd_supplier" id="kd_supplier" class="form-control mb-3" value="<?= $spl['kd_supplier'] ?>" readonly>
          <label for="nama_supplier">Nama Supplier :</label>
          <input type="text" name="nama_supplier" id="nama_supplier" class="form-control mb-3" value="<?= $spl['nama_supplier'] ?>" required>
          <div class="row">
            <div class="col">
              <label for="nama_miniplant">Nama Mini Plant :</label>
              <input type="text" name="nama_miniplant" id="nama_miniplant" class="form-control mb-3" value="<?= $spl['nama_miniplant'] ?>" required>
            </div>
            <div class="col">
              <label for="kd_jenis_produk">Jenis Produk :</label><br>
              <select name="kd_jenis_produk" id="kd_jenis_produk" class="form-control mb-3" required>
                <?php foreach ($jenis_produk as $jp) : ?>
                  <option value="<?= $jp['kd_jenis_produk'] ?>" <?= $spl['kd_jenis_produk'] == $jp['kd_jenis_produk'] ? 'selected' : '' ?>><?= $jp['jenis_produk'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <label for=" alamat">Alamat :</label>
          <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3" required><?= $spl['alamat'] ?></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
          <input type="submit" value="Simpan Perubahan!" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>