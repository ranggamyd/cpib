<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Validasi Perbaikan Ajuan</h1>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <img src="<?= base_url() . 'assets/img/' . $perbaikan->avatar; ?>" class="rounded-circle" width="200" height="200" alt="" style="object-fit: cover;">
                </div>
                <hr>
                <h4 class="text-center"><?= $perbaikan->nama_miniplant; ?></h4>
                <p class="text-center"><?= $perbaikan->nama_pimpinan; ?></p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-bottom">
                            <tr>
                                <th scope="row">Kode Perbaikan</th>
                                <td>:</td>
                                <td><?= $perbaikan->kd_perbaikan; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Perbaikan</th>
                                <td>:</td>
                                <td><?= date('d M Y', strtotime($perbaikan->tgl_perbaikan)) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Mini Plant</th>
                                <td>:</td>
                                <td><?= $perbaikan->nama_miniplant; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Produk</th>
                                <td>:</td>
                            </tr>
                            <tr>
                                <th scope="row">No. Telepon</th>
                                <td>:</td>
                                <td><?= $perbaikan->no_telp; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat</th>
                                <td>:</td>
                                <td><?= $perbaikan->alamat; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mt-3">
        <div class="card-header py-3">
            <h6 class="font-weight-bold mb-0">Kelengkapan Dokumen Perbaikan</h6>
        </div>
        <form action="<?= base_url('perbaikan/validasi') ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kd_perbaikan">Kode Perbaikan</label>
                            <input type="text" name="kd_perbaikan" value="<?= $perbaikan->kd_perbaikan ?>" class="form-control" id="kd_perbaikan" readonly required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kd_penilaian">Kode Penilaian</label>
                            <input type="text" name="kd_penilaian" value="<?= $perbaikan->kd_penilaian ?>" class="form-control" id="kd_penilaian" readonly required>
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-2">
                        <div class="form-group">
                            <label for="tgl_perbaikan">Tanggal Validasi</label>
                            <input type="date" name="tgl_perbaikan" value="<?= date('Y-m-d') ?>" class="form-control" id="tgl_perbaikan" required>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="50" class="text-center">No.</th>
                                <th>Revisi</th>
                                <th>Dokumen Perbaikan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($perbaikan_detail as $item) :
                            ?>
                                <tr>
                                    <th class="text-center"><?= $i++ ?></th>
                                    <td><?= $item['notes'] ?></td>
                                    <td><a href="<?= base_url('assets/dokumen/') . $item['file_perbaikan'] ?>" class="btn btn-outline-secondary btn-sm"><i class="fas fa-download mr-2"></i>Click to download</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <small class="text-muted">* Click to download Uploaded PDF/Image</small>
            </div>
            <div class="card-footer text-right">
                <button type="reset" class="btn btn-secondary"><i class="fas fa-sync-alt mr-2"></i>Reset</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Validasi</button>
            </div>
        </form>
    </div>
</div>
</div>