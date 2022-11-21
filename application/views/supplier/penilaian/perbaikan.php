<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Form Perbaikan Ajuan</h1>
  <hr>

  <form action="<?= base_url('pengajuan/proses_penilaian') ?>" method="post">
    <input type="hidden" name="kd_penilaian" value="<?= $kd_perbaikan_auto ?>" required>
    <input type="hidden" name="kd_pengajuan" value="<?= $penilaian->kd_pengajuan ?>" required>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="font-weight-bold mb-0"><i class="far fa-file-alt mr-2"></i>Detail Inspeksi</h6>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col">
            <div class="form-group row">
              <label for="nama_miniplant" class="col-sm-4 col-form-label">Nama Mini Plant</label>
              <div class="col-sm-8">
                <input type="hidden" name="kd_supplier" value="<?= $penilaian->kd_supplier ?>">
                <input type="text" name="nama_miniplant" class="form-control" id="nama_miniplant" value="<?= $penilaian->nama_miniplant ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <textarea name="alamat" class="form-control" id="alamat" readonly><?= $penilaian->alamat ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="no_telp" class="col-sm-4 col-form-label">No. Telepon</label>
              <div class="col-sm-8">
                <input type="text" name="no_telp" value="<?= $penilaian->no_telp ?>" class="form-control" id="no_telp" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="no_fax" class="col-sm-4 col-form-label">No. Fax</label>
              <div class="col-sm-8">
                <input type="text" name="no_fax" value="<?= $penilaian->no_fax ?>" class="form-control" id="no_fax" readonly>
              </div>
            </div>
            <hr>
            <div class="form-group row">
              <label for="jenis_produk" class="col-sm-4 col-form-label">Jenis Produk</label>
              <div class="col-sm-8 d-flex align-items-center">
                <?php
                $colors = ["badge-primary", "badge-success", "badge-danger", "badge-warning", "badge-info"];
                $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = jenis_produk_supplier.kd_jenis_produk', 'left');
                $jenis_produk_supplier = $this->db->get_where('jenis_produk_supplier', ['kd_pengajuan' => $ajuan->kd_pengajuan, 'kd_supplier' => $ajuan->kd_supplier])->result_array();
                foreach ($jenis_produk_supplier as $jp) :
                ?>
                  <div class="badge <?= $colors[array_rand($colors)] ?> mr-2"><?= $jp['jenis_produk'] ?></div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group row">
              <?php $cek_pengajuan = $this->db->get_where('pengajuan', ['kd_pengajuan' => $ajuan->kd_pengajuan, 'kd_supplier' => $ajuan->kd_supplier])->num_rows(); ?>
              <label for="jenis_supplier" class="col-sm-4 col-form-label">Jenis Supplier</label>
              <div class="col-sm-8 d-flex align-items-center">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_supplier" id="baru" value="Baru" <?= $cek_pengajuan <= 1 ? 'checked' : '' ?>>
                  <label class="form-check-label" for="baru">Baru</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jenis_supplier" id="lama" value="Lama" <?= $cek_pengajuan > 1 ? 'checked' : '' ?>>
                  <label class="form-check-label" for="lama">Lama</label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="tgl_inspeksi" class="col-sm-4 col-form-label">Tanggal Inspeksi</label>
              <div class="col-sm-8">
                <input type="date" name="tgl_inspeksi" value="<?= date('Y-m-d') ?>" class="form-control" id="tgl_inspeksi" required>
              </div>
            </div>
            <hr>
            <h6 class="font-weight-bold">* Tim Inspeksi</h6>
            <div class="form-group row">
              <label for="pimpinan_supplier" class="col-sm-4 col-form-label">Pimpinan Supplier</label>
              <div class="col-sm-8">
                <input type="text" name="pimpinan_supplier" value="<?= $supplier->nama_supplier ?>" class="form-control" id="pimpinan_supplier" readonly required>
              </div>
            </div>
            <input type="hidden" name="kd_tim_inspeksi" value="<?= $tim_inspeksi->kd_tim_inspeksi ?>">
            <div class="form-group row">
              <label for="ketua_inspeksi" class="col-sm-4 col-form-label">Ketua Inspeksi</label>
              <div class="col-sm-8">
                <input type="text" name="ketua_inspeksi" value="<?= $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->ketua_inspeksi])->row('nama_admin'); ?>" class="form-control" id="ketua_inspeksi" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label for="anggota1" class="col-sm-4 col-form-label">Anggota 1</label>
              <div class="col-sm-8">
                <input type="text" name="anggota1" value="<?= $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->anggota1])->row('nama_admin'); ?>" class="form-control" id="anggota1" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label for="anggota2" class="col-sm-4 col-form-label">Anggota 2</label>
              <div class="col-sm-8">
                <input type="text" name="anggota2" value="<?= $this->db->get_where('admin', ['kd_admin' => $tim_inspeksi->anggota2])->row('nama_admin'); ?>" class="form-control" id="anggota2" readonly required>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="font-weight-bold mb-0"><i class="far fa-file-alt mr-2"></i>Penilaian Hasil Inspeksi</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="text-center">
              <tr class="bg-light" style="filter: brightness(0.95);">
                <th class="text-center">No.</th>
                <th>Nama Isian</th>
                <th colspan="4">KRITERIA</th>
                <th>ACUAN</th>
              </tr>
              <tr>
                <td colspan="7"></td>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($daftar_isian as $di) { ?>
                <tr class="bg-light" style="filter: brightness(0.95);">
                  <th class="text-left"><span class="pl-3"><?= $no; ?></span></th>
                  <th><?= $di['nama_isian'] ?></th>
                  <th>MIN</th>
                  <th>MAY</th>
                  <th>SER</th>
                  <th>KR</th>
                  <th class="text-center">ACUAN</th>
                </tr>

                <?php
                $sub_isian = $this->db->get_where('sub_daftar_isian', ['kd_daftar_isian' => $di['kd_daftar_isian']])->result_array();

                $i = 1;
                foreach ($sub_isian as $si) { ?>
                  <tr>
                    <td class="text-left"><span class="pl-3"><?= $no . '.' . $i++ ?></span></td>
                    <td><?= $si['nama_subisian'] ?></td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_minor']) { ?>
                        <div class="form-check"><input type="checkbox" name="<?= $si['id'] ?>" class="form-check-input position-static checkbox checkbox_is_minor" value="is_minor" id="<?= $si['id'] ?>"></div>
                      <?php } ?>
                    </td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_mayor']) { ?>
                        <div class="form-check"><input type="checkbox" name="<?= $si['id'] ?>" class="form-check-input position-static checkbox checkbox_is_mayor" value="is_mayor" id="<?= $si['id'] ?>"></div>
                      <?php } ?>
                    </td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_serius']) { ?>
                        <div class="form-check"><input type="checkbox" name="<?= $si['id'] ?>" class="form-check-input position-static checkbox checkbox_is_serius" value="is_serius" id="<?= $si['id'] ?>"></div>
                      <?php } ?>
                    </td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_kritis']) { ?>
                        <div class="form-check"><input type="checkbox" name="<?= $si['id'] ?>" class="form-check-input position-static checkbox checkbox_is_kritis" value="is_kritis" id="<?= $si['id'] ?>"></div>
                      <?php } ?>
                    </td>
                    <td><?= $si['acuan'] ?></td>
                  </tr>
                <?php } ?>
                <tr>
                  <td colspan="7"></td>
                </tr>
              <?php
                $no++;
              } ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="font-weight-bold mb-0"><i class="far fa-file-alt mr-2"></i>Tahapan Penanganan</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dynamic_field-proses">
                <tr>
                  <td>
                    <select name="tahap_penanganan[][kd_penanganan]" id="tahap_penanganan[]" class="form-control <?= form_error('tahap_penanganan[]') ? 'is-invalid' : '' ?>" required>
                      <option selected disabled>== Pilih Proses ==</option>
                      <?php foreach ($this->db->get('penanganan')->result_array() as $tp) : ?>
                        <option value="<?= $tp['kd_penanganan'] ?>"><?= $tp['tahap_penanganan'] ?></option>
                      <?php endforeach ?>
                    </select>
                    <div id='tahap_penanganan[]' class='invalid-feedback'>
                      <?= form_error('tahap_penanganan[]') ?>
                    </div>
                  </td>
                  <td><button type="button" name="add" id="addProses" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah Proses</button></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="font-weight-bold mb-0"><i class="far fa-file-alt mr-2"></i>Revision Notes</h6>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dynamic_field-revisi">
                <tr>
                  <td><input type="text" name="notes[][revisi]" placeholder="Tuliskan Sesuatu .." class="form-control"=></td>
                  <td><button type="button" name="add" id="addRevisi" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah Notes</button></td>
                </tr>
              </table>
              <small>Notes :
                <i>Kosongkan field jika tidak ada yg harus supplier perbaiki!
                  <b>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil, libero.</b>
                </i>
              </small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="font-weight-bold mb-0">Jumlah Penyimpangan</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <tr class="bg-light">
              <th>KESIMPULAN</th>
              <th class="text-center">MINOR</th>
              <th class="text-center">MAYOR</th>
              <th class="text-center">SERIUS</th>
              <th class="text-center">KRITIS</th>
            </tr>
            <tr>
              <th class="bg-light" style="width: 200px !important;">Penyimpangan Total</th>
              <td class="text-center"><input type="number" name="jmlMinor" value="0" class="form-control form-control-sm text-center" id="jmlMinor" readonly required></td>
              <td class="text-center"><input type="number" name="jmlMayor" value="0" class="form-control form-control-sm text-center" id="jmlMayor" readonly required></td>
              <td class="text-center"><input type="number" name="jmlSerius" value="0" class="form-control form-control-sm text-center" id="jmlSerius" readonly required></td>
              <td class="text-center"><input type="number" name="jmlKritis" value="0" class="form-control form-control-sm text-center" id="jmlKritis" readonly required></td>
            </tr>
          </table>
        </div>
        <div class="alert alert-warning" role="alert">
          <div class="row">
            <div class="col">
              <label class="sr-only" for="klasifikasi">-</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text font-weight-bold text-uppercase">Klasifikasi</div>
                </div>
                <input type="text" name="klasifikasi" value="<?= set_value('klasifikasi') ?>" class="form-control bg-light <?= form_error('klasifikasi') ? 'is-invalid' : '' ?>" id="klasifikasi" readonly required>
                <div id='klasifikasi' class='invalid-feedback'>
                  <?= form_error('klasifikasi') ?>
                </div>
              </div>
            </div>
            <div class="col d-flex align-items-center">
              <div class="custom-control custom-switch">
                <input type="checkbox" name="is_needRevisi" value="1" onclick="return false;" class="custom-control-input" id="is_needRevisi">
                <label class="custom-control-label" for="is_needRevisi">Butuh Perbaikan?</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="font-weight-bold mb-0">DETAIL KLASIFIKASI</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-sm table-bordered mb-0">
            <tr class="bg-light text-center">
              <th rowspan="2" class="align-middle">KLASIFIKASI</th>
              <th colspan="4">JUMLAH PENYIMPANGAN</th>
            </tr>
            <tr class="bg-light text-center">
              <th class="text-center">MINOR</th>
              <th class="text-center">MAYOR</th>
              <th class="text-center">SERIUS</th>
              <th class="text-center">KRITIS</th>
            </tr>
            <tr>
              <th class="bg-light">Sangat Baik</th>
              <td class="text-center tdKlasifikasi" id="minor_6">0 - 6</td>
              <td class="text-center tdKlasifikasi" id="mayor_5">0 - 5</td>
              <td class="text-center tdKlasifikasi" id="serius_0">0</td>
              <td class="text-center tdKlasifikasi" id="kritis_01">0</td>
            </tr>
            <tr>
              <th class="bg-light">BAIK</th>
              <td class="text-center tdKlasifikasi" id="minor_7">&GreaterEqual; 7</td>
              <td class="text-center tdKlasifikasi" id="mayor_10">6 - 10</td>
              <td class="text-center tdKlasifikasi" id="serius_2">1 - 2</td>
              <td class="text-center tdKlasifikasi" id="kritis_02">0</td>
            </tr>
            <tr>
              <th class="bg-light">Cukup</th>
              <td class="text-center tdKlasifikasi" id="minor_na">*NA</td>
              <td class="text-center tdKlasifikasi" id="mayor_11">&GreaterEqual; 11</td>
              <td class="text-center tdKlasifikasi" id="serius_4">3 - 4</td>
              <td class="text-center tdKlasifikasi" id="kritis_03">0</td>
            </tr>
            <tr>
              <th class="bg-light">Kurang</th>
              <td class="text-center tdKlasifikasi" id="minor_na">*NA</td>
              <td class="text-center tdKlasifikasi" id="mayor_na">*NA</td>
              <td class="text-center tdKlasifikasi" id="serius_5">&GreaterEqual; 5</td>
              <td class="text-center tdKlasifikasi" id="kritis_1">&GreaterEqual; 1</td>
            </tr>
          </table>
          <small class="text-muted">*NA = NOT APPLICABLE</small>
        </div>
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row">
          <div class="col-md-9">
            <small>Notes :
              <i>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error nulla alias consequuntur corrupti ea porro vero impedit assumenda dicta labore!
                <b>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil, libero.
                </b>
              </i>
            </small>
          </div>
          <div class="col-md-3 text-right d-flex align-items-center justify-content-around border border-dark border-top-0 border-right-0 border-bottom-0">
            <button type="reset" class="btn btn-secondary"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- </div> -->