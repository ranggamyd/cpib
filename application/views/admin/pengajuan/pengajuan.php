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
              <tr class="align-middle">
                <td align="center"><?= $no++; ?></td>
                <td class="text-center"><?= date('d-M-Y', strtotime($item['tgl_pengajuan'])) ?></td>
                <td class="text-center"><span class="badge badge-white"><?= $item['kd_pengajuan']; ?></span></td>
                <td><?= $item['nama_miniplant'] ?></td>
                <td><?= $item['nama_pimpinan'] ?></td>
                <td class="text-center">
                  <?php
                  $colors = ["badge-primary", "badge-success", "badge-danger", "badge-warning", "badge-info"];
                  $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = jenis_produk_supplier.kd_jenis_produk', 'left');
                  $jenis_produk_supplier = $this->db->get_where('jenis_produk_supplier', ['kd_pengajuan' => $item['kd_pengajuan'], 'kd_supplier' => $item['kd_supplier']])->result_array();
                  foreach ($jenis_produk_supplier as $jp) :
                  ?>
                    <div class="badge <?= $colors[array_rand($colors)] ?>"><?= $jp['jenis_produk'] ?></div>
                  <?php endforeach; ?>
                </td>
                <td class="text-center">
                  <?php if ($item['status'] == 'Tertunda') : ?>
                    <a href="<?= base_url('pengajuan/proses_inspeksi/' . $item['kd_pengajuan']) ?>" onclick="return confirm('Apakah anda yakin?')" class="badge badge-primary" data-toggle="tooltip" data-placement="right" title="Lakukan Inspeksi?"><?= $item['status']; ?></a>
                  <?php elseif ($item['status'] == 'Dalam proses Inspeksi') : ?>
                    <a href="<?= base_url('pengajuan/proses_inspeksi/' . $item['kd_pengajuan']) ?>" onclick="return confirm('Apakah anda yakin?')" class="badge badge-info" data-toggle="tooltip" data-placement="right" title="Lakukan Inspeksi?"><?= $item['status']; ?></a>
                  <?php elseif ($item['status'] == 'Perlu Revisi') : ?>
                    <a href="<?= base_url('penilaian/detail/'  . $this->db->get_where('penilaian', ['kd_pengajuan' => $item['kd_pengajuan']])->row('kd_penilaian')) ?>" class="badge badge-warning" data-toggle="tooltip" data-placement="right" title="Lihat Detail Inspeksi"><?= $item['status']; ?></a>
                  <?php elseif ($item['status'] == 'Lolos Inspeksi') : ?>
                    <a href="<?= base_url('penilaian/detail/'  . $this->db->get_where('penilaian', ['kd_pengajuan' => $item['kd_pengajuan']])->row('kd_penilaian')) ?>" class="badge badge-success" data-toggle="tooltip" data-placement="right" title="Lihat Detail Inspeksi"><?= $item['status']; ?></a>
                  <?php endif; ?>
                </td>
                <td align="center">
                  <div class="btn-group" role="group" aria-label="Opsi">
                    <a href="<?= base_url('pengajuan/detail/' . $item['kd_pengajuan']) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Lihat Detail Ajuan"><i class="fas fa-info-circle"></i></a>
                    <a href="<?= base_url('pengajuan/ubah/' . $item['kd_pengajuan']) ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Ubah Ajuan"><i class="fa fa-fw fa-edit"></i></a>
                    <a href="<?= base_url('pengajuan/hapus/' . $item['kd_pengajuan']) ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus Ajuan"><i class="fas fa-trash-alt"></i></a>
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