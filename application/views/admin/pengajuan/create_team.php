<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Buat Tim Inspeksi</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="<?= base_url('pengajuan/proses_create_team') ?>" method="post">
        <label for="kd_tim_inspeksi">Kode Tim_inspeksi :</label>
        <input type="text" name="kd_tim_inspeksi" id="kd_tim_inspeksi" class="form-control mb-3 <?= form_error('kd_tim_inspeksi') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_tim_inspeksi', $kd_tim_inspeksi_auto) ?>" readonly required>
        <div id='kd_tim_inspeksi' class='invalid-feedback'>
          <?= form_error('kd_tim_inspeksi') ?>
        </div>
        <div class="row">
          <div class="col">
            <label for="kd_pengajuan">Kode Pengajuan :</label>
            <input type="text" name="kd_pengajuan" id="kd_pengajuan" class="form-control mb-3 <?= form_error('kd_pengajuan') ? 'is-invalid' : '' ?>" value="<?= set_value('kd_pengajuan', $kd_pengajuan) ?>" readonly required>
            <div id='kd_pengajuan' class='invalid-feedback'>
              <?= form_error('kd_pengajuan') ?>
            </div>
          </div>
          <div class="col">
            <label for="pimpinan_supplier">Pimpinan Supplier :</label>
            <div class="row">
              <div class="col">
                <input type="text" class="form-control mb-3" value="<?= $supplier->nama_supplier ?>" readonly required>
              </div>
              <div class="col">
                <input type="text" name="pimpinan_supplier" id="pimpinan_supplier" class="form-control mb-3 <?= form_error('pimpinan_supplier') ? 'is-invalid' : '' ?>" value="<?= set_value('pimpinan_supplier', $supplier->kd_supplier) ?>" readonly required>
              </div>
            </div>
            <div id='pimpinan_supplier' class='invalid-feedback'>
              <?= form_error('pimpinan_supplier') ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="ketua_inspeksi">Ketua Inspeksi :</label>
            <select name="ketua_inspeksi" id="ketua_inspeksi" class="form-control mb-3 <?= form_error('ketua_inspeksi') ? 'is-invalid' : '' ?>" required>
              <option selected disabled></option>
              <?php foreach ($admin as $adm) : ?>
                <option value="<?= $adm['kd_admin'] ?>" <?= set_select('ketua_inspeksi', $adm['kd_admin'], TRUE); ?>><?= $adm['nama_admin'] ?></option>
              <?php endforeach ?>
            </select>
            <div id='ketua_inspeksi' class='invalid-feedback'>
              <?= form_error('ketua_inspeksi') ?>
            </div>
          </div>
          <div class="col">
            <label for="anggota1">Anggota 1 :</label>
            <select name="anggota1" id="anggota1" class="form-control mb-3 <?= form_error('anggota1') ? 'is-invalid' : '' ?>" required>
              <option selected disabled></option>
              <?php foreach ($admin as $adm) : ?>
                <option value="<?= $adm['kd_admin'] ?>" <?= set_select('ketua_inspeksi', $adm['kd_admin'], TRUE); ?>><?= $adm['nama_admin'] ?></option>
              <?php endforeach ?>
            </select>
            <div id='anggota1' class='invalid-feedback'>
              <?= form_error('anggota1') ?>
            </div>
          </div>
          <div class="col">
            <label for="anggota2">Ketua Inspeksi :</label>
            <select name="anggota2" id="anggota2" class="form-control mb-3 <?= form_error('anggota2') ? 'is-invalid' : '' ?>" required>
              <option selected disabled></option>
              <?php foreach ($admin as $adm) : ?>
                <option value="<?= $adm['kd_admin'] ?>" <?= set_select('ketua_inspeksi', $adm['kd_admin'], TRUE); ?>><?= $adm['nama_admin'] ?></option>
              <?php endforeach ?>
            </select>
            <div id='anggota2' class='invalid-feedback'>
              <?= form_error('anggota2') ?>
            </div>
          </div>
        </div>

        <small>Info :
          <i>Data yang sudah di tambahkan akan segera muncul di dalam daftar Pimpinan Supplier.
            <b>mohon di cek kembali data tim_inspeksi yang ada demi menghindari duplikasi data / data
              ganda
            </b>
          </i>
        </small><br>
        <div class="text-right">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <input type="submit" value="Buat Tim" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>
</div>