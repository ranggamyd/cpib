<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Form Isian (Checklist) Penilaian Kelayakan Supplier</h1>
  <hr>

  <form action="<?= base_url('pengajuan/proses_penilaian') ?>" method="post">
  <input type="hidden" name="kd_penilaian" value="<?= $kd_penilaian_auto ?>">
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
                <input type="hidden" name="kd_supplier" value="<?= $supplier->kd_supplier ?>">
                <input type="text" name="nama_miniplant" class="form-control" id="nama_miniplant" value="<?= $nama_miniplant ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <textarea name="alamat" class="form-control" id="alamat" readonly><?= $supplier->alamat ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="no_telp" class="col-sm-4 col-form-label">No. Telepon</label>
              <div class="col-sm-8">
                <input type="text" name="no_telp" class="form-control" id="no_telp" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="no_fax" class="col-sm-4 col-form-label">No. Fax</label>
              <div class="col-sm-8">
                <input type="text" name="no_fax" class="form-control" id="no_fax" readonly>
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
                        <div class="form-check"><input type="checkbox" name="<?= $si['id'] ?>" class="form-check-input position-static" value="is_minor" id="<?= $si['id'] ?>"></div>
                      <?php } ?>
                    </td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_mayor']) { ?>
                        <div class="form-check"><input type="checkbox" name="<?= $si['id'] ?>" class="form-check-input position-static" value="is_mayor" id="<?= $si['id'] ?>"></div>
                      <?php } ?>
                    </td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_serius']) { ?>
                        <div class="form-check"><input type="checkbox" name="<?= $si['id'] ?>" class="form-check-input position-static" value="is_serius" id="<?= $si['id'] ?>"></div>
                      <?php } ?>
                    </td>
                    <td class="text-center align-middle">
                      <?php
                      if ($si['is_kritis']) { ?>
                        <div class="form-check"><input type="checkbox" name="<?= $si['id'] ?>" class="form-check-input position-static" value="is_kritis" id="<?= $si['id'] ?>"></div>
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
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="font-weight-bold mb-0"><i class="far fa-file-alt mr-2"></i>Revision Notes</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dynamic_field">
            <tr>
              <td><input type="text" name="notes[][revisi]" placeholder="Hal yang perlu direvisi" class="form-control revision_notes" required=></td>
              <td><button type="button" name="add" id="add" class="btn btn-success"><i class="fas fa-plus-circle mr-2"></i>Tambah Notes</button></td>
            </tr>
          </table>
          <div class="text-right">
            <button type="reset" class="btn btn-secondary"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<!-- </div> -->