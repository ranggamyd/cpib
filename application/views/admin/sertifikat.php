<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Sertifikat Kelulusan - CPIB BKIPM</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <!-- <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_supplier" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Supplier</button> -->
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="text-center">
            <tr>
              <th class="text-center">No.</th>
              <th>Kode Supplier</th>
              <th>Nama Supplier</th>
              <th>Nama Mini Plant</th>
              <th>Alamat</th>
              <th>Jenis Produk</th>
              <th style="text-align:center;">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($sertifikat as $sp) { ?>
              <tr>
                <td align="center"><?= $no++; ?></td>
                <td class="text-center"><span class="badge badge-white"><?= $sp['kd_supplier']; ?></span></td>
                <td><?= $sp['nama_supplier'] ?></td>
                <td><?= $sp['nama_miniplant']; ?></td>
                <td><?= $sp['alamat']; ?></td>
                <td><?= $sp['jenis_produk']; ?></td>
                <td align="center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#cetak_sertifikat<?= $sp['kd_supplier']; ?>"><i class="fas fa-print"></i></a>
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

<?php foreach ($sertifikat as $sp) { ?>
  <div class="modal fade" id="cetak_sertifikat<?= $sp['kd_supplier']; ?>" tabindex="-1" role="dialog" aria-labelledby="detail_supplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detail_supplierLabel">Detail supplier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table border-bottom">
              <tr>
                <th scope="row">Kode Supplier</th>
                <td>:</td>
                <td><?= $sp['kd_supplier']; ?></td>
              </tr>
              <tr>
                <th scope="row">Nama Supplier</th>
                <td>:</td>
                <td><?= $sp['nama_supplier']; ?></td>
              </tr>
              <tr>
                <th scope="row">Nama Mini Plant</th>
                <td>:</td>
                <td><?= $sp['nama_miniplant']; ?></td>
              </tr>
              <tr>
                <th scope="row">Jenis Produk</th>
                <td>:</td>
                <td><?= $sp['jenis_produk']; ?></td>
              </tr>
              <tr>
                <th scope="row">Alamat</th>
                <td>:</td>
                <td><?= $sp['alamat']; ?></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>