<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Daftar Permohonan Sertifikasi CPIB</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="<?= base_url('pengajuan_supplier/tambah_ajuan') ?>" class="btn btn-sm btn-primary" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Ajukan Permohonan Baru</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th class="text-center">No.</th>
              <th>Tanggal Pengajuan</th>
              <th>Kode Pengajuan</th>
              <th>Mini Plant</th>
              <th>Pimpinan Supplier</th>
              <th>Jenis Produk</th>
              <th>Status</th>
              <th style="text-align:center;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($pengajuan as $item) { ?>
              <tr>
                <th class="text-center"><?= $no++; ?></th>
                <td class="text-center" style="width: 125px;"><?= date('d M Y', strtotime($item['tgl_pengajuan'])) ?></td>
                <td class="text-center"><a href="<?= base_url('pengajuan_supplier/detail/') . $item['kd_pengajuan'] ?>" class="badge badge-light" data-toggle="tooltip" data-placement="right" title="Detail"><?= $item['kd_pengajuan']; ?></a></td>
                <td><?= $item['nama_miniplant'] ?></td>
                <td><?= $item['nama_pimpinan'] ?></td>
                <td class="text-center">
                  <?php
                  $colors = ["badge-primary", "badge-success", "badge-danger", "badge-warning", "badge-info"];
                  $jenis_produk = $this->db->get_where('jenis_produk', ['kd_pengajuan' => $item['kd_pengajuan'], 'kd_supplier' => $item['kd_supplier']])->result_array();
                  foreach ($jenis_produk as $jp) :
                  ?>
                    <div class="badge <?= $colors[array_rand($colors)] ?>"><?= $jp['jenis_produk'] ?></div>
                  <?php endforeach; ?>
                </td>
                <td class="text-center">
                  <?php if ($item['status'] == 'Tertunda') { ?>
                    <span class="badge badge-primary"><?= $item['status'] ?></span>
                  <?php } elseif ($item['status'] == 'Dalam proses Inspeksi') { ?>
                    <span class="badge badge-info"><?= $item['status'] ?></span>
                  <?php } elseif ($item['status'] == 'Menunggu Sertifikat') { ?>
                    <span class="badge badge-primary"><?= $item['status'] ?></span>
                  <?php } elseif ($item['status'] == 'Lolos') { ?>
                    <span class="badge badge-success"><?= $item['status'] ?></span>
                  <?php } elseif ($item['status'] == 'Perlu Revisi') { ?>
                    <span class="badge badge-warning"><?= $item['status'] ?></span>
                  <?php } elseif ($item['status'] == 'Menunggu validasi perbaikan') { ?>
                    <span class="badge badge-primary"><?= $item['status'] ?></span>
                  <?php } elseif ($item['status'] == 'Tidak Lolos') { ?>
                    <span class="badge badge-danger"><?= $item['status'] ?></span>
                  <?php } ?>
                </td>
                <td class="text-center">
                  <div class="btn-group" role="group" aria-label="Opsi">
                    <?php $penilaian = $this->db->get_where('penilaian', ['kd_pengajuan' => $item['kd_pengajuan']])->row(); ?>
                    <a href="<?= base_url('pengajuan_supplier/detail/' . $item['kd_pengajuan']) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Detail"><i class="fas fa-info-circle"></i></a>
                    <a href="<?= base_url('pengajuan_supplier/ubah/' . $item['kd_pengajuan']) ?>" class="btn btn-primary <?= $penilaian || $item['status'] == 'Tidak Lolos' ? 'disabled' : '' ?>" data-toggle="tooltip" data-placement="right" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="<?= base_url('pengajuan_supplier/hapus/' . $item['kd_pengajuan']) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger <?= $penilaian || $item['status'] == 'Tidak Lolos' ? 'disabled' : '' ?>" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
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