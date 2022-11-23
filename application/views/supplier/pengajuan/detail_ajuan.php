<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail Ajuan</h1>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <img src="<?= base_url() . 'assets/img/' . $pengajuan->avatar; ?>" class="rounded-circle" width="200" height="200" alt="" style="object-fit: cover;">
                </div>
                <hr>
                <h4 class="text-center"><?= $pengajuan->nama_miniplant; ?></h4>
                <p class="text-center"><?= $pengajuan->nama_pimpinan; ?></p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-bottom">
                            <tr>
                                <th scope="row">Kode Pengajuan</th>
                                <td>:</td>
                                <td><?= $pengajuan->kd_pengajuan; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Pengajuan</th>
                                <td>:</td>
                                <td><?= date('d M Y', strtotime($pengajuan->tgl_pengajuan)) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Mini Plant</th>
                                <td>:</td>
                                <td><?= $pengajuan->nama_miniplant; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Produk</th>
                                <td>:</td>
                                <td>
                                    <?php
                                    $colors = ["badge-primary", "badge-success", "badge-danger", "badge-warning", "badge-info"];
                                    $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = jenis_produk_supplier.kd_jenis_produk', 'left');
                                    $jenis_produk_supplier = $this->db->get_where('jenis_produk_supplier', ['kd_pengajuan' => $pengajuan->kd_pengajuan, 'kd_supplier' => $pengajuan->kd_supplier])->result_array();
                                    foreach ($jenis_produk_supplier as $jp) :
                                    ?>
                                        <div class="badge <?= $colors[array_rand($colors)] ?>"><?= $jp['jenis_produk'] ?></div>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">No. Telepon</th>
                                <td>:</td>
                                <td><?= $pengajuan->no_telp; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>:</td>
                                <td><?= $pengajuan->alamat; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="font-weight-bold mb-0">Kelengkapan Dokumen Pengajuan</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="list-group">
                        <a href="<?= $pengajuan->ktp ? base_url('assets/dokumen/') . $pengajuan->ktp : '#' ?>" target="_blank" class="list-group-item list-group-item-action font-weight-bold <?= !$pengajuan->ktp ? 'disabled' : '' ?>">KTP <small class="text-danger text-bold">*</small></label><?= $pengajuan->ktp?'<span class="badge badge-info badge-pill float-right"><i class="fas fa-check"></i></span>':'' ?></a>
                        <a href="<?= $pengajuan->npwp ? base_url('assets/dokumen/') . $pengajuan->npwp : '#' ?>" target="_blank" class="list-group-item list-group-item-action font-weight-bold <?= !$pengajuan->npwp ? 'disabled' : '' ?>">NPWP <small class="text-danger text-bold">*</small></label><?= $pengajuan->npwp?'<span class="badge badge-info badge-pill float-right"><i class="fas fa-check"></i></span>':'' ?></a>
                        <a href="<?= $pengajuan->nib ? base_url('assets/dokumen/') . $pengajuan->nib : '#' ?>" target="_blank" class="list-group-item list-group-item-action font-weight-bold <?= !$pengajuan->nib ? 'disabled' : '' ?>">NIB <small class="text-danger text-bold">*</small></label><?= $pengajuan->nib?'<span class="badge badge-info badge-pill float-right"><i class="fas fa-check"></i></span>':'' ?></a>
                        <a href="<?= $pengajuan->ktp ? base_url('assets/dokumen/') . $pengajuan->siup : '#' ?>" target="_blank" class="list-group-item list-group-item-action font-weight-bold <?= !$pengajuan->siup ? 'disabled' : '' ?>">SIUP <small class="text-danger text-bold">*</small></label><?= $pengajuan->siup?'<span class="badge badge-info badge-pill float-right"><i class="fas fa-check"></i></span>':'' ?></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list-group">
                        <a href="<?= $pengajuan->akta_usaha ? base_url('assets/dokumen/') . $pengajuan->akta_usaha : '#' ?>" target="_blank" class="list-group-item list-group-item-action font-weight-bold <?= !$pengajuan->akta_usaha ? 'disabled' : '' ?>">AKTA USAHA<?= $pengajuan->akta_usaha?'<span class="badge badge-info badge-pill float-right"><i class="fas fa-check"></i></span>':'' ?></a>
                        <a href="<?= $pengajuan->imb ? base_url('assets/dokumen/') . $pengajuan->imb : '#' ?>" target="_blank" class="list-group-item list-group-item-action font-weight-bold <?= !$pengajuan->imb ? 'disabled' : '' ?>">IMB<?= $pengajuan->imb?'<span class="badge badge-info badge-pill float-right"><i class="fas fa-check"></i></span>':'' ?></a>
                        <a href="<?= $pengajuan->layout ? base_url('assets/dokumen/') . $pengajuan->layout : '#' ?>" target="_blank" class="list-group-item list-group-item-action font-weight-bold <?= !$pengajuan->layout ? 'disabled' : '' ?>">LAY-OUT / DENAH LOKASI<?= $pengajuan->layout?'<span class="badge badge-info badge-pill float-right"><i class="fas fa-check"></i></span>':'' ?></a>
                        <a href="<?= $pengajuan->panduan_mutu ? base_url('assets/dokumen/') . $pengajuan->panduan_mutu : '#' ?>" target="_blank" class="list-group-item list-group-item-action font-weight-bold <?= !$pengajuan->panduan_mutu ? 'disabled' : '' ?>">PANDUAN MUTU GMP-SSOP<?= $pengajuan->panduan_mutu?'<span class="badge badge-info badge-pill float-right"><i class="fas fa-check"></i></span>':'' ?></a>
                    </div>
                </div>
            </div>
            <small class="text-muted">* Click to download Uploaded PDF/Image</small>
        </div>
    </div>
</div>
</div>