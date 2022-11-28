<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Sertifikat Supplier</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="font-weight-bold mb-0">List Sertifikat Supplier</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
              <th>Tanggal</th>
              <th>No. Sertifikat</th>
              <th>Mini Plant</th>
              <th>Pimpinan Supplier</th>
              <th>Jenis Produk</th>
              <th>Berlaku Sampai</th>
              <th>Sertifikat</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($sertifikat as $item) { ?>
              <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= date('d M Y', strtotime($item['tgl'])) ?></td>
                <td class="text-center">
                  <span class="badge badge-light"><?= $item['no_surat'] ?></span>
                </td>
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
                <td class="text-center"><?= date('d M Y', strtotime($item['berlaku_sampai'])) ?></td>
                <td class="text-center">
                  <a href="<?= base_url('assets/sertifikat/') . $item['file_sertifikat'] . '.jpg' ?>" target="__blank" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="right" title="Click to download image"><i class="fas fa-file-image"></i></a>
                  <a href="<?= base_url('assets/sertifikat/') . $item['file_sertifikat'] . '.pdf' ?>" target="__blank" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="right" title="Click to download PDF"><i class="fas fa-file-pdf"></i></a>
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