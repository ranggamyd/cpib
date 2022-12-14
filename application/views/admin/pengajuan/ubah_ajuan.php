<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Form Permohonan Sertifikasi CPIB</h1>
  <hr>

  <div class="row">
    <div class="col-md-10">
      <div class="card shadow mb-4">
        <form action="<?= base_url('pengajuan/ubah') ?>" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col-md-5">
                <label for="kd_pengajuan">Kode Ajuan :</label>
                <input type="text" name="kd_pengajuan" class="form-control mb-3 <?= form_error('kd_pengajuan') ? 'is-invalid' : '' ?>" id="kd_pengajuan" value="<?= set_value('kd_pengajuan', $pengajuan->kd_pengajuan) ?>" required readonly>
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
            <div class="bg-info rounded pt-3 pb-3 text-light">
              <div class="row px-4">
                <div class="col">
                  <label for="kd_supplier">Supplier :</label>
                  <div class="row">
                    <div class="col">
                      <select name="kd_supplier" id="kd_supplier" class="form-control mb-3 <?= form_error('kd_supplier') ? 'is-invalid' : '' ?>" required>
                        <option selected disabled>== Pilih Supplier ==</option>
                        <?php foreach ($suppliers as $spl) : ?>
                          <option value="<?= $spl['kd_supplier'] ?>" <?= set_select('kd_supplier', $spl['kd_supplier'], $pengajuan->kd_supplier == $spl['kd_supplier'] ? true : false); ?>><?= $spl['nama_miniplant'] ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="col-2">
                      <a href="<?= base_url('suppliers') ?>" class="btn btn-outline-light btn-block" data-toggle="tooltip" data-placement="right" title="Tambah Supplier"><i class="fas fa-plus-circle mt-1"></i></a>
                    </div>
                    <div id='kd_supplier' class='invalid-feedback'>
                      <?= form_error('kd_supplier') ?>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <label for="kd_jenis_produk[]">Jenis Produk :</label>
                  <div id="dynamic-product">
                    <?php
                    $jenis_produk = $this->db->get_where('jenis_produk', ['kd_pengajuan' => $pengajuan->kd_pengajuan, 'kd_supplier' => $pengajuan->kd_supplier])->result_array();
                    $i = 1;
                    foreach ($jenis_produk as $jp) :
                      $i++;
                    ?>
                      <div class="row mb-2" id="productRow-<?= $i ?>">
                        <div class="col"><input type="text" name="jenis_produk[][produk]" value="<?= $jp['jenis_produk'] ?>" placeholder="Nama Produk .." class="form-control" required></div>
                        <div class="col-2"><button type="button" class="btn btn-danger btn-block ml-2 removeProduct" id="<?= $i ?>" data-toggle="tooltip" data-placement="right" title="Hapus Produk"><i class="fas fa-backspace"></i></button></div>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>

            <hr>
            <label for="surat_permohonan">Surat Permohonan <span class="text-danger font-weight-bold">*</span></label>
            <input type="file" name="surat_permohonan" class="form-control-file mb-3 <?= form_error('surat_permohonan') ? 'is-invalid' : '' ?>" id="surat_permohonan" required>
            <div id='surat_permohonan' class='invalid-feedback'>
              <?= form_error('surat_permohonan') ?>
            </div>
            <hr class="mt-4">

            <h5 class="font-weight-bold">Kelengkapan Dokumen</h5>

            <div class="row mt-3">
              <div class="col-md-6">
                <label for="ktp">KTP <span class="text-danger font-weight-bold">*</span></label>
                <input type="file" name="ktp" id="ktp" class="form-control-file mb-3 <?= form_error('ktp') ? 'is-invalid' : '' ?>" accept="image/*,.pdf" required>
                <div id='ktp' class='invalid-feedback'>
                  <?= form_error('ktp') ?>
                </div>
                <label for="npwp">NPWP <span class="text-danger font-weight-bold">*</span></label>
                <input type="file" name="npwp" id="npwp" class="form-control-file mb-3 <?= form_error('npwp') ? 'is-invalid' : '' ?>" accept="image/*,.pdf" required>
                <div id='npwp' class='invalid-feedback'>
                  <?= form_error('npwp') ?>
                </div>
                <label for="nib">NIB</label>
                <input type="file" name="nib" id="nib" class="form-control-file mb-3" accept="image/*,.pdf">
                <label for="siup">SIUP</label>
                <input type="file" name="siup" id="siup" class="form-control-file mb-3" accept="image/*,.pdf">
              </div>
              <div class="col-md-6">
                <label for="akta_usaha">Akta Usaha</label>
                <input type="file" name="akta_usaha" id="akta_usaha" class="form-control-file mb-3" accept="image/*,.pdf">
                <label for="imb">IMB</label>
                <input type="file" name="imb" id="imb" class="form-control-file mb-3" accept="image/*,.pdf">
                <label for="layout">Lay Out / Denah Lokasi <span class="text-danger font-weight-bold">*</span></label>
                <input type="file" name="layout" id="layout" class="form-control-file mb-3 <?= form_error('layout') ? 'is-invalid' : '' ?>" accept="image/*,.pdf" required>
                <div id='layout' class='invalid-feedback'>
                  <?= form_error('layout') ?>
                </div>
                <label for="panduan_mutu">Panduan Mutu GMP-SSOP <span class="text-danger font-weight-bold">*</span></label>
                <input type="file" name="panduan_mutu" id="panduan_mutu" class="form-control-file mb-3 <?= form_error('panduan_mutu') ? 'is-invalid' : '' ?>" accept="image/*,.pdf" required>
                <div id='panduan_mutu' class='invalid-feedback'>
                  <?= form_error('panduan_mutu') ?>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="reset" class="btn btn-secondary"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-file-import mr-2"></i>Ajukan Permohonan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>