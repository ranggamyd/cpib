<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Form Permohonan Supplier</h1>
  <hr>

  <div class="card shadow mb-4">
    <div class="card-body">
      <form action="<?php echo base_url('pengajuan/ubah_ajuan') ?>" method="post">
        <div class="row">
          <div class="col-md-5">
            <label for="kd_pengajuan">Kode Ajuan :</label>
            <input type="text" name="kd_pengajuan" class="form-control mb-3" id="kd_pengajuan" value="<?= $pengajuan->kd_pengajuan ?>" required readonly>
          </div>
          <div class="col-md-3 offset-md-4">
            <label for="tgl_pengajuan">Tanggal Pengajuan :</label>
            <input type="date" name="tgl_pengajuan" value="<?= $pengajuan->tgl_pengajuan ?>" class="form-control mb-3" id="tgl_pengajuan" required>
          </div>
        </div>
        <label for="kd_supplier">Supplier :</label>
        <select name="kd_supplier" id="kd_supplier" class="form-control mb-3" required>
          <?php foreach ($suppliers as $spl) : ?>
            <option value="<?= $spl['kd_supplier'] ?>" <?= $pengajuan->kd_supplier == $spl['kd_supplier'] ? 'selected' : ''; ?>><?= $spl['nama_supplier'] ?></option>
          <?php endforeach ?>
        </select>
        <div class="row">
          <div class="col">
            <label for="nama_miniplant">Nama Mini Plant :</label>
            <input type="text" name="nama_miniplant" value="<?= $pengajuan->nama_miniplant ?>" id="nama_miniplant" class="form-control mb-3" required>
          </div>
          <div class="col">
            <label for="jenis_produk">Jenis Produk :</label><br>
            <select name="kd_produk" id="kd_produk" class="form-control mb-3" required>
              <?php foreach ($jenis_produk as $jp) : ?>
                <option value="<?= $jp['kd_jenis_produk'] ?>" <?= $pengajuan->jenis_produk == $jp['jenis_produk'] ? 'selected' : ''; ?>><?= $jp['jenis_produk'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
        <label for="alamat">Alamat :</label>
        <textarea name="alamat" id="alamat" rows="4" class="form-control mb-3" required><?= $pengajuan->alamat ?></textarea>
        <hr>

        <h5 class="mb-0">Dokumen Pelengkap</h5><br>

        <div class="row mt-0">
          <div class="col-md-6">
            <label for="ktp">KTP</label>
            <input type="file" name="ktp" id="ktp" class="form-control-file mb-3">
            <label for="npwp">NPWP</label>
            <input type="file" name="npwp" id="npwp" class="form-control-file mb-3">
            <label for="nib">NIB</label>
            <input type="file" name="nib" id="nib" class="form-control-file mb-3">
            <label for="siup">SIUP</label>
            <input type="file" name="siup" id="siup" class="form-control-file mb-3">
          </div>
          <div class="col-md-6">
            <label for="akta_usaha">AKTA USAHA</label>
            <input type="file" name="akta_usaha" id="akta_usaha" class="form-control-file mb-3">
            <label for="imb">IMB</label>
            <input type="file" name="imb" id="imb" class="form-control-file mb-3">
            <label for="layout">LAY OUT/DENAH LOKASI</label>
            <input type="file" name="layout" id="layout" class="form-control-file mb-3">
            <label for="panduan_mutu">PANDUAN MUTU GMP-SSOP</label>
            <input type="file" name="panduan_mutu" id="panduan_mutu" class="form-control-file mb-3">
          </div>
        </div>
        <br>

        <small>Info :
          <i>Data yang sudah di ubahkan akan segera muncul di dalam daftar nama supplier.
            <b>mohon di cek kembali data supplier yang ada demi menghindari duplikasi data / data
              ganda
            </b>
          </i>
        </small>
        <hr>
        <div class="text-right">
          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>