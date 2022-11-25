<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">List Penilaian Inspeksi</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="font-weight-bold mb-0">Data Hasil Inspeksi</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
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
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= date('d M Y', strtotime($item['tgl_inspeksi'])) ?></td>
                <td class="text-center">
                  <a href="<?= base_url('penilaian/detail/') . $item['kd_penilaian'] ?>" class="badge badge-light"><?= $item['kd_penilaian'] ?></a>
                </td>
                <td class="text-center">
                  <a href="<?= base_url('pengajuan/detail/') . $item['kd_pengajuan'] ?>" class="badge badge-light"><?= $item['kd_pengajuan'] ?></a>
                </td>
                <td><?= $item['nama_miniplant'] ?></td>
                <td><?= $item['nama_pimpinan'] ?></td>
                <td class="text-center">
                  <?php if ($item['klasifikasi'] == 'Sangat Baik') : ?>
                    <span class="badge badge-primary">Sangat Baik</span>
                  <?php elseif ($item['klasifikasi'] == 'BAIK') : ?>
                    <span class="badge badge-success">BAIK</span>
                  <?php elseif ($item['klasifikasi'] == 'Cukup') : ?>
                    <span class="badge badge-warning">Cukup</span>
                  <?php elseif ($item['klasifikasi'] == 'Kurang') : ?>
                    <span class="badge badge-danger">KUREENGGG!!!!!</span>
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <?php if ($item['is_need_revisi'] == 1) : ?>
                    <a href="<?= base_url('penilaian/perbaiki/' . $item['kd_penilaian']) ?>" class="badge badge-warning" data-toggle="tooltip" data-placement="right" title="Perbaiki Ajuan?">Perlu Revisi</a>
                  <?php elseif ($item['is_need_revisi'] == 0) : ?>
                    <span class="badge badge-success">Lolos Inspeksi</span>
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <?php if ($item['is_need_revisi'] == 0 && !$this->db->get_where('sertifikat', ['kd_penilaian' => $item['kd_penilaian']])->row()) : ?>
                      <a href="<?= base_url('sertifikat/generate/') . $item['kd_penilaian'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Generate Certificate"><i class="fas fa-print"></i></a>
                    <?php endif ?>
                    <a href="<?= base_url('penilaian/detail/') . $item['kd_penilaian'] ?>" class="btn btn-info" data-toggle="tooltip" data-placement="right" title="Detail Penilaian"><i class="fas fa-info-circle"></i></a>
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