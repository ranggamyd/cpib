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
              <tr class="align-middle">
                <td align="center"><?= $no++; ?></td>
                <td class="text-center"><?= date('d-M-Y', strtotime($ajuan['tgl_pengajuan'])) ?></td>
                <td class="text-center"><span class="badge badge-white"><?= $ajuan['kd_pengajuan']; ?></span></td>
                <td><?= $this->db->get_where('suppliers', ['kd_supplier' => $ajuan['kd_supplier']])->row('nama_supplier'); ?></td>
                <td><?= $this->db->get_where('miniplant_supplier', ['kd_pengajuan' => $ajuan['kd_pengajuan'], 'kd_supplier' => $ajuan['kd_supplier']])->row('nama_miniplant'); ?></td>
                <td class="text-center">
                  <?php
                  $colors = ["badge-primary", "badge-success", "badge-danger", "badge-warning", "badge-info"];
                  $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = jenis_produk_supplier.kd_jenis_produk', 'left');
                  $jenis_produk_supplier = $this->db->get_where('jenis_produk_supplier', ['kd_pengajuan' => $ajuan['kd_pengajuan'], 'kd_supplier' => $ajuan['kd_supplier']])->result_array();
                  foreach ($jenis_produk_supplier as $jp) :
                  ?>
                    <div class="badge <?= $colors[array_rand($colors)] ?>"><?= $jp['jenis_produk'] ?></div>
                  <?php endforeach; ?>
                </td>
                <td class="text-center">
                  <?php if ($ajuan['status'] == 'Tertunda') : ?>
                    <a href="<?= base_url('pengajuan/proses_inspeksi/' . $ajuan['kd_pengajuan']) ?>" onclick="return confirm('Apakah anda yakin?')" class="badge badge-primary" data-toggle="tooltip" data-placement="right" title="Lakukan Inspeksi?"><?= $ajuan['status']; ?></a>
                  <?php elseif ($ajuan['status'] == 'Dalam proses Inspeksi') : ?>
                    <a href="<?= base_url('pengajuan/proses_inspeksi/' . $ajuan['kd_pengajuan']) ?>" onclick="return confirm('Apakah anda yakin?')" class="badge badge-info" data-toggle="tooltip" data-placement="right" title="Lakukan Inspeksi?"><?= $ajuan['status']; ?></a>
                  <?php elseif ($ajuan['status'] == 'Perlu Revisi') : ?>
                    <a href="<?= base_url('penilaian/detail/' . $ajuan['kd_pengajuan']) ?>" class="badge badge-warning" data-toggle="tooltip" data-placement="right" title="Lihat Detail Inspeksi"><?= $ajuan['status']; ?></a>
                  <?php elseif ($ajuan['status'] == 'Lolos Inspeksi') : ?>
                    <a href="<?= base_url('penilaian/detail/' . $ajuan['kd_pengajuan']) ?>" class="badge badge-success" data-toggle="tooltip" data-placement="right" title="Lihat Detail Inspeksi"><?= $ajuan['status']; ?></a>
                  <?php endif; ?>
                </td>
                <td align="center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="<?= base_url('pengajuan/detail/' . $ajuan['kd_pengajuan']) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Lihat Detail Ajuan"><i class="fas fa-info-circle"></i></a>
                    <a href="<?= base_url('pengajuan/ubah/' . $ajuan['kd_pengajuan']) ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Ubah Ajuan"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="<?= base_url('pengajuan/hapus/' . $ajuan['kd_pengajuan']) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus Ajuan"><i class="fas fa-trash-alt"></i></a>
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