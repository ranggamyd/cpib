<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Supplier</h1>
    <hr>
    <?php
    echo $this->session->flashdata('berhasil');
    // echo $this->session->flashdata('gagal');
    ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_supplier" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Supplier</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
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
                        foreach ($supplier as $spl) { ?>
                            <tr>
                                <td align="center"><?php echo $no++; ?></td>
                                <td><span class="badge badge-white"><?php echo $spl['kd_supplier']; ?></span></td>
                                <td><?php echo $spl['nama_supplier'] ?></td>
                                <td><?php echo $spl['nama_miniplant']; ?></td>
                                <td><?php echo $spl['alamat']; ?></td>
                                <td><?php echo $spl['jenis_produk']; ?></td>
                                <td align="center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#detail_supplier<?php echo $spl['kd_supplier']; ?>"><i class="fas fa-info-circle"></i></a>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit_supplier<?php echo $spl['kd_supplier'] ?>" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#hapus_supplier<?php echo $spl['kd_supplier'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
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
<!-- End of Main Content -->


<!-- Modal tambah supplier -->
<div class="modal fade" id="tambah_supplier" tabindex="-1" role="dialog" aria-labelledby="tambah_supplierLabel" aria-hidden="true">
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
</div>

<?php foreach ($supplier as $spl) { ?>
    <div class="modal fade" id="detail_supplier<?php echo $spl['kd_supplier']; ?>" tabindex="-1" role="dialog" aria-labelledby="detail_supplierLabel" aria-hidden="true">
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
                                <th scope="row">ID supplier</th>
                                <td>:</td>
                                <td><?php echo $spl['kd_supplier']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nama supplier</th>
                                <td>:</td>
                                <td><?php echo $spl['nama_supplier']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Mini Plant</th>
                                <td>:</td>
                                <td><?php echo $spl['nama_miniplant']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Alamat supplier</th>
                                <td>:</td>
                                <td><?php echo $spl['alamat']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jenis Produk</th>
                                <td>:</td>
                                <td><?php echo $spl['jenis_produk']; ?></td>
                            </tr>
                            <!-- <tr>
                                <th scope="row">Tanggal Tambah supplier</th>
                                <td>:</td>
                                <td><?php echo $spl['tanggal_masuk_supplier']; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Yang Menambahkan</th>
                                <td>:</td>
                                <td><?php echo $spl['nama_anggota']; ?></td>
                            </tr> -->
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Supplier -->
    <div class="modal fade" id="edit_supplier<?php echo $spl['kd_supplier'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit_supplier<?php echo $spl['kd_supplier'] ?>Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_supplier<?php echo $spl['kd_supplier'] ?>Label">Ubah Data Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('supplier/edit_supplier') ?>" method="post">
                        <label for="nama_supplier">KD Supplier :</label>
                        <input type="hidden" name="id" id="id" class="form-control mb-3" value="<?php echo $spl['id'] ?>" readonly>
                        <input type="text" name="kd_supplier" id="kd_supplier" class="form-control mb-3" value="<?php echo $spl['kd_supplier'] ?>" readonly>
                        <label for="nama_supplier">Nama Supplier :</label>
                        <input type="text" name="nama_supplier" id="nama_supplier" class="form-control mb-3" value="<?php echo $spl['nama_supplier'] ?>" required>
                        <label for=" nama_miniplant">Nama Mini Plant :</label>
                        <input type="text" name="nama_miniplant" id="nama_miniplant" class="form-control mb-3" value="<?php echo $spl['nama_miniplant'] ?>" required>
                        <label for=" alamat">Alamat :</label>
                        <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3" required><?php echo $spl['alamat'] ?></textarea>
                        <label for="jenis_produk">Jenis Produk :</label><br>
                        <input type="text" name="jenis_produk" id="jenis_produk" class="form-control mb-3" value="<?php echo $spl['jenis_produk'] ?>" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                    <input type="submit" value="Simpan Perubahan!" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus supplier-->
    <div class="modal fade" id="hapus_supplier<?php echo $spl['kd_supplier'] ?>" tabindex="-1" aria-labelledby="hapus_supplierLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapus_supplierLabel">Konfirmasi Hapus !!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('supplier/hapus_supplier') ?>" method="post">
                        <input type="hidden" name="kd_supplier" id="kd_supplier" value="<?php echo $spl['kd_supplier'] ?>">
                        Apakah Yakin Ingin Menghapus Data supplier Ini :<br>
                        <b><?php echo $spl['kd_supplier'] ?> - <?php echo $spl['nama_supplier'] ?></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
