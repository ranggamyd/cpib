<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Perbaikan Ajuan</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="font-weight-bold mb-0">List Perbaikan Ajuan</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
              <th>Tanggal</th>
              <th>Kode Perbaikan</th>
              <th>Kode Penilaian</th>
              <th>Mini Plant</th>
              <th>Pimpinan Supplier</th>
              <th>Status</th>
              <th style="text-align:center;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($perbaikan_ajuan as $item) { ?>
              <tr>
                <td align="center"><?= $no++; ?></td>
                <td class="text-center"><?= date('d M Y', strtotime($item['tgl_perbaikan'])) ?></td>
                <td class="text-center"><span class="badge badge-white"><?= $item['kd_perbaikan']; ?></span></td>
                <td class="text-center"><span class="badge badge-white"><?= $item['kd_penilaian']; ?></span></td>
                <td><?= $item['nama_miniplant']; ?></td>
                <td><?= $item['nama_pimpinan'] ?></td>
                <td class="text-center">
                  <?php if ($item['status'] == 'Menunggu Validasi Admin') : ?>
                    <a href="<?= base_url('perbaikan/validasi/') . $item['kd_perbaikan'] ?>" class="badge badge-primary" data-toggle="tooltip" data-placement="right" title="Validasi Perbaikan?">Menunggu Validasi</a>
                  <?php elseif ($item['status'] == 'Lolos') : ?>
                    <div class="badge badge-success"><?= $item['status']; ?></div>
                  <?php elseif ($item['status'] == 'Perlu Revisi Kembali') : ?>
                    <div class="badge badge-warning"><?= $item['status']; ?></div>
                  <?php elseif ($item['status'] == 'Tidak Lolos') : ?>
                    <div class="badge badge-danger"><?= $item['status']; ?></div>
                  <?php endif; ?>
                </td>
                <td align="center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="<?= base_url('perbaikan/detail/' . $item['kd_perbaikan']) ?>" class="btn btn-success"><i class="fas fa-info-circle"></i></a>
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