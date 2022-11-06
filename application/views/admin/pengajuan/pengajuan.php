<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Ajuan Supplier</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?= base_url('pengajuan/tambah_ajuan') ?>" class="btn btn-sm btn-primary" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Ajuan</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
              <th>Tanggal</th>
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
            foreach ($pengajuan as $ajuan) { ?>
              <tr>
                <td align="center"><?= $no++; ?></td>
                <td class="text-center"><?= date('d-M-Y', strtotime($ajuan['tgl_pengajuan'])) ?></td>
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
                    <a href="<?= base_url('pengajuan/detail/' . $ajuan['kd_pengajuan']) ?>" class="btn btn-success"><i class="fas fa-info-circle"></i></a>
                    <a href="<?= base_url('pengajuan/ubah/' . $ajuan['kd_pengajuan']) ?>" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="<?= base_url('pengajuan/hapus/' . $ajuan['kd_pengajuan']) ?>" data-toggle="modal" data-target="#hapus_ajuan<?= $ajuan['kd_pengajuan'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
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

<?php foreach ($pengajuan as $ajuan) { ?>
  <!-- Modal Hapus ajuan-->
  <div class="modal fade" id="hapus_ajuan<?= $ajuan['kd_pengajuan'] ?>" tabindex="-1" aria-labelledby="hapus_ajuanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="hapus_ajuanLabel">Konfirmasi Hapus !!!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('pengajuan/hapus') ?>" method="post">
            <input type="hidden" name="kd_pengajuan" id="kd_pengajuan" value="<?= $ajuan['kd_pengajuan'] ?>" readonly>
            Apakah Yakin Ingin Menghapus Ajuan Ini :<br>
            <b><?= $ajuan['kd_pengajuan'] ?> - <?= $ajuan['nama_supplier'] ?></b>
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