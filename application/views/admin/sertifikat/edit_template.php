<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Edit Template Sertifikat</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="<?= base_url('sertifikat/saveChanges') ?>" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-5">
            <img src="<?= base_url('assets/sertifikat/template.jpg') ?>" alt="Gambar Template Sertifikat" class="imgPreview img-thumbnail mb-4"><br>
            <div class="bg-secondary p-3 rounded text-light">
              <label for="template" class="">Perbarui Template</label>
              <input type="file" class="form-control-sm form-control-file <?= form_error('template') ? 'is-invalid' : '' ?>" name="template" accept="image/*" id="template" required>
              <div id='template' class='invalid-feedback'>
                <?= form_error('template') ?>
              </div>
            </div>
          </div>
          <div class="col-md-7 mt-3 mt-md-0">
            <div class="form-group row">
              <div class="col-6">
                <label for="no_surat">No. Surat :</label>
                <input type="text" name="no_surat" value="<?= set_value('no_surat') ?>" class="form-control form-control-sm form-control-inline <?= form_error('no_surat') ? 'is-invalid' : '' ?>" id="no_surat" required>
                <div id='no_surat' class='invalid-feedback'>
                  <?= form_error('no_surat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_no_surat">Size :</label>
                <input type="number" name="font_size_no_surat" value="<?= set_value('font_size_no_surat') ?>" class="form-control form-control-sm <?= form_error('font_size_no_surat') ? 'is-invalid' : '' ?>" id="font_size_no_surat" required>
                <div id='font_size_no_surat' class='invalid-feedback'>
                  <?= form_error('font_size_no_surat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_no_surat">X :</label>
                <input type="number" name="x_no_surat" value="<?= set_value('x_no_surat') ?>" class="form-control form-control-sm <?= form_error('x_no_surat') ? 'is-invalid' : '' ?>" id="x_no_surat" required>
                <div id='x_no_surat' class='invalid-feedback'>
                  <?= form_error('x_no_surat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_no_surat">Y :</label>
                <input type="number" name="y_no_surat" value="<?= set_value('y_no_surat') ?>" class="form-control form-control-sm <?= form_error('y_no_surat') ? 'is-invalid' : '' ?>" id="y_no_surat" required>
                <div id='y_no_surat' class='invalid-feedback'>
                  <?= form_error('y_no_surat') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="nama_supplier">Unit Pengumpul :</label>
                <input type="text" name="nama_supplier" value="<?= set_value('nama_supplier') ?>" class="form-control form-control-sm form-control-inline <?= form_error('nama_supplier') ? 'is-invalid' : '' ?>" id="nama_supplier" readonly required>
                <div id='nama_supplier' class='invalid-feedback'>
                  <?= form_error('nama_supplier') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_nama_supplier">Size :</label>
                <input type="number" name="font_size_nama_supplier" value="<?= set_value('font_size_nama_supplier') ?>" class="form-control form-control-sm <?= form_error('font_size_nama_supplier') ? 'is-invalid' : '' ?>" id="font_size_nama_supplier" required>
                <div id='font_size_nama_supplier' class='invalid-feedback'>
                  <?= form_error('font_size_nama_supplier') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_nama_supplier">X :</label>
                <input type="number" name="x_nama_supplier" value="<?= set_value('x_nama_supplier') ?>" class="form-control form-control-sm <?= form_error('x_nama_supplier') ? 'is-invalid' : '' ?>" id="x_nama_supplier" required>
                <div id='x_nama_supplier' class='invalid-feedback'>
                  <?= form_error('x_nama_supplier') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_nama_supplier">Y :</label>
                <input type="number" name="y_nama_supplier" value="<?= set_value('y_nama_supplier') ?>" class="form-control form-control-sm <?= form_error('y_nama_supplier') ? 'is-invalid' : '' ?>" id="y_nama_supplier" required>
                <div id='y_nama_supplier' class='invalid-feedback'>
                  <?= form_error('y_nama_supplier') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" value="<?= set_value('alamat') ?>" class="form-control form-control-sm form-control-inline <?= form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" readonly required>
                <div id='alamat' class='invalid-feedback'>
                  <?= form_error('alamat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_alamat">Size :</label>
                <input type="number" name="font_size_alamat" value="<?= set_value('font_size_alamat') ?>" class="form-control form-control-sm <?= form_error('font_size_alamat') ? 'is-invalid' : '' ?>" id="font_size_alamat" required>
                <div id='font_size_alamat' class='invalid-feedback'>
                  <?= form_error('font_size_alamat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_alamat">X :</label>
                <input type="number" name="x_alamat" value="<?= set_value('x_alamat') ?>" class="form-control form-control-sm <?= form_error('x_alamat') ? 'is-invalid' : '' ?>" id="x_alamat" required>
                <div id='x_alamat' class='invalid-feedback'>
                  <?= form_error('x_alamat') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_alamat">Y :</label>
                <input type="number" name="y_alamat" value="<?= set_value('y_alamat') ?>" class="form-control form-control-sm <?= form_error('y_alamat') ? 'is-invalid' : '' ?>" id="y_alamat" required>
                <div id='y_alamat' class='invalid-feedback'>
                  <?= form_error('y_alamat') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="jenis_produk">Jenis Produk :</label>
                <input type="text" name="jenis_produk" value="<?= set_value('jenis_produk') ?>" class="form-control form-control-sm form-control-inline <?= form_error('jenis_produk') ? 'is-invalid' : '' ?>" id="jenis_produk" readonly required>
                <div id='jenis_produk' class='invalid-feedback'>
                  <?= form_error('jenis_produk') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_jenis_produk">Size :</label>
                <input type="number" name="font_size_jenis_produk" value="<?= set_value('font_size_jenis_produk') ?>" class="form-control form-control-sm <?= form_error('font_size_jenis_produk') ? 'is-invalid' : '' ?>" id="font_size_jenis_produk" required>
                <div id='font_size_jenis_produk' class='invalid-feedback'>
                  <?= form_error('font_size_jenis_produk') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_jenis_produk">X :</label>
                <input type="number" name="x_jenis_produk" value="<?= set_value('x_jenis_produk') ?>" class="form-control form-control-sm <?= form_error('x_jenis_produk') ? 'is-invalid' : '' ?>" id="x_jenis_produk" required>
                <div id='x_jenis_produk' class='invalid-feedback'>
                  <?= form_error('x_jenis_produk') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_jenis_produk">Y :</label>
                <input type="number" name="y_jenis_produk" value="<?= set_value('y_jenis_produk') ?>" class="form-control form-control-sm <?= form_error('y_jenis_produk') ? 'is-invalid' : '' ?>" id="y_jenis_produk" required>
                <div id='y_jenis_produk' class='invalid-feedback'>
                  <?= form_error('y_jenis_produk') ?>
                </div>
              </div>
            </div>
            <div class="form-group row d-flex align-items-end">
              <div class="col-4">
                <label for="tahapan_penanganan">Tahapan Penanganan :</label>
                <input type="text" name="tahapan_penanganan" value="<?= set_value('tahapan_penanganan') ?>" class="form-control form-control-sm form-control-inline <?= form_error('tahapan_penanganan') ? 'is-invalid' : '' ?>" id="tahapan_penanganan" readonly required>
                <div id='tahapan_penanganan' class='invalid-feedback'>
                  <?= form_error('tahapan_penanganan') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="width_tahapan_penanganan">Width</label>
                <input type="number" name="width_tahapan_penanganan" value="<?= set_value('width_tahapan_penanganan') ?>" class="form-control form-control-sm <?= form_error('width_tahapan_penanganan') ? 'is-invalid' : '' ?>" id="width_tahapan_penanganan" required>
                <div id='width_tahapan_penanganan' class='invalid-feedback'>
                  <?= form_error('width_tahapan_penanganan') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_tahapan_penanganan">Size :</label>
                <input type="number" name="font_size_tahapan_penanganan" value="<?= set_value('font_size_tahapan_penanganan') ?>" class="form-control form-control-sm <?= form_error('font_size_tahapan_penanganan') ? 'is-invalid' : '' ?>" id="font_size_tahapan_penanganan" required>
                <div id='font_size_tahapan_penanganan' class='invalid-feedback'>
                  <?= form_error('font_size_tahapan_penanganan') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_tahapan_penanganan">X :</label>
                <input type="number" name="x_tahapan_penanganan" value="<?= set_value('x_tahapan_penanganan') ?>" class="form-control form-control-sm <?= form_error('x_tahapan_penanganan') ? 'is-invalid' : '' ?>" id="x_tahapan_penanganan" required>
                <div id='x_tahapan_penanganan' class='invalid-feedback'>
                  <?= form_error('x_tahapan_penanganan') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_tahapan_penanganan">Y :</label>
                <input type="number" name="y_tahapan_penanganan" value="<?= set_value('y_tahapan_penanganan') ?>" class="form-control form-control-sm <?= form_error('y_tahapan_penanganan') ? 'is-invalid' : '' ?>" id="y_tahapan_penanganan" required>
                <div id='y_tahapan_penanganan' class='invalid-feedback'>
                  <?= form_error('y_tahapan_penanganan') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="klasifikasi">Klasifikasi :</label>
                <input type="text" name="klasifikasi" value="<?= set_value('klasifikasi') ?>" class="form-control form-control-sm form-control-inline <?= form_error('klasifikasi') ? 'is-invalid' : '' ?>" id="klasifikasi" readonly required>
                <div id='klasifikasi' class='invalid-feedback'>
                  <?= form_error('klasifikasi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_klasifikasi">Size :</label>
                <input type="number" name="font_size_klasifikasi" value="<?= set_value('font_size_klasifikasi') ?>" class="form-control form-control-sm <?= form_error('font_size_klasifikasi') ? 'is-invalid' : '' ?>" id="font_size_klasifikasi" required>
                <div id='font_size_klasifikasi' class='invalid-feedback'>
                  <?= form_error('font_size_klasifikasi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_klasifikasi">X :</label>
                <input type="number" name="x_klasifikasi" value="<?= set_value('x_klasifikasi') ?>" class="form-control form-control-sm <?= form_error('x_klasifikasi') ? 'is-invalid' : '' ?>" id="x_klasifikasi" required>
                <div id='x_klasifikasi' class='invalid-feedback'>
                  <?= form_error('x_klasifikasi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_klasifikasi">Y :</label>
                <input type="number" name="y_klasifikasi" value="<?= set_value('y_klasifikasi') ?>" class="form-control form-control-sm <?= form_error('y_klasifikasi') ? 'is-invalid' : '' ?>" id="y_klasifikasi" required>
                <div id='y_klasifikasi' class='invalid-feedback'>
                  <?= form_error('y_klasifikasi') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="tgl_verifikasi">Tgl Verifikasi :</label>
                <input type="text" name="tgl_verifikasi" value="<?= set_value('tgl_verifikasi') ?>" class="form-control form-control-sm form-control-inline <?= form_error('tgl_verifikasi') ? 'is-invalid' : '' ?>" id="tgl_verifikasi" readonly required>
                <div id='tgl_verifikasi' class='invalid-feedback'>
                  <?= form_error('tgl_verifikasi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_tgl_verifikasi">Size :</label>
                <input type="number" name="font_size_tgl_verifikasi" value="<?= set_value('font_size_tgl_verifikasi') ?>" class="form-control form-control-sm <?= form_error('font_size_tgl_verifikasi') ? 'is-invalid' : '' ?>" id="font_size_tgl_verifikasi" required>
                <div id='font_size_tgl_verifikasi' class='invalid-feedback'>
                  <?= form_error('font_size_tgl_verifikasi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_tgl_verifikasi">X :</label>
                <input type="number" name="x_tgl_verifikasi" value="<?= set_value('x_tgl_verifikasi') ?>" class="form-control form-control-sm <?= form_error('x_tgl_verifikasi') ? 'is-invalid' : '' ?>" id="x_tgl_verifikasi" required>
                <div id='x_tgl_verifikasi' class='invalid-feedback'>
                  <?= form_error('x_tgl_verifikasi') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_tgl_verifikasi">Y :</label>
                <input type="number" name="y_tgl_verifikasi" value="<?= set_value('y_tgl_verifikasi') ?>" class="form-control form-control-sm <?= form_error('y_tgl_verifikasi') ? 'is-invalid' : '' ?>" id="y_tgl_verifikasi" required>
                <div id='y_tgl_verifikasi' class='invalid-feedback'>
                  <?= form_error('y_tgl_verifikasi') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="berlaku_sampai">Berlaku Sampai :</label>
                <input type="text" name="berlaku_sampai" value="<?= set_value('berlaku_sampai') ?>" class="form-control form-control-sm form-control-inline <?= form_error('berlaku_sampai') ? 'is-invalid' : '' ?>" id="berlaku_sampai" readonly required>
                <div id='berlaku_sampai' class='invalid-feedback'>
                  <?= form_error('berlaku_sampai') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_berlaku_sampai">Size :</label>
                <input type="number" name="font_size_berlaku_sampai" value="<?= set_value('font_size_berlaku_sampai') ?>" class="form-control form-control-sm <?= form_error('font_size_berlaku_sampai') ? 'is-invalid' : '' ?>" id="font_size_berlaku_sampai" required>
                <div id='font_size_berlaku_sampai' class='invalid-feedback'>
                  <?= form_error('font_size_berlaku_sampai') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_berlaku_sampai">X :</label>
                <input type="number" name="x_berlaku_sampai" value="<?= set_value('x_berlaku_sampai') ?>" class="form-control form-control-sm <?= form_error('x_berlaku_sampai') ? 'is-invalid' : '' ?>" id="x_berlaku_sampai" required>
                <div id='x_berlaku_sampai' class='invalid-feedback'>
                  <?= form_error('x_berlaku_sampai') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_berlaku_sampai">Y :</label>
                <input type="number" name="y_berlaku_sampai" value="<?= set_value('y_berlaku_sampai') ?>" class="form-control form-control-sm <?= form_error('y_berlaku_sampai') ? 'is-invalid' : '' ?>" id="y_berlaku_sampai" required>
                <div id='y_berlaku_sampai' class='invalid-feedback'>
                  <?= form_error('y_berlaku_sampai') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="tanggal">Tanggal :</label>
                <input type="text" name="tanggal" value="<?= set_value('tanggal') ?>" class="form-control form-control-sm form-control-inline <?= form_error('tanggal') ? 'is-invalid' : '' ?>" id="tanggal" readonly required>
                <div id='tanggal' class='invalid-feedback'>
                  <?= form_error('tanggal') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_tanggal">Size :</label>
                <input type="number" name="font_size_tanggal" value="<?= set_value('font_size_tanggal') ?>" class="form-control form-control-sm <?= form_error('font_size_tanggal') ? 'is-invalid' : '' ?>" id="font_size_tanggal" required>
                <div id='font_size_tanggal' class='invalid-feedback'>
                  <?= form_error('font_size_tanggal') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_tanggal">X :</label>
                <input type="number" name="x_tanggal" value="<?= set_value('x_tanggal') ?>" class="form-control form-control-sm <?= form_error('x_tanggal') ? 'is-invalid' : '' ?>" id="x_tanggal" required>
                <div id='x_tanggal' class='invalid-feedback'>
                  <?= form_error('x_tanggal') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_tanggal">Y :</label>
                <input type="number" name="y_tanggal" value="<?= set_value('y_tanggal') ?>" class="form-control form-control-sm <?= form_error('y_tanggal') ? 'is-invalid' : '' ?>" id="y_tanggal" required>
                <div id='y_tanggal' class='invalid-feedback'>
                  <?= form_error('y_tanggal') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="kepala_upt">Kepala UPT BKIPM :</label>
                <input type="text" name="kepala_upt" value="<?= set_value('kepala_upt') ?>" class="form-control form-control-sm form-control-inline <?= form_error('kepala_upt') ? 'is-invalid' : '' ?>" id="kepala_upt" required>
                <div id='kepala_upt' class='invalid-feedback'>
                  <?= form_error('kepala_upt') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_kepala_upt">Size :</label>
                <input type="number" name="font_size_kepala_upt" value="<?= set_value('font_size_kepala_upt') ?>" class="form-control form-control-sm <?= form_error('font_size_kepala_upt') ? 'is-invalid' : '' ?>" id="font_size_kepala_upt" required>
                <div id='font_size_kepala_upt' class='invalid-feedback'>
                  <?= form_error('font_size_kepala_upt') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_kepala_upt">X :</label>
                <input type="number" name="x_kepala_upt" value="<?= set_value('x_kepala_upt') ?>" class="form-control form-control-sm <?= form_error('x_kepala_upt') ? 'is-invalid' : '' ?>" id="x_kepala_upt" required>
                <div id='x_kepala_upt' class='invalid-feedback'>
                  <?= form_error('x_kepala_upt') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_kepala_upt">Y :</label>
                <input type="number" name="y_kepala_upt" value="<?= set_value('y_kepala_upt') ?>" class="form-control form-control-sm <?= form_error('y_kepala_upt') ? 'is-invalid' : '' ?>" id="y_kepala_upt" required>
                <div id='y_kepala_upt' class='invalid-feedback'>
                  <?= form_error('y_kepala_upt') ?>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="unit">Unit :</label>
                <input type="text" name="unit" value="<?= set_value('unit') ?>" class="form-control form-control-sm form-control-inline <?= form_error('unit') ? 'is-invalid' : '' ?>" id="unit" required>
                <div id='unit' class='invalid-feedback'>
                  <?= form_error('unit') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="font_size_unit">Size :</label>
                <input type="number" name="font_size_unit" value="<?= set_value('font_size_unit') ?>" class="form-control form-control-sm <?= form_error('font_size_unit') ? 'is-invalid' : '' ?>" id="font_size_unit" required>
                <div id='font_size_unit' class='invalid-feedback'>
                  <?= form_error('font_size_unit') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="x_unit">X :</label>
                <input type="number" name="x_unit" value="<?= set_value('x_unit') ?>" class="form-control form-control-sm <?= form_error('x_unit') ? 'is-invalid' : '' ?>" id="x_unit" required>
                <div id='x_unit' class='invalid-feedback'>
                  <?= form_error('x_unit') ?>
                </div>
              </div>
              <div class="col-2">
                <label for="y_unit">Y :</label>
                <input type="number" name="y_unit" value="<?= set_value('y_unit') ?>" class="form-control form-control-sm <?= form_error('y_unit') ? 'is-invalid' : '' ?>" id="y_unit" required>
                <div id='y_unit' class='invalid-feedback'>
                  <?= form_error('y_unit') ?>
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