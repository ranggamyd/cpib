<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form Permohonan Supplier</h1>
    <hr>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?php echo base_url('pengajuan/tambah_pengajuan') ?>" method="post">
                <input type="hidden" name="kd_supplier" id="kd_supplier" value="">
                <label for="nama_supplier">POLISI BULAN SABIT :</label>
                <input type="text" name="nama_supplier" id="nama_supplier" class="form-control mb-3">
                <label for="nama_supplier">Nama Supplier :</label>
                <input type="text" name="nama_supplier" id="nama_supplier" class="form-control mb-3">
                <label for="nama_miniplant">Nama Mini Plant :</label>
                <input type="text" name="nama_miniplant" id="nama_miniplant" class="form-control mb-3">
                <label for="alamat">Alamat :</label>
                <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3"></textarea>
                <label for="jenis_produk">Jenis Produk :</label><br>
                <input type="text" name="jenis_produk" id="jenis_produk" class="form-control mb-3">
                <hr>
                <h5>KELENGKAPAN DOKUMEN</h5>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="ktp">KTP</label>
                        <input type="file" name="ktp" id="ktp" class="form-control mb-3">
                        <label for="npwp">NPWP</label>
                        <input type="file" name="npwp" id="npwp" class="form-control mb-3">
                        <label for="nib">NIB</label>
                        <input type="file" name="nib" id="nib" class="form-control mb-3">
                        <label for="siup">SIUP</label>
                        <input type="file" name="siup" id="siup" class="form-control mb-3">
                    </div>
                    <div class="col-md-6">
                        <label for="akta_usaha">AKTA USAHA</label>
                        <input type="file" name="akta_usaha" id="akta_usaha" class="form-control mb-3">
                        <label for="imb">IMB</label>
                        <input type="file" name="imb" id="imb" class="form-control mb-3">
                        <label for="layout">LAY OUT/DENAH LOKASI</label>
                        <input type="file" name="layout" id="layout" class="form-control mb-3">
                        <label for="panduan_mutu">PANDUAN MUTU GMP-SSOP</label>
                        <input type="file" name="panduan_mutu" id="panduan_mutu" class="form-control mb-3">
                    </div>
                </div>
                <br>

                <small>Info :
                    <i>Data yang sudah di tambahkan akan segera muncul di dalam daftar nama supplier.
                        <b>mohon di cek kembali data supplier yang ada demi menghindari duplikasi data / data
                            ganda
                        </b>
                    </i>
                </small>
                <hr>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

</div>

</div>
<!-- End of Main Content -->