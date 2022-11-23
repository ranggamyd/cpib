<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Ubah Ajuan Supplier</h1>
  <hr>

  <div class="card shadow mb-4">
    <form action="<?= base_url('pengajuan/ubah') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="kd_supplier" value="<?= $pengajuan->kd_supplier ?>" readonly required>
      <div class="card-body">
        <div class="row">
          <div class="col-md-5">
            <label for="kd_pengajuan">Kode Ajuan :</label>
            <input type="text" name="kd_pengajuan" class="form-control mb-3 <?= form_error('kd_pengajuan', $pengajuan->kd_pengajuan) ? 'is-invalid' : '' ?>" id="kd_pengajuan" value="<?= set_value('kd_pengajuan', $pengajuan->kd_pengajuan) ?>" required readonly>
            <div id='kd_pengajuan' class='invalid-feedback'>
              <?= form_error('kd_pengajuan') ?>
            </div>
          </div>
          <div class="col-md-3 offset-md-4">
            <label for="tgl_pengajuan">Tanggal Pengajuan :</label>
            <input type="date" name="tgl_pengajuan" value="<?= set_value('tgl_pengajuan', $pengajuan->tgl_pengajuan) ?>" class="form-control mb-3 <?= form_error('tgl_pengajuan') ? 'is-invalid' : '' ?>" id="tgl_pengajuan" required>
            <div id='tgl_pengajuan' class='invalid-feedback'>
              <?= form_error('tgl_pengajuan') ?>
            </div>
          </div>
        </div>
        <div class="container bg-info rounded pt-2 pb-3 text-light">
          <div class="row">
            <div class="col">
              <label for="nama_miniplant">Mini Plant :</label>
              <input type="text" name="nama_miniplant" value="<?= set_value('nama_miniplant', $pengajuan->nama_miniplant) ?>" class="form-control mb-3 <?= form_error('kd_supplier') ? 'is-invalid' : '' ?>" readonly>
              <div id='kd_supplier' class='invalid-feedback'>
                <?= form_error('kd_supplier') ?>
              </div>
            </div>
            <div class="col">
              <label for="nama_pimpinan">Pimpinan Supplier :</label>
              <input type="text" name="nama_pimpinan" value="<?= set_value('nama_pimpinan') ?>" id="nama_pimpinan" class="form-control mb-3 <?= form_error('nama_pimpinan') ? 'is-invalid' : '' ?>" readonly>
              <div id='nama_pimpinan' class='invalid-feedback'>
                <?= form_error('nama_pimpinan') ?>
              </div>
            </div>
          </div>
          <?php
          $kjp = [];
          $kjps = [];
          foreach ($jenis_produk as $item) {
            array_push($kjp, ['kd_jenis_produk' => $item['kd_jenis_produk'], 'jenis_produk' => $item['jenis_produk']]);
          }

          foreach ($this->db->get_where('jenis_produk_supplier', ['kd_pengajuan' => $pengajuan->kd_pengajuan])->result_array() as $item) {
            array_push($kjps, $item['kd_jenis_produk']);
          }
          ?>
          <label for="kd_jenis_produk[]">Jenis Produk :</label>
          <select name="kd_jenis_produk[]" multiple id="kd_jenis_produk[]" class="form-control mb-3 <?= form_error('kd_jenis_produk[]') ? 'is-invalid' : '' ?>" required>
            <?php foreach ($kjp as $item) : ?>
              <option value="<?= $item['kd_jenis_produk'] ?>" <?= set_select('kd_jenis_produk[]', $item['kd_jenis_produk'], (in_array($item['kd_jenis_produk'], $kjps)) ? TRUE : FALSE) ?>><?= $item['jenis_produk'] ?></option>
            <?php endforeach ?>
          </select>
          <div id='kd_jenis_produk[]' class='invalid-feedback'>
            <?= form_error('kd_jenis_produk[]') ?>
          </div>
        </div>
        <hr>

        <h5 class="mb-0">Kelengkapan Dokumen</h5><br>

        <div class="row mt-0">
          <div class="col-md-6">
            <label for="ktp">KTP <small class="text-danger text-bold">*</small></label>
            <input type="file" name="ktp" id="ktp" class="form-control-file mb-3 <?= form_error('ktp') ? 'is-invalid' : '' ?>" accept="image/*,.pdf" required>
            <div id='ktp' class='invalid-feedback'>
              <?= form_error('ktp') ?>
            </div>
            <label for="npwp">NPWP <small class="text-danger text-bold">*</small></label>
            <input type="file" name="npwp" id="npwp" class="form-control-file mb-3 <?= form_error('npwp') ? 'is-invalid' : '' ?>" accept="image/*,.pdf" required>
            <div id='npwp' class='invalid-feedback'>
              <?= form_error('npwp') ?>
            </div>
            <label for="nib">NIB <small class="text-danger text-bold">*</small></label>
            <input type="file" name="nib" id="nib" class="form-control-file mb-3 <?= form_error('nib') ? 'is-invalid' : '' ?>" accept="image/*,.pdf" required>
            <div id='nib' class='invalid-feedback'>
              <?= form_error('nib') ?>
            </div>
            <label for="siup">SIUP <small class="text-danger text-bold">*</small></label>
            <input type="file" name="siup" id="siup" class="form-control-file mb-3 <?= form_error('siup') ? 'is-invalid' : '' ?>" accept="image/*,.pdf" required>
            <div id='siup' class='invalid-feedback'>
              <?= form_error('siup') ?>
            </div>
          </div>
          <div class="col-md-6">
            <label for="akta_usaha">AKTA USAHA</label>
            <input type="file" name="akta_usaha" id="akta_usaha" class="form-control-file mb-3" accept="image/*,.pdf">
            <label for="imb">IMB</label>
            <input type="file" name="imb" id="imb" class="form-control-file mb-3" accept="image/*,.pdf">
            <label for="layout">LAY-OUT / DENAH LOKASI</label>
            <input type="file" name="layout" id="layout" class="form-control-file mb-3" accept="image/*,.pdf">
            <label for="panduan_mutu">PANDUAN MUTU GMP-SSOP</label>
            <input type="file" name="panduan_mutu" id="panduan_mutu" class="form-control-file mb-3" accept="image/*,.pdf">
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>