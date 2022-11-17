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
                <h4 class="text-center"><?= $pengajuan->nama_supplier; ?></h4>
                <p class="text-center"></p>
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
                                <th scope="row">Kode Supplier</th>
                                <td>:</td>
                                <td><?= $pengajuan->kd_supplier; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Pengajuan</th>
                                <td>:</td>
                                <td><?= date('d-M-Y', strtotime($pengajuan->tgl_pengajuan)) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Lengkap</th>
                                <td>:</td>
                                <td><?= $pengajuan->nama_supplier; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">No. Telepon</th>
                                <td>:</td>
                                <td><?= $pengajuan->no_telp; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">No. fax</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="mb-0">Dokumen Pelengkap</h6>
        </div>
        <div class="card-body">

        </div>
    </div>

</div>
</div>