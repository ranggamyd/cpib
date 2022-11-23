<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail Supplier</h1>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <img src="<?= base_url() . 'assets/img/' . $supplier->avatar; ?>" class="rounded-circle" width="200" height="200" alt="" style="object-fit: cover;">
                </div>
                <hr>
                <h4 class="text-center"><?= $supplier->nama_miniplant ?></h4>
                <p class="text-center"><?= $supplier->nama_pimpinan ?></p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-bottom">
                            <tr>
                                <th scope="row">Kode Supplier</th>
                                <td>:</td>
                                <td><?= $supplier->kd_supplier; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Mini Plant</th>
                                <td>:</td>
                                <td><?= $supplier->nama_miniplant; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Pimpinan Supplier</th>
                                <td>:</td>
                                <td><?= $supplier->nama_pimpinan; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">No. Telepon</th>
                                <td>:</td>
                                <td><?= $supplier->no_telp; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">No. Fax</th>
                                <td>:</td>
                                <td><?= $supplier->no_fax; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>:</td>
                                <td><?= $supplier->email; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>:</td>
                                <td><?= $supplier->alamat; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="mb-0">Daftar Pengajuan Supplier</h6>
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
                                <td><?= $ajuan['nama_miniplant'] ?></td>
                                <td><?= $ajuan['nama_pimpinan'] ?></td>
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
                                    <?php elseif ($ajuan['status'] == 'Perlu Revisi') : ?>
                                        <a href="<?= base_url('pengajuan/detail_inspeksi/' . $ajuan['kd_pengajuan']) ?>" class="badge badge-warning" data-toggle="tooltip" data-placement="right" title="Lihat Detail Inspeksi"><?= $ajuan['status']; ?></a>
                                    <?php elseif ($ajuan['status'] == 'Diterima') : ?>
                                        <a href="<?= base_url('pengajuan/detail_inspeksi/' . $ajuan['kd_pengajuan']) ?>" class="badge badge-success" data-toggle="tooltip" data-placement="right" title="Lihat Detail Inspeksi"><?= $ajuan['status']; ?></a>
                                    <?php endif; ?>
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