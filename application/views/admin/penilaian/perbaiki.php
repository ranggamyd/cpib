<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Detail Penilaian</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="font-weight-bold mb-0"><i class="far fa-file-alt mr-2"></i>Detail Inspeksi</h6>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col">
          <div class="form-group row">
            <label for="nama_miniplant" class="col-sm-4 col-form-label">Mini Plant</label>
            <div class="col-sm-8">
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
              foreach ($jps as $jp) :
              ?>
                <div class="badge <?= $colors[array_rand($colors)] ?> mr-2"><?= $jp['jenis_produk'] ?></div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="form-group row">
            <label for="jenis_supplier" class="col-sm-4 col-form-label">Jenis Supplier</label>
            <div class="col-sm-8 d-flex align-items-center">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_supplier" id="baru" value="Baru" <?= $jenis_supplier == 'Baru' ? 'checked' : '' ?>>
                <label class="form-check-label" for="baru">Baru</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_supplier" id="lama" value="Lama" <?= $jenis_supplier == 'Lama' ? 'checked' : '' ?>>
                <label class="form-check-label" for="lama">Lama</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="tgl_inspeksi" class="col-sm-4 col-form-label">Tanggal Inspeksi</label>
            <div class="col-sm-8">
              <input type="text" name="tgl_inspeksi" value="<?= date('d M Y', strtotime($penilaian->tgl_inspeksi)) ?>" class="form-control" id="tgl_inspeksi" required>
            </div>
          </div>
          <hr>
          <h6 class="font-weight-bold">* Tim Inspeksi</h6>
          <div class="form-group row">
            <label for="pimpinan_supplier" class="col-sm-4 col-form-label">Pimpinan Supplier</label>
            <div class="col-sm-8">
              <input type="text" name="pimpinan_supplier" value="<?= $penilaian->nama_pimpinan ?>" class="form-control" id="pimpinan_supplier" readonly required>
            </div>
          </div>
          <div class="form-group row">
            <label for="ketua_inspeksi" class="col-sm-4 col-form-label">Ketua Inspeksi</label>
            <div class="col-sm-8">
              <input type="text" name="ketua_inspeksi" value="<?= $ketua_tim ?>" class="form-control" id="ketua_inspeksi" readonly required>
            </div>
          </div>
          <div class="form-group row">
            <label for="anggota1" class="col-sm-4 col-form-label">Anggota 1</label>
            <div class="col-sm-8">
              <input type="text" name="anggota1" value="<?= $anggota1 ?>" class="form-control" id="anggota1" readonly required>
            </div>
          </div>
          <div class="form-group row">
            <label for="anggota2" class="col-sm-4 col-form-label">Anggota 2</label>
            <div class="col-sm-8">
              <input type="text" name="anggota2" value="<?= $anggota2 ?>" class="form-control" id="anggota2" readonly required>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="font-weight-bold mb-0"><i class="far fa-file-alt mr-2"></i>Revision Notes</h6>
    </div>
    <form action="<?= base_url('penilaian/proses_perbaikan') ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="kd_supplier" value="<?= $penilaian->kd_supplier ?>" required>
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label for="kd_perbaikan">Kode Perbaikan</label>
              <input type="text" name="kd_perbaikan" value="<?= $kd_perbaikan_auto ?>" class="form-control" id="kd_perbaikan" readonly required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="kd_penilaian">Kode Penilaian</label>
              <input type="text" name="kd_penilaian" value="<?= $penilaian->kd_penilaian ?>" class="form-control" id="kd_penilaian" readonly required>
            </div>
          </div>
          <div class="col-md-4 offset-md-2">
            <div class="form-group">
              <label for="tgl_perbaikan">Tanggal Perbaikan</label>
              <input type="date" name="tgl_perbaikan" value="<?= date('Y-m-d') ?>" class="form-control" id="tgl_perbaikan" required>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th width="50" class="text-center">No.</th>
                <th>Revisi</th>
                <th>Dokumen Perbaikan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($notes as $item) :
              ?>
                <tr>
                  <th class="text-center"><?= $i++ ?></th>
                  <td><?= $item['notes'] ?></td>
                  <td><input type="file" name="<?= $item['id'] ?>" accept="image/*,.pdf" class="form-control-file"></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <button class="btn btn-outline-info" type="button" data-toggle="collapse" data-target="#detailPenilaian" aria-expanded="false" aria-controls="detailPenilaian">
          <i class="fas fa-eye mr-2"></i>Lihat Detail Penilaian
        </button>
        <div>
          <button type="reset" class="btn btn-secondary"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Perbaiki Ajuan</button>
        </div>
      </div>
    </form>
  </div>

  <div class="collapse" id="detailPenilaian">
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
              foreach ($kategori_daftar_isian as $di) { ?>
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
                $sub_isian = $this->db->get_where('daftar_isian', ['kd_daftar_isian' => $di['kd_daftar_isian']])->result_array();

                $i = 1;
                foreach ($sub_isian as $si) { ?>
                  <tr>
                    <td class="text-left"><span class="pl-3"><?= $no . '.' . $i++ ?></span></td>
                    <td><?= $si['nama_subisian'] ?></td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_minor']) { ?>
                        <?= in_array($si['id'], array_column($penilaian_detail, 'id_daftar_isian')) && in_array(1, array_column($penilaian_detail, 'is_minor')) ? '<i class="fas fa-check-circle fa-lg text-info"></i>' : '<i class="fas fa-circle fa-lg" style="color: #dee2e6;"></i>' ?>
                      <?php } ?>
                    </td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_mayor']) { ?>
                        <?= in_array($si['id'], array_column($penilaian_detail, 'id_daftar_isian')) && in_array(1, array_column($penilaian_detail, 'is_mayor')) ? '<i class="fas fa-check-circle fa-lg text-info"></i>' : '<i class="fas fa-circle fa-lg" style="color: #dee2e6;"></i>' ?>
                      <?php } ?>
                    </td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_serius']) { ?>
                        <?= in_array($si['id'], array_column($penilaian_detail, 'id_daftar_isian')) && in_array(1, array_column($penilaian_detail, 'is_serius')) ? '<i class="fas fa-check-circle fa-lg text-info"></i>' : '<i class="fas fa-circle fa-lg" style="color: #dee2e6;"></i>' ?>
                      <?php } ?>
                    </td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_kritis']) { ?>
                        <?= in_array($si['id'], array_column($penilaian_detail, 'id_daftar_isian')) && in_array(1, array_column($penilaian_detail, 'is_kritis')) ? '<i class="fas fa-check-circle fa-lg text-info"></i>' : '<i class="fas fa-circle fa-lg" style="color: #dee2e6;"></i>' ?>
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
            <?php foreach ($penanganan as $item) : ?>
              <?= $item['nama_penanganan'] ?> -
            <?php endforeach ?>
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
              <td class="text-center"><input type="number" name="jmlMinor" value="<?= $penilaian->jml_minor ?>" class="form-control form-control-sm text-center" id="jmlMinor" readonly required></td>
              <td class="text-center"><input type="number" name="jmlMayor" value="<?= $penilaian->jml_mayor ?>" class="form-control form-control-sm text-center" id="jmlMayor" readonly required></td>
              <td class="text-center"><input type="number" name="jmlSerius" value="<?= $penilaian->jml_serius ?>" class="form-control form-control-sm text-center" id="jmlSerius" readonly required></td>
              <td class="text-center"><input type="number" name="jmlKritis" value="<?= $penilaian->jml_kritis ?>" class="form-control form-control-sm text-center" id="jmlKritis" readonly required></td>
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
          <div class="col-md-10">
            <small>Notes :
              <i>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error nulla alias consequuntur corrupti ea porro vero impedit assumenda dicta labore!
                <b>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil, libero.
                </b>
              </i>
            </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- </div> -->