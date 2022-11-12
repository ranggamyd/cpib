<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Form Isian (Checklist) Penilaian Kelayakan Supplier</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="mb-0">Review Hasil Inspeksi</h6>
      <!-- <a href="#" data-toggle="modal" data-target="#tambah_kategori" class=" btn btn-sm btn-primary" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Kategori</a> -->
    </div>
    <div class="card-body">
      <form action="<?= base_url('pengajuan/proses_penilaian') ?>" method="post">
        <div class="row mb-3">
          <div class="col">
            <div class="form-group row">
              <label for="nama_supplier" class="col-sm-4 col-form-label">Nama Supplier</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="nama_supplier" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <textarea name="alamat" class="form-control" id="alamat" readonly required></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-sm-4 col-form-label">No. Telepon</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="phone" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label for="fax" class="col-sm-4 col-form-label">No. Fax</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="fax" readonly required>
              </div>
            </div>
            <hr>
            <div class="form-group row">
              <label for="jenis_produk" class="col-sm-4 col-form-label">Jenis Produk</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="jenis_produk" readonly required>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group row">
              <label for="tgl_inspeksi" class="col-sm-4 col-form-label">Tanggal Inspeksi</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="tgl_inspeksi" readonly required>
              </div>
            </div>
            <hr>
            <h6 class="font-weight-bold">* Tim Inspeksi</h6>
            <div class="form-group row">
              <label for="ketua_anggota" class="col-sm-4 col-form-label">Ketua Anggota</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="ketua_anggota" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label for="anggota1" class="col-sm-4 col-form-label">Anggota 1</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="anggota1" readonly required>
              </div>
            </div>
            <div class="form-group row">
              <label for="anggota2" class="col-sm-4 col-form-label">Anggota 2</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="anggota2" readonly required>
              </div>
            </div>

          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    <td class="text-center">
                      <?php
                      if ($si['is_minor']) { ?>
                        <div class="form-check"><input type="checkbox" name="kriteria-<?= $si['id'] ?>" class="form-check-input position-static" value="1" id="kriteria-<?= $si['id'] ?>"></div>
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <?php
                      if ($si['is_mayor']) { ?>
                        <div class="form-check"><input type="checkbox" name="kriteria-<?= $si['id'] ?>" class="form-check-input position-static" value="1" id="kriteria-<?= $si['id'] ?>"></div>
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <?php
                      if ($si['is_serius']) { ?>
                        <div class="form-check"><input type="checkbox" name="kriteria-<?= $si['id'] ?>" class="form-check-input position-static" value="1" id="kriteria-<?= $si['id'] ?>"></div>
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <?php
                      if ($si['is_kritis']) { ?>
                        <div class="form-check"><input type="checkbox" name="kriteria-<?= $si['id'] ?>" class="form-check-input position-static" value="1" id="kriteria-<?= $si['id'] ?>"></div>
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
      </form>
    </div>
  </div>
</div>
<!-- </div> -->