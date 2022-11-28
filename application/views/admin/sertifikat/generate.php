<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Generate Certificate</h1>
  <hr>

  <div class="card shadow mb-4">
    <form action="<?= base_url('sertifikat/generate_certificate') ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="kd_penilaian" value="<?= $penilaian->kd_penilaian ?>" required>
      <input type="hidden" name="kd_supplier" value="<?= $supplier->kd_supplier ?>" required>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="kd_sertifikat">Sertifikat</label>
              <select name="kd_sertifikat" class="form-control <?= form_error('kd_sertifikat') ? 'is-invalid' : '' ?>" id="kd_sertifikat" required>
                <option selected disabled>== Pilih Sertifikat ==</option>
                <?php foreach ($sertifikat_template as $item) : ?>
                  <option value="<?= $item['kd_sertifikat'] ?>"><?= $item['nama_sertifikat'] ?></option>
                <?php endforeach ?>
              </select>
              <div id='kd_sertifikat' class='invalid-feedback'>
                <?= form_error('kd_sertifikat') ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="no_surat">No. Sertifikat</label>
              <input type="text" name="no_surat" value="<?= set_value('no_surat') ?>" class="form-control <?= form_error('no_surat') ? 'is-invalid' : '' ?>" id="no_surat" required>
              <div id='no_surat' class='invalid-feedback'>
                <?= form_error('no_surat') ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="tgl_inspeksi">Tanggal Inspeksi</label>
              <input type="date" name="tgl_inspeksi" value="<?= set_value('tgl_inspeksi', $penilaian->tgl_inspeksi) ?>" class="form-control <?= form_error('tgl_inspeksi', $penilaian->tgl_inspeksi) ? 'is-invalid' : '' ?>" id="tgl_inspeksi" readonly required>
              <div id='tgl_inspeksi' class='invalid-feedback'>
                <?= form_error('tgl_inspeksi') ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="nama_miniplant">Mini Plant</label>
              <input type="text" name="nama_miniplant" value="<?= set_value('nama_miniplant', $supplier->nama_miniplant) ?>" class="form-control <?= form_error('nama_miniplant') ? 'is-invalid' : '' ?>" id="nama_miniplant" readonly required>
              <div id='nama_miniplant' class='invalid-feedback'>
                <?= form_error('nama_miniplant') ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="nama_pimpinan">Pimpinan Supplier</label>
              <input type="text" name="nama_pimpinan" value="<?= set_value('nama_pimpinan', $supplier->nama_pimpinan) ?>" class="form-control <?= form_error('nama_pimpinan') ? 'is-invalid' : '' ?>" id="nama_pimpinan" readonly required>
              <div id='nama_pimpinan' class='invalid-feedback'>
                <?= form_error('nama_pimpinan') ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="jenis_produk">Jenis Produk</label><br>
              <?php
              $colors = ["badge-primary", "badge-success", "badge-danger", "badge-warning", "badge-info"];
              foreach ($jenis_produk as $item) :
              ?>
                <div class="badge <?= $colors[array_rand($colors)] ?> mr-2"><?= $item['jenis_produk'] ?></div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" class="form-control <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" readonly required><?= set_value('alamat', $supplier->alamat) ?></textarea>
              <div id='alamat' class='invalid-feedback'>
                <?= form_error('alamat') ?>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="form-group">
          <label for="tahapan_penanganan">Tahapan Penanganan</label><br>
          <?php foreach ($tahapan_penanganan as $item) : ?>
            <span class="text-uppercase"><?= $item['nama_penanganan'] ?> -</span>
          <?php endforeach ?>
        </div>
        <div class="form-group">
          <label for="klasifikasi">Klasifikasi</label>
          <input type="text" name="klasifikasi" value="<?= set_value('klasifikasi', $penilaian->klasifikasi) ?>" class="form-control <?= form_error('klasifikasi') ? 'is-invalid' : '' ?>" readonly required>
          <div id='klasifikasi' class='invalid-feedback'>
            <?= form_error('klasifikasi') ?>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="tgl">Tanggal Validasi</label>
              <input type="date" name="tgl" value="<?= set_value('tgl', date('Y-m-d')) ?>" class="form-control <?= form_error('tgl') ? 'is-invalid' : '' ?>" id="tgl" required>
              <div id='tgl' class='invalid-feedback'>
                <?= form_error('tgl') ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="berlaku_sampai">Berlaku Sampai</label>
              <input type="date" name="berlaku_sampai" value="<?= set_value('berlaku_sampai', date('Y-m-d', strtotime('+4 year'))) ?>" class="form-control <?= form_error('berlaku_sampai') ? 'is-invalid' : '' ?>" id="berlaku_sampai" required>
              <div id='berlaku_sampai' class='invalid-feedback'>
                <?= form_error('berlaku_sampai') ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="dikeluarkan_di">Dikeluarkan di</label>
              <input type="text" name="dikeluarkan_di" value="<?= set_value('dikeluarkan_di', 'CIREBON') ?>" class="form-control <?= form_error('dikeluarkan_di') ? 'is-invalid' : '' ?>" id="dikeluarkan_di" required>
              <div id='dikeluarkan_di' class='invalid-feedback'>
                <?= form_error('dikeluarkan_di') ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="kepala_upt">Kepala UPT BKIPM</label>
              <input type="text" name="kepala_upt" value="<?= set_value('kepala_upt', 'R. RUDI BARMARA') ?>" class="form-control <?= form_error('kepala_upt') ? 'is-invalid' : '' ?>" id="kepala_upt" required>
              <div id='kepala_upt' class='invalid-feedback'>
                <?= form_error('kepala_upt') ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="head_of">Head of TIU</label>
              <input type="text" name="head_of" value="<?= set_value('head_of', 'Cirebon') ?>" class="form-control <?= form_error('head_of') ? 'is-invalid' : '' ?>" id="head_of" required>
              <div id='head_of' class='invalid-feedback'>
                <?= form_error('head_of') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer text-right">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success">Generate</button>
      </div>
  </div>
  </form>
</div>
</div>