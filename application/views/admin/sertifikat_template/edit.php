<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Edit Template Sertifikat</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="<?= base_url('sertifikat_template/saveChanges') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="kd_sertifikat" value="<?= set_value('kd_sertifikat', $sertifikat->kd_sertifikat) ?>" id="kd_sertifikat" required>
        <input type="hidden" name="url" value="<?= set_value('url', base_url('sertifikat_template/editTemplate')) ?>" id="url" required>

        <div class="row">
          <div class="col-md-5" id="img_container">
            <a href="<?= base_url('assets/sertifikat/template/') . $sertifikat->preview_template ?>" class="imgPopup" id="aPreviewTemplate">
              <img src="<?= base_url('assets/sertifikat/template/') . $sertifikat->preview_template ?>" alt="Gambar Template Sertifikat" class="imgPreview img-thumbnail mb-4" id="imgPreviewTemplate"><br>
            </a>
          </div>
          <div class="col-md-7 mt-3 mt-md-0">
            <div class="form-group row">
              <div class="col-6">
                <label for="no_surat">No. Sertifikat :</label>
                <input type="text" onkeyup="save('no_surat',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="no_surat" value="<?= set_value('no_surat', $sertifikat->no_surat) ?>" class="form-control form-control-sm form-control-inline <?= form_error('no_surat') ? 'is-invalid' : '' ?>" id="no_surat" required>
                <div id='no_surat' class='invalid-feedback'>
                  <?= form_error('no_surat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_no_surat">Size :</label>
                <input type="number" onkeyup="save('s_no_surat',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_no_surat" value="<?= set_value('s_no_surat', $sertifikat->s_no_surat) ?>" class="form-control form-control-sm <?= form_error('s_no_surat') ? 'is-invalid' : '' ?>" id="s_no_surat" required>
                <div id='s_no_surat' class='invalid-feedback'>
                  <?= form_error('s_no_surat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_no_surat">X :</label>
                <input type="number" onkeyup="save('x_no_surat',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_no_surat" value="<?= set_value('x_no_surat', $sertifikat->x_no_surat) ?>" class="form-control form-control-sm <?= form_error('x_no_surat') ? 'is-invalid' : '' ?>" id="x_no_surat" required>
                <div id='x_no_surat' class='invalid-feedback'>
                  <?= form_error('x_no_surat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_no_surat">Y :</label>
                <input type="number" onkeyup="save('y_no_surat',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_no_surat" value="<?= set_value('y_no_surat', $sertifikat->y_no_surat) ?>" class="form-control form-control-sm <?= form_error('y_no_surat') ? 'is-invalid' : '' ?>" id="y_no_surat" required>
                <div id='y_no_surat' class='invalid-feedback'>
                  <?= form_error('y_no_surat') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="supplier">Unit Pengumpul :</label>
                <input type="text" onkeyup="save('supplier',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="supplier" value="<?= set_value('supplier', $sertifikat->supplier) ?>" class="form-control form-control-sm form-control-inline <?= form_error('supplier') ? 'is-invalid' : '' ?>" id="supplier" required>
                <div id='supplier' class='invalid-feedback'>
                  <?= form_error('supplier') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_supplier">Size :</label>
                <input type="number" onkeyup="save('s_supplier',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_supplier" value="<?= set_value('s_supplier', $sertifikat->s_supplier) ?>" class="form-control form-control-sm <?= form_error('s_supplier') ? 'is-invalid' : '' ?>" id="s_supplier" required>
                <div id='s_supplier' class='invalid-feedback'>
                  <?= form_error('s_supplier') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_supplier">X :</label>
                <input type="number" onkeyup="save('x_supplier',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_supplier" value="<?= set_value('x_supplier', $sertifikat->x_supplier) ?>" class="form-control form-control-sm <?= form_error('x_supplier') ? 'is-invalid' : '' ?>" id="x_supplier" required>
                <div id='x_supplier' class='invalid-feedback'>
                  <?= form_error('x_supplier') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_supplier">Y :</label>
                <input type="number" onkeyup="save('y_supplier',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_supplier" value="<?= set_value('y_supplier', $sertifikat->y_supplier) ?>" class="form-control form-control-sm <?= form_error('y_supplier') ? 'is-invalid' : '' ?>" id="y_supplier" required>
                <div id='y_supplier' class='invalid-feedback'>
                  <?= form_error('y_supplier') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-4">
                <label for="alamat">Alamat :</label>
                <input type="text" onkeyup="save('alamat',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="alamat" value="<?= set_value('alamat', $sertifikat->alamat) ?>" class="form-control form-control-sm form-control-inline <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" required>
                <div id='alamat' class='invalid-feedback'>
                  <?= form_error('alamat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="w_alamat">Width :</label>
                <input type="number" onkeyup="save('w_alamat',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="w_alamat" value="<?= set_value('w_alamat', $sertifikat->w_alamat) ?>" class="form-control form-control-sm <?= form_error('w_alamat') ? 'is-invalid' : '' ?>" id="w_alamat" required>
                <div id='w_alamat' class='invalid-feedback'>
                  <?= form_error('w_alamat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_alamat">Size :</label>
                <input type="number" onkeyup="save('s_alamat',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_alamat" value="<?= set_value('s_alamat', $sertifikat->s_alamat) ?>" class="form-control form-control-sm <?= form_error('s_alamat') ? 'is-invalid' : '' ?>" id="s_alamat" required>
                <div id='s_alamat' class='invalid-feedback'>
                  <?= form_error('s_alamat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_alamat">X :</label>
                <input type="number" onkeyup="save('x_alamat',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_alamat" value="<?= set_value('x_alamat', $sertifikat->x_alamat) ?>" class="form-control form-control-sm <?= form_error('x_alamat') ? 'is-invalid' : '' ?>" id="x_alamat" required>
                <div id='x_alamat' class='invalid-feedback'>
                  <?= form_error('x_alamat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_alamat">Y :</label>
                <input type="number" onkeyup="save('y_alamat',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_alamat" value="<?= set_value('y_alamat', $sertifikat->y_alamat) ?>" class="form-control form-control-sm <?= form_error('y_alamat') ? 'is-invalid' : '' ?>" id="y_alamat" required>
                <div id='y_alamat' class='invalid-feedback'>
                  <?= form_error('y_alamat') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="jenis_produk">Jenis Produk :</label>
                <input type="text" onkeyup="save('jenis_produk',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="jenis_produk" value="<?= set_value('jenis_produk', $sertifikat->jenis_produk) ?>" class="form-control form-control-sm form-control-inline <?= form_error('jenis_produk') ? 'is-invalid' : '' ?>" id="jenis_produk" required>
                <div id='jenis_produk' class='invalid-feedback'>
                  <?= form_error('jenis_produk') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_jenis_produk">Size :</label>
                <input type="number" onkeyup="save('s_jenis_produk',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_jenis_produk" value="<?= set_value('s_jenis_produk', $sertifikat->s_jenis_produk) ?>" class="form-control form-control-sm <?= form_error('s_jenis_produk') ? 'is-invalid' : '' ?>" id="s_jenis_produk" required>
                <div id='s_jenis_produk' class='invalid-feedback'>
                  <?= form_error('s_jenis_produk') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_jenis_produk">X :</label>
                <input type="number" onkeyup="save('x_jenis_produk',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_jenis_produk" value="<?= set_value('x_jenis_produk', $sertifikat->x_jenis_produk) ?>" class="form-control form-control-sm <?= form_error('x_jenis_produk') ? 'is-invalid' : '' ?>" id="x_jenis_produk" required>
                <div id='x_jenis_produk' class='invalid-feedback'>
                  <?= form_error('x_jenis_produk') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_jenis_produk">Y :</label>
                <input type="number" onkeyup="save('y_jenis_produk',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_jenis_produk" value="<?= set_value('y_jenis_produk', $sertifikat->y_jenis_produk) ?>" class="form-control form-control-sm <?= form_error('y_jenis_produk') ? 'is-invalid' : '' ?>" id="y_jenis_produk" required>
                <div id='y_jenis_produk' class='invalid-feedback'>
                  <?= form_error('y_jenis_produk') ?>
                </div>
              </div>
            </div>
            <div class="form-group row d-flex align-items-end">
              <div class="col-4">
                <label for="penanganan">Tahapan Penanganan :</label>
                <input type="text" onkeyup="save('penanganan',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="penanganan" value="<?= set_value('penanganan', $sertifikat->penanganan) ?>" class="form-control form-control-sm form-control-inline <?= form_error('penanganan') ? 'is-invalid' : '' ?>" id="penanganan" required>
                <div id='penanganan' class='invalid-feedback'>
                  <?= form_error('penanganan') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="w_penanganan">Width :</label>
                <input type="number" onkeyup="save('w_penanganan',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="w_penanganan" value="<?= set_value('w_penanganan', $sertifikat->w_penanganan) ?>" class="form-control form-control-sm <?= form_error('w_penanganan') ? 'is-invalid' : '' ?>" id="w_penanganan" required>
                <div id='w_penanganan' class='invalid-feedback'>
                  <?= form_error('w_penanganan') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_penanganan">Size :</label>
                <input type="number" onkeyup="save('s_penanganan',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_penanganan" value="<?= set_value('s_penanganan', $sertifikat->s_penanganan) ?>" class="form-control form-control-sm <?= form_error('s_penanganan') ? 'is-invalid' : '' ?>" id="s_penanganan" required>
                <div id='s_penanganan' class='invalid-feedback'>
                  <?= form_error('s_penanganan') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_penanganan">X :</label>
                <input type="number" onkeyup="save('x_penanganan',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_penanganan" value="<?= set_value('x_penanganan', $sertifikat->x_penanganan) ?>" class="form-control form-control-sm <?= form_error('x_penanganan') ? 'is-invalid' : '' ?>" id="x_penanganan" required>
                <div id='x_penanganan' class='invalid-feedback'>
                  <?= form_error('x_penanganan') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_penanganan">Y :</label>
                <input type="number" onkeyup="save('y_penanganan',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_penanganan" value="<?= set_value('y_penanganan', $sertifikat->y_penanganan) ?>" class="form-control form-control-sm <?= form_error('y_penanganan') ? 'is-invalid' : '' ?>" id="y_penanganan" required>
                <div id='y_penanganan' class='invalid-feedback'>
                  <?= form_error('y_penanganan') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="klasifikasi">Klasifikasi :</label>
                <input type="text" onkeyup="save('klasifikasi',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="klasifikasi" value="<?= set_value('klasifikasi', $sertifikat->klasifikasi) ?>" class="form-control form-control-sm form-control-inline <?= form_error('klasifikasi') ? 'is-invalid' : '' ?>" required>
                <div id='klasifikasi' class='invalid-feedback'>
                  <?= form_error('klasifikasi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_klasifikasi">Size :</label>
                <input type="number" onkeyup="save('s_klasifikasi',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_klasifikasi" value="<?= set_value('s_klasifikasi', $sertifikat->s_klasifikasi) ?>" class="form-control form-control-sm <?= form_error('s_klasifikasi') ? 'is-invalid' : '' ?>" id="s_klasifikasi" required>
                <div id='s_klasifikasi' class='invalid-feedback'>
                  <?= form_error('s_klasifikasi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_klasifikasi">X :</label>
                <input type="number" onkeyup="save('x_klasifikasi',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_klasifikasi" value="<?= set_value('x_klasifikasi', $sertifikat->x_klasifikasi) ?>" class="form-control form-control-sm <?= form_error('x_klasifikasi') ? 'is-invalid' : '' ?>" id="x_klasifikasi" required>
                <div id='x_klasifikasi' class='invalid-feedback'>
                  <?= form_error('x_klasifikasi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_klasifikasi">Y :</label>
                <input type="number" onkeyup="save('y_klasifikasi',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_klasifikasi" value="<?= set_value('y_klasifikasi', $sertifikat->y_klasifikasi) ?>" class="form-control form-control-sm <?= form_error('y_klasifikasi') ? 'is-invalid' : '' ?>" id="y_klasifikasi" required>
                <div id='y_klasifikasi' class='invalid-feedback'>
                  <?= form_error('y_klasifikasi') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="tgl_inspeksi">Tanggal Inspeksi :</label>
                <input type="text" onkeyup="save('tgl_inspeksi',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="tgl_inspeksi" value="<?= set_value('tgl_inspeksi', $sertifikat->tgl_inspeksi) ?>" class="form-control form-control-sm form-control-inline <?= form_error('tgl_inspeksi') ? 'is-invalid' : '' ?>" id="tgl_inspeksi" required>
                <div id='tgl_inspeksi' class='invalid-feedback'>
                  <?= form_error('tgl_inspeksi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_tgl_inspeksi">Size :</label>
                <input type="number" onkeyup="save('s_tgl_inspeksi',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_tgl_inspeksi" value="<?= set_value('s_tgl_inspeksi', $sertifikat->s_tgl_inspeksi) ?>" class="form-control form-control-sm <?= form_error('s_tgl_inspeksi') ? 'is-invalid' : '' ?>" id="s_tgl_inspeksi" required>
                <div id='s_tgl_inspeksi' class='invalid-feedback'>
                  <?= form_error('s_tgl_inspeksi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_tgl_inspeksi">X :</label>
                <input type="number" onkeyup="save('x_tgl_inspeksi',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_tgl_inspeksi" value="<?= set_value('x_tgl_inspeksi', $sertifikat->x_tgl_inspeksi) ?>" class="form-control form-control-sm <?= form_error('x_tgl_inspeksi') ? 'is-invalid' : '' ?>" id="x_tgl_inspeksi" required>
                <div id='x_tgl_inspeksi' class='invalid-feedback'>
                  <?= form_error('x_tgl_inspeksi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_tgl_inspeksi">Y :</label>
                <input type="number" onkeyup="save('y_tgl_inspeksi',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_tgl_inspeksi" value="<?= set_value('y_tgl_inspeksi', $sertifikat->y_tgl_inspeksi) ?>" class="form-control form-control-sm <?= form_error('y_tgl_inspeksi') ? 'is-invalid' : '' ?>" id="y_tgl_inspeksi" required>
                <div id='y_tgl_inspeksi' class='invalid-feedback'>
                  <?= form_error('y_tgl_inspeksi') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="berlaku_sampai">Berlaku Sampai :</label>
                <input type="text" onkeyup="save('berlaku_sampai',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="berlaku_sampai" value="<?= set_value('berlaku_sampai', $sertifikat->berlaku_sampai) ?>" class="form-control form-control-sm form-control-inline <?= form_error('berlaku_sampai') ? 'is-invalid' : '' ?>" id="berlaku_sampai" required>
                <div id='berlaku_sampai' class='invalid-feedback'>
                  <?= form_error('berlaku_sampai') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_berlaku_sampai">Size :</label>
                <input type="number" onkeyup="save('s_berlaku_sampai',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_berlaku_sampai" value="<?= set_value('s_berlaku_sampai', $sertifikat->s_berlaku_sampai) ?>" class="form-control form-control-sm <?= form_error('s_berlaku_sampai') ? 'is-invalid' : '' ?>" id="s_berlaku_sampai" required>
                <div id='s_berlaku_sampai' class='invalid-feedback'>
                  <?= form_error('s_berlaku_sampai') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_berlaku_sampai">X :</label>
                <input type="number" onkeyup="save('x_berlaku_sampai',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_berlaku_sampai" value="<?= set_value('x_berlaku_sampai', $sertifikat->x_berlaku_sampai) ?>" class="form-control form-control-sm <?= form_error('x_berlaku_sampai') ? 'is-invalid' : '' ?>" id="x_berlaku_sampai" required>
                <div id='x_berlaku_sampai' class='invalid-feedback'>
                  <?= form_error('x_berlaku_sampai') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_berlaku_sampai">Y :</label>
                <input type="number" onkeyup="save('y_berlaku_sampai',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_berlaku_sampai" value="<?= set_value('y_berlaku_sampai', $sertifikat->y_berlaku_sampai) ?>" class="form-control form-control-sm <?= form_error('y_berlaku_sampai') ? 'is-invalid' : '' ?>" id="y_berlaku_sampai" required>
                <div id='y_berlaku_sampai' class='invalid-feedback'>
                  <?= form_error('y_berlaku_sampai') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="dikeluarkan_di">Dikeluarkan di :</label>
                <input type="text" onkeyup="save('dikeluarkan_di',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="dikeluarkan_di" value="<?= set_value('dikeluarkan_di', $sertifikat->dikeluarkan_di) ?>" class="form-control form-control-sm form-control-inline <?= form_error('dikeluarkan_di') ? 'is-invalid' : '' ?>" id="dikeluarkan_di" required>
                <div id='dikeluarkan_di' class='invalid-feedback'>
                  <?= form_error('dikeluarkan_di') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_dikeluarkan_di">Size :</label>
                <input type="number" onkeyup="save('s_dikeluarkan_di',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_dikeluarkan_di" value="<?= set_value('s_dikeluarkan_di', $sertifikat->s_dikeluarkan_di) ?>" class="form-control form-control-sm <?= form_error('s_dikeluarkan_di') ? 'is-invalid' : '' ?>" id="s_dikeluarkan_di" required>
                <div id='s_dikeluarkan_di' class='invalid-feedback'>
                  <?= form_error('s_dikeluarkan_di') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_dikeluarkan_di">X :</label>
                <input type="number" onkeyup="save('x_dikeluarkan_di',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_dikeluarkan_di" value="<?= set_value('x_dikeluarkan_di', $sertifikat->x_dikeluarkan_di) ?>" class="form-control form-control-sm <?= form_error('x_dikeluarkan_di') ? 'is-invalid' : '' ?>" id="x_dikeluarkan_di" required>
                <div id='x_dikeluarkan_di' class='invalid-feedback'>
                  <?= form_error('x_dikeluarkan_di') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_dikeluarkan_di">Y :</label>
                <input type="number" onkeyup="save('y_dikeluarkan_di',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_dikeluarkan_di" value="<?= set_value('y_dikeluarkan_di', $sertifikat->y_dikeluarkan_di) ?>" class="form-control form-control-sm <?= form_error('y_dikeluarkan_di') ? 'is-invalid' : '' ?>" id="y_dikeluarkan_di" required>
                <div id='y_dikeluarkan_di' class='invalid-feedback'>
                  <?= form_error('y_dikeluarkan_di') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="tgl">Tanggal Validasi :</label>
                <input type="text" onkeyup="save('tgl',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="tgl" value="<?= set_value('tgl', $sertifikat->tgl) ?>" class="form-control form-control-sm form-control-inline <?= form_error('tgl') ? 'is-invalid' : '' ?>" id="tgl" required>
                <div id='tgl' class='invalid-feedback'>
                  <?= form_error('tgl') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_tgl">Size :</label>
                <input type="number" onkeyup="save('s_tgl',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_tgl" value="<?= set_value('s_tgl', $sertifikat->s_tgl) ?>" class="form-control form-control-sm <?= form_error('s_tgl') ? 'is-invalid' : '' ?>" id="s_tgl" required>
                <div id='s_tgl' class='invalid-feedback'>
                  <?= form_error('s_tgl') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_tgl">X :</label>
                <input type="number" onkeyup="save('x_tgl',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_tgl" value="<?= set_value('x_tgl', $sertifikat->x_tgl) ?>" class="form-control form-control-sm <?= form_error('x_tgl') ? 'is-invalid' : '' ?>" id="x_tgl" required>
                <div id='x_tgl' class='invalid-feedback'>
                  <?= form_error('x_tgl') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_tgl">Y :</label>
                <input type="number" onkeyup="save('y_tgl',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_tgl" value="<?= set_value('y_tgl', $sertifikat->y_tgl) ?>" class="form-control form-control-sm <?= form_error('y_tgl') ? 'is-invalid' : '' ?>" id="y_tgl" required>
                <div id='y_tgl' class='invalid-feedback'>
                  <?= form_error('y_tgl') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="kepala_upt">Kepala UPT BKIPM :</label>
                <input type="text" onkeyup="save('kepala_upt',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="kepala_upt" value="<?= set_value('kepala_upt', $sertifikat->kepala_upt) ?>" class="form-control form-control-sm form-control-inline <?= form_error('kepala_upt') ? 'is-invalid' : '' ?>" id="kepala_upt" required>
                <div id='kepala_upt' class='invalid-feedback'>
                  <?= form_error('kepala_upt') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_kepala_upt">Size :</label>
                <input type="number" onkeyup="save('s_kepala_upt',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_kepala_upt" value="<?= set_value('s_kepala_upt', $sertifikat->s_kepala_upt) ?>" class="form-control form-control-sm <?= form_error('s_kepala_upt') ? 'is-invalid' : '' ?>" id="s_kepala_upt" required>
                <div id='s_kepala_upt' class='invalid-feedback'>
                  <?= form_error('s_kepala_upt') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_kepala_upt">X :</label>
                <input type="number" onkeyup="save('x_kepala_upt',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_kepala_upt" value="<?= set_value('x_kepala_upt', $sertifikat->x_kepala_upt) ?>" class="form-control form-control-sm <?= form_error('x_kepala_upt') ? 'is-invalid' : '' ?>" id="x_kepala_upt" required>
                <div id='x_kepala_upt' class='invalid-feedback'>
                  <?= form_error('x_kepala_upt') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_kepala_upt">Y :</label>
                <input type="number" onkeyup="save('y_kepala_upt',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_kepala_upt" value="<?= set_value('y_kepala_upt', $sertifikat->y_kepala_upt) ?>" class="form-control form-control-sm <?= form_error('y_kepala_upt') ? 'is-invalid' : '' ?>" id="y_kepala_upt" required>
                <div id='y_kepala_upt' class='invalid-feedback'>
                  <?= form_error('y_kepala_upt') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="head_of">FQIA's TIU :</label>
                <input type="text" onkeyup="save('head_of',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="head_of" value="<?= set_value('head_of', $sertifikat->head_of) ?>" class="form-control form-control-sm form-control-inline <?= form_error('head_of') ? 'is-invalid' : '' ?>" id="head_of" required>
                <div id='head_of' class='invalid-feedback'>
                  <?= form_error('head_of') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="s_head_of">Size :</label>
                <input type="number" onkeyup="save('s_head_of',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="s_head_of" value="<?= set_value('s_head_of', $sertifikat->s_head_of) ?>" class="form-control form-control-sm <?= form_error('s_head_of') ? 'is-invalid' : '' ?>" id="s_head_of" required>
                <div id='s_head_of' class='invalid-feedback'>
                  <?= form_error('s_head_of') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_head_of">X :</label>
                <input type="number" onkeyup="save('x_head_of',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="x_head_of" value="<?= set_value('x_head_of', $sertifikat->x_head_of) ?>" class="form-control form-control-sm <?= form_error('x_head_of') ? 'is-invalid' : '' ?>" id="x_head_of" required>
                <div id='x_head_of' class='invalid-feedback'>
                  <?= form_error('x_head_of') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_head_of">Y :</label>
                <input type="number" onkeyup="save('y_head_of',this.value, '<?= base_url('sertifikat_template/editTemplate') ?>')" name="y_head_of" value="<?= set_value('y_head_of', $sertifikat->y_head_of) ?>" class="form-control form-control-sm <?= form_error('y_head_of') ? 'is-invalid' : '' ?>" id="y_head_of" required>
                <div id='y_head_of' class='invalid-feedback'>
                  <?= form_error('y_head_of') ?>
                </div>
              </div>
            </div>
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