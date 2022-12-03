<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Penilaian Ajuan</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="font-weight-bold mb-0">List Penilaian Ajuan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>No.</th>
              <th>Tanggal Inspeksi</th>
              <th>Kode Penilaian</th>
              <th>Kode Pengajuan</th>
              <th>Mini Plant</th>
              <th>Pimpinan Supplier</th>
              <th>Klasifikasi</th>
              <th>Status</th>
              <th style="text-align:center;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($penilaian as $item) { ?>
              <tr>
                <th class="text-center"><?= $no++ ?></th>
                <td class="text-center" style="width: 125px;"><?= date('d M Y', strtotime($item['tgl_inspeksi'])) ?></td>
                <td class="text-center">
                  <a href="<?= base_url('penilaian/detail/') . $item['kd_penilaian'] ?>" class="badge badge-light" data-toggle="tooltip" data-placement="right" title="Detail"><?= $item['kd_penilaian'] ?></a>
                </td>
                <td class="text-center">
                  <a href="<?= base_url('pengajuan/detail/') . $item['kd_pengajuan'] ?>" class="badge badge-light" data-toggle="tooltip" data-placement="right" title="Detail"><?= $item['kd_pengajuan'] ?></a>
                </td>
                <td><?= $item['nama_miniplant'] ?></td>
                <td><?= $item['nama_pimpinan'] ?></td>
                <td class="text-center">
                  <?php if ($item['klasifikasi'] == 'Sangat Baik') : ?>
                    <span class="badge badge-primary"><?= $item['klasifikasi'] ?></span>
                  <?php elseif ($item['klasifikasi'] == 'Baik') : ?>
                    <span class="badge badge-success"><?= $item['klasifikasi'] ?></span>
                  <?php elseif ($item['klasifikasi'] == 'Cukup') : ?>
                    <span class="badge badge-warning"><?= $item['klasifikasi'] ?></span>
                  <?php elseif ($item['klasifikasi'] == 'Kurang') : ?>
                    <span class="badge badge-danger"><?= $item['klasifikasi'] ?></span>
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <?php if ($item['status'] == 'Lolos') { ?>
                    <span class="badge badge-success"><?= $item['status'] ?></a>
                    <?php } else if ($item['status'] == 'Menunggu Sertifikat') { ?>
                      <span class="badge badge-primary"><?= $item['status'] ?></a>
                      <?php } else if ($item['status'] == 'Perlu Revisi') { ?>
                        <span class="badge badge-warning"><?= $item['status'] ?></a>
                        <?php } else if ($item['status'] == 'Menunggu validasi perbaikan') { ?>
                          <span class="badge badge-primary"><?= $item['status'] ?></a>
                          <?php } else if ($item['status'] == 'Tidak Lolos') { ?>
                            <span class="badge badge-danger"><?= $item['status'] ?></a>
                            <?php } ?>
                </td>
                <td class="text-center">
                  <div class="btn-group" role="group" aria-label="Opsi">
                    <?php $perbaikan = $this->db->get_where('perbaikan', ['kd_penilaian' => $item['kd_penilaian']])->row(); ?>
                    <?php $sertifikat = $this->db->get_where('sertifikat', ['kd_penilaian' => $item['kd_penilaian']])->row(); ?>
                    <a href="<?= base_url('penilaian/detail/' . $item['kd_penilaian']) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Detail"><i class="fas fa-info-circle"></i></a>
                    <a href="<?= base_url('penilaian/ubah/' . $item['kd_penilaian']) ?>" class="btn btn-primary <?= $perbaikan || $sertifikat || $item['status'] == 'Tidak Lolos' ? 'disabled' : '' ?>" data-toggle="tooltip" data-placement="right" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="<?= base_url('penilaian/hapus/' . $item['kd_penilaian']) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger <?= $perbaikan || $sertifikat || $item['status'] == 'Tidak Lolos' ? 'disabled' : '' ?>" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>