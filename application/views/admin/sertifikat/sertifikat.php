<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">List Sertifikat Supplier</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
              <th>Tanggal</th>
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
                <td><?= $item['nama_miniplant'] ?></td>
                <td><?= $item['nama_pimpinan'] ?></td>
                <td class="text-center"><?= date('d M Y', strtotime($item['berlaku_sampai'])) ?></td>
                <td class="text-center">
                  <a href="<?= base_url('assets/sertifikat/') . $item['file_sertifikat'] ?>" class="badge badge-light"><?= $item['kd_penilaian'] ?></a>
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