<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Perbaikan Ajuan</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <!-- <a href="<?= base_url('perbaikan_ajuan/perbaiki_ajuan') ?>" class="btn btn-sm btn-primary" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Ajuan</a> -->
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
              <th>Tanggal</th>
              <th>Kode Perbaikan</th>
              <th>Kode Pengajuan</th>
              <th>Nama Supplier</th>
              <th>Nama Mini Plant</th>
              <th>Jenis Produk</th>
              <th>Status</th>
              <th style="text-align:center;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($perbaikan_ajuan as $ajuan) { ?>
              <tr>
                <td align="center"><?= $no++; ?></td>
                <td class="text-center"><?= date('d-M-Y', strtotime($ajuan['tgl_perbaikan_ajuan'])) ?></td>
                <td class="text-center"><span class="badge badge-white"><?= $ajuan['kd_perbaikan_ajuan']; ?></span></td>
                <td class="text-center"><span class="badge badge-white"><?= $ajuan['kd_pengajuan']; ?></span></td>
                <td><?= $ajuan['nama_supplier'] ?></td>
                <td><?= $ajuan['nama_miniplant']; ?></td>
                <td><?= $ajuan['jenis_produk']; ?></td>
                <td class="text-center">
                  <?php if ($ajuan['status'] == 'Tertunda') : ?>
                    <div class="badge badge-primary"><?= $ajuan['status']; ?></div>
                  <?php elseif ($ajuan['status'] == 'Perlu Revisi') : ?>
                    <div class="badge badge-warning"><?= $ajuan['status']; ?></div>
                  <?php elseif ($ajuan['status'] == 'Diterima') : ?>
                    <div class="badge badge-success"><?= $ajuan['status']; ?></div>
                  <?php endif; ?>
                </td>
                <td align="center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="<?= base_url('perbaikan_ajuan/detail/' . $ajuan['kd_perbaikan_ajuan']) ?>" class="btn btn-success"><i class="fas fa-info-circle"></i></a>
                    <a href="<?= base_url('perbaikan_ajuan/ubah/' . $ajuan['kd_perbaikan_ajuan']) ?>" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="<?= base_url('perbaikan_ajuan/hapus/' . $ajuan['kd_perbaikan_ajuan']) ?>" data-toggle="modal" data-target="#hapus_ajuan<?= $ajuan['kd_perbaikan_ajuan'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
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

<?php foreach ($perbaikan_ajuan as $ajuan) { ?>
  <!-- Modal Hapus ajuan-->
  <div class="modal fade" id="hapus_ajuan<?= $ajuan['kd_perbaikan_ajuan'] ?>" tabindex="-1" aria-labelledby="hapus_ajuanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapus_ajuanLabel">Konfirmasi Hapus !!!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('perbaikan_ajuan/hapus') ?>" method="post">
            <input type="hidden" name="kd_perbaikan_ajuan" id="kd_perbaikan_ajuan" value="<?= $ajuan['kd_perbaikan_ajuan'] ?>" readonly>
            Apakah Yakin Ingin Menghapus Ajuan Ini :<br>
            <b><?= $ajuan['kd_perbaikan_ajuan'] ?> - <?= $ajuan['nama_supplier'] ?></b>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>