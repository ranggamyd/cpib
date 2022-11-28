<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Buat Tim Inspeksi</h1>
  <hr>

  <div class="card shadow mb-4">
    <form action="<?= base_url('pengajuan/proses_create_team') ?>" method="post">
    <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <label for="kd_tim_inspeksi">Kode Tim Inspeksi :</label>
            <input type="text" name="kd_tim_inspeksi" id="kd_tim_inspeksi" class="form-control mb-3 <?= form_error('kd_tim_inspeksi') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_tim_inspeksi', $kd_tim_inspeksi_auto) ?>" readonly required>
            <div id='kd_tim_inspeksi' class='invalid-feedback'>
              <?= form_error('kd_tim_inspeksi') ?>
            </div>
          </div>
          <div class="col-md-4 offset-md-4">
            <label for="kd_pengajuan">Kode Pengajuan :</label>
            <input type="text" name="kd_pengajuan" id="kd_pengajuan" class="form-control mb-3 <?= form_error('kd_pengajuan') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_pengajuan', $kd_pengajuan) ?>" readonly required>
            <div id='kd_pengajuan' class='invalid-feedback'>
              <?= form_error('kd_pengajuan') ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="nama_miniplant">Mini Plant :</label>
            <input type="text" name="nama_miniplant" id="nama_miniplant" class="form-control mb-3 <?= form_error('nama_miniplant') ? 'is-invalid' : '' ?>" value="<?= set_value('nama_miniplant', $supplier->nama_miniplant) ?>" readonly required>
            <div id='nama_miniplant' class='invalid-feedback'>
              <?= form_error('nama_miniplant') ?>
            </div>
          </div>
          <div class="col">
            <label for="pimpinan_supplier">Pimpinan Supplier :</label>
            <input type="text" name="pimpinan_supplier" id="pimpinan_supplier" class="form-control mb-3 <?= form_error('pimpinan_supplier') ? 'is-invalid' : '' ?>" value="<?= set_value('pimpinan_supplier', $supplier->nama_pimpinan) ?>" readonly required>
            <div id='pimpinan_supplier' class='invalid-feedback'>
              <?= form_error('pimpinan_supplier') ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="ketua_inspeksi">Ketua Inspeksi :</label>
            <select name="ketua_inspeksi" id="ketua_inspeksi" class="form-control mb-3 <?= form_error('ketua_inspeksi') ? 'is-invalid' : '' ?>" required>
              <option selected disabled>== Pilih Ketua ==</option>
              <?php foreach ($admin as $adm) : ?>
                <option value="<?= $adm['kd_admin'] ?>" <?= set_select('ketua_inspeksi', $adm['kd_admin']); ?>><?= $adm['nama_admin'] ?></option>
              <?php endforeach ?>
            </select>
            <div id='ketua_inspeksi' class='invalid-feedback'>
              <?= form_error('ketua_inspeksi') ?>
            </div>
          </div>
          <div class="col">
            <label for="anggota1">Anggota 1 :</label>
            <select name="anggota1" id="anggota1" class="form-control mb-3 <?= form_error('anggota1') ? 'is-invalid' : '' ?>" required>
              <option selected disabled>== Pilih Anggota 1 ==</option>
              <?php foreach ($admin as $adm) : ?>
                <option value="<?= $adm['kd_admin'] ?>" <?= set_select('anggota1', $adm['kd_admin']); ?>><?= $adm['nama_admin'] ?></option>
              <?php endforeach ?>
            </select>
            <div id='anggota1' class='invalid-feedback'>
              <?= form_error('anggota1') ?>
            </div>
          </div>
          <div class="col">
            <label for="anggota2">Anggota 2 :</label>
            <select name="anggota2" id="anggota2" class="form-control mb-3 <?= form_error('anggota2') ? 'is-invalid' : '' ?>">
              <option selected disabled>== Pilih Anggota 2  ==</option>
              <?php foreach ($admin as $adm) : ?>
                <option value="<?= $adm['kd_admin'] ?>" <?= set_select('anggota2', $adm['kd_admin']); ?>><?= $adm['nama_admin'] ?></option>
              <?php endforeach ?>
            </select>
            <div id='anggota2' class='invalid-feedback'>
              <?= form_error('anggota2') ?>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-primary">Buat Tim</button>
      </div>
    </form>
  </div>
</div>
</div>