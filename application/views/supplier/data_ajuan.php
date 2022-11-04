<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengajuan Saya</h1>
    <hr>
    <?php
    echo $this->session->flashdata('berhasil');
    // echo $this->session->flashdata('gagal');
    ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?php echo base_url('pengajuan/tambah_ajuan') ?>" class="btn btn-sm btn-primary" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Ajuan</a>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Nama Supplier</th>
                            <th>Nama Mini Plant</th>
                            <th>Jenis Produk</th>
                            <th>Alamat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pengajuan_supplier as $item) :
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $item['nama_supplier'] ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <div class="badge badge-success">Diterima</div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

</div>
<!-- End of Main Content -->


<!-- Modal tambah supplier -->
<!-- <div class="modal fade" id="tambah_supplier" tabindex="-1" role="dialog" aria-labelledby="tambah_supplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_supplierLabel">Tambah Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('supplier/tambah_supplier') ?>" method="post">
                    <input type="hidden" name="kd_supplier" id="kd_supplier" value="<?php echo $kd_supplier_auto; ?>">
                    <label for="nama_supplier">Nama Supplier :</label>
                    <input type="text" name="nama_supplier" id="nama_supplier" class="form-control mb-3" required>
                    <label for="nama_miniplant">Nama Mini Plant :</label>
                    <input type="text" name="nama_miniplant" id="nama_miniplant" class="form-control mb-3" required>
                    <label for="alamat">Alamat :</label>
                    <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3" required></textarea>
                    <label for="jenis_produk">Jenis Produk :</label><br>
                    <input type="text" name="jenis_produk" id="jenis_produk" class="form-control mb-3" required>

                    <small>Info :
                        <i>Data yang sudah di tambahkan akan segera muncul di dalam daftar nama supplier.
                            <b>mohon di cek kembali data supplier yang ada demi menghindari duplikasi data / data
                                ganda
                            </b>
                        </i>
                    </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                <input type="submit" value="Tambahkan !!!!" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div> -->