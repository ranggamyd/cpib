<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Detail Sertifikat</h1>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <a href="<?= base_url() . 'assets/img/' . $pengajuan->avatar; ?>" class="imgPopup"><img src="<?= base_url() . 'assets/img/' . $pengajuan->avatar; ?>" class="rounded-circle" width="200" height="200" alt="" style="object-fit: cover;"></a>
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
                                    $jenis_produk = $this->db->get_where('jenis_produk', ['kd_pengajuan' => $pengajuan->kd_pengajuan, 'kd_supplier' => $pengajuan->kd_supplier])->result_array();
                                    foreach ($jenis_produk as $jp) :
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
    <div class="row mb-4 mt-3">
        <!-- <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-header">
                    <h6 class="font-weight-bold mb-0"><i class="fas fa-medal text-primary mr-2"></i>Sertifikat</h6>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('assets/sertifikat/') . $sertifikat->file_sertifikat . '.jpg' ?>" class="imgPopup" id="aPreviewTemplate">
                        <img src="<?= base_url('assets/sertifikat/') . $sertifikat->file_sertifikat . '.jpg' ?>" alt="Gambar Template Sertifikat" class="imgPreview img-thumbnail mb-4" id="imgPreviewTemplate"><br>
                    </a>
                    <div class="text-center">
                        <a href="<?= base_url('assets/sertifikat/') . $sertifikat->file_sertifikat . '.jpg' ?>" target="__blank" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="right" title="Click to preview image"><i class="fas fa-file-image mr-2"></i>Download JPG</a>
                        <a href="<?= base_url('assets/sertifikat/') . $sertifikat->file_sertifikat . '.pdf' ?>" target="__blank" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="right" title="Click to preview PDF"><i class="fas fa-file-pdf mr-2"></i>Download PDF</a>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <h6 class="font-weight-bold mb-0"><i class="fas fa-file-alt text-primary mr-2"></i>Data Sertifikat</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-bottom">
                            <tr>
                                <th scope="row">No Sertifikat</th>
                                <td>:</td>
                                <td><?= $sertifikat->no_surat; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Unit Pengumpul/Supplier</th>
                                <td>:</td>
                                <td><?= $pengajuan->nama_miniplant; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>:</td>
                                <td><?= $pengajuan->alamat; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Produk</th>
                                <td>:</td>
                                <td>
                                    <?php
                                    $colors = ["badge-primary", "badge-success", "badge-danger", "badge-warning", "badge-info"];
                                    $jenis_produk = $this->db->get_where('jenis_produk', ['kd_pengajuan' => $pengajuan->kd_pengajuan, 'kd_supplier' => $pengajuan->kd_supplier])->result_array();
                                    foreach ($jenis_produk as $jp) :
                                    ?>
                                        <div class="badge <?= $colors[array_rand($colors)] ?>"><?= $jp['jenis_produk'] ?></div>
                                    <?php endforeach; ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tahapan Penanganan</th>
                                <td>:</td>
                                <td>
                                    <?php foreach ($tahapan_penanganan as $item) : ?>
                                        <span class="text-uppercase"><?= $item['nama_penanganan'] ?> -</span>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Inspeksi</th>
                                <td>:</td>
                                <td><?= date('d M Y', strtotime($sertifikat->tgl_inspeksi)) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Klasifikasi</th>
                                <td>:</td>
                                <td><?= $sertifikat->klasifikasi; ?></td>
                            </tr>
                            <!-- <tr>
                                <th scope="row">Dikeluarkan Di</th>
                                <td>:</td>
                                <td><?= $sertifikat->dikeluarkan_di; ?></td>
                            </tr> -->
                            <tr>
                                <th scope="row">Tgl Dikeluarkan</th>
                                <td>:</td>
                                <td><?= date('d M Y', strtotime($sertifikat->tgl)) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Berlaku Sampai</th>
                                <td>:</td>
                                <td><?= date('d M Y', strtotime($sertifikat->berlaku_sampai)) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Kepala UPT BKIPM</th>
                                <td>:</td>
                                <td><?= $sertifikat->kepala_upt; ?></td>
                            </tr>
                            <!-- <tr>
                                <th scope="row">HEAD OF TIU</th>
                                <td>:</td>
                                <td><?= $pengajuan->alamat; ?></td>
                            </tr> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>