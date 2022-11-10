<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Isian (CHECKLIST) Penilaian Kelayakan Supplier</h1>
    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" data-toggle="modal" data-target="#tambah_kategori" class=" btn btn-sm btn-primary" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Kategori</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr class="bg-light" style="filter: brightness(0.95);">
                            <th class="text-center">No.</th>
                            <th>Nama Isian</th>
                            <th colspan="4">KRITERIA</th>
                            <th>ACUAN</th>
                            <th style="text-align:center;">Opsi</th>
                        </tr>
                        <tr>
                            <td colspan="8"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($daftar_isian as $di) { ?>
                            <tr class="bg-light" style="filter: brightness(0.95);">
                                <th class="text-left"><span class="pl-3"><?= $no; ?></span></th>
                                <th><?= $di['nama_isian'] ?></th>
                                <th>MIN</th>
                                <th>MAY</th>
                                <th>SER</th>
                                <th>KR</th>
                                <th class="text-center">ACUAN</th>
                                <td class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#ubah_kategori-<?= $di['kd_daftar_isian'] ?>" id="#myBtn" data-dismiss="modal" data-kd_daftar_isian="<?= $di['kd_daftar_isian']; ?>" data-nama_isian="<?= $di['nama_isian']; ?>" data-deskripsi="<?= $di['deskripsi']; ?>"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="<?= base_url('daftar_isian/hapus_kategori/' . $di['kd_daftar_isian']) ?>" class="btn btn-danger" onclick="return confirm('Seluruh Daftar Isian yang termasuk kedalam kategori <?= $di['nama_isian'] ?> akan terhapus !!! \n Apakah Anda Yakin ???')" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <?php
                            $sub_isian = $this->db->get_where('sub_daftar_isian', ['kd_daftar_isian' => $di['kd_daftar_isian']])->result_array();

                            $i = 1;
                            foreach ($sub_isian as $si) { ?>
                                <tr>
                                    <td class="text-left"><span class="pl-3"><?= $no . '.' . $i++ ?></span></td>
                                    <td><?= $si['nama_subisian'] ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($si['is_minor']) { ?>
                                            <i class="fas fa-check-circle text-info"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($si['is_mayor']) { ?>
                                            <i class="fas fa-check-circle text-info"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($si['is_serius']) { ?>
                                            <i class="fas fa-check-circle text-info"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($si['is_kritis']) { ?>
                                            <i class="fas fa-check-circle text-info"></i>
                                        <?php } ?>
                                    </td>
                                    <td><?= $si['acuan'] ?></td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="#" class="btn btn-flat" data-toggle="modal" data-target="#ubah_isian-<?= $si['id'] ?>" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-pen text-success"></i></a>
                                            <a href="<?= base_url('daftar_isian/hapus_isian/' . $si['id']) ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus isian?')" class="btn btn-flat" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt text-danger"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="8" class="text-right">
                                    <a href="#" class="btn btn-flat text-primary py-0" data-toggle="modal" data-target="#tambah_isian<?= $di['kd_daftar_isian'] ?>" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-plus-circle mr-2"></i> Tambah Isian</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8"></td>
                            </tr>
                        <?php
                            $no++;
                        } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->

<!-- Modal tambah Kategori -->
<div class="modal fade" id="tambah_kategori" tabindex="-1" role="dialog" aria-labelledby="tambah_kategoriLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambah_kategoriLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('daftar_isian/tambah_kategori') ?>" method="post">
                <div class="modal-body">
                    <label for="kd_daftar_isian">Kode Kategori :</label>
                    <input type="text" name="kd_daftar_isian" class="form-control mb-3 <?= form_error('kd_daftar_isian') ? 'is-invalid' : '' ?>" id="kd_daftar_isian" value="<?= set_value('kd_daftar_isian', $kd_daftar_isian_auto) ?>" readonly required>
                    <div id="kd_daftar_isian" class="invalid-feedback">
                        <?= form_error('kd_daftar_isian') ?>
                    </div>
                    <label for="nama_isian">Nama Kategori:</label>
                    <input type="text" name="nama_isian" id="nama_isian" class="form-control mb-3 <?= form_error('nama_isian') ? 'is-invalid' : '' ?>" value="<?= set_value('nama_isian') ?>" required>
                    <div id="nama_isian" class="invalid-feedback">
                        <?= form_error('nama_isian') ?>
                    </div>
                    <label for="deskripsi">Deskripsi :</label>
                    <textarea type="text" name="deskripsi" class="form-control mb-3 <?= form_error('deskripsi') ? 'is-invalid' : '' ?>" id="deskripsi"><?= set_value('deskripsi') ?></textarea>
                    <div id="deskripsi" class="invalid-feedback">
                        <?= form_error('deskripsi') ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                    <input type="submit" value="Tambahkan !!!!" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal ubah Kategori -->
<?php foreach ($daftar_isian as $di) : ?>
    <div class="modal fade" id="ubah_kategori-<?= $di['kd_daftar_isian'] ?>" tabindex="-1" role="dialog" aria-labelledby="ubah_kategoriLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubah_kategoriLabel">ubah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('daftar_isian/ubah_kategori') ?>" method="post">
                    <div class="modal-body">
                        <label for="kd_daftar_isian">Kode Kategori :</label>
                        <input type="text" name="kd_daftar_isian" class="form-control mb-3 <?= form_error('kd_daftar_isian') ? 'is-invalid' : '' ?>" id="kd_daftar_isian" value="<?= set_value('kd_daftar_isian', $di['kd_daftar_isian']) ?>" readonly required>
                        <div id="kd_daftar_isian" class="invalid-feedback">
                            <?= form_error('kd_daftar_isian') ?>
                        </div>
                        <label for="nama_isian">Nama Kategori:</label>
                        <input type="text" name="nama_isian" id="nama_isian" class="form-control mb-3 <?= form_error('nama_isian') ? 'is-invalid' : '' ?>" value="<?= set_value('nama_isian', $di['nama_isian']) ?>" required>
                        <div id="nama_isian" class="invalid-feedback">
                            <?= form_error('nama_isian') ?>
                        </div>
                        <label for="deskripsi">Deskripsi :</label>
                        <textarea type="text" name="deskripsi" class="form-control mb-3 <?= form_error('deskripsi') ? 'is-invalid' : '' ?>" id="deskripsi"><?= set_value('deskripsi', $di['deskripsi']) ?></textarea>
                        <div id="deskripsi" class="invalid-feedback">
                            <?= form_error('deskripsi') ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <input type="submit" value="Simpan Perubahan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal tambah Isian -->
<?php foreach ($daftar_isian as $di) : ?>
    <div class="modal fade" id="tambah_isian<?= $di['kd_daftar_isian'] ?>" tabindex="-1" role="dialog" aria-labelledby="tambah_isianLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambah_isianLabel">Tambah Isian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('daftar_isian/tambah_isian') ?>" method="post">
                    <div class="modal-body">
                        <label for="kd_daftar_isian">Kategori :</label>
                        <input type="hidden" name="kd_daftar_isian" id="kd_daftar_isian" class="form-control mb-3" value="<?= $di['kd_daftar_isian'] ?>" readonly required>
                        <input type="text" class="form-control mb-3" value="<?= $di['nama_isian'] ?>" readonly>
                        <!-- <select name="kd_daftar_isian" id="kd_daftar_isian" class="form-control mb-3 <?= form_error('kd_daftar_isian') ? 'is-invalid' : '' ?>" required>
                            <option value="<?= $di['kd_daftar_isian'] ?>"><?= $di['nama_isian'] ?></option>
                            <?php foreach ($daftar_isian as $di) : ?>
                                <option value="<?= $di['kd_daftar_isian'] ?>" <?= set_select('kd_daftar_isian', $di['kd_daftar_isian']); ?>><?= $di['nama_isian'] ?></option>
                            <?php endforeach ?>
                        </select> -->
                        <div id="kd_daftar_isian" class="invalid-feedback">
                            <?= form_error('kd_daftar_isian') ?>
                        </div>
                        <label for="nama_subisian">Nama Isian:</label>
                        <input type="text" name="nama_subisian" id="nama_subisian" class="form-control mb-3 <?= form_error('nama_subisian') ? 'is-invalid' : '' ?>" value="<?= set_value('nama_subisian') ?>" required>
                        <div id="nama_subisian" class="invalid-feedback">
                            <?= form_error('nama_subisian') ?>
                        </div>
                        <label>Kriteria :</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="is_minor" name="is_minor" value="1" <?= set_checkbox('is_minor', 1) ?>>
                            <label class="form-check-label" for="is_minor">Minor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="is_mayor" name="is_mayor" value="1" <?= set_checkbox('is_mayor', 1) ?>>
                            <label class="form-check-label" for="is_mayor">Mayor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="is_serius" name="is_serius" value="1" <?= set_checkbox('is_serius', 1) ?>>
                            <label class="form-check-label" for="is_serius">Serius</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="is_kritis" name="is_kritis" value="1" <?= set_checkbox('is_kritis', 1) ?>>
                            <label class="form-check-label" for="is_kritis">Kritis</label>
                        </div><br>
                        <label for="acuan" class="mt-3">Acuan :</label>
                        <textarea type="text" name="acuan" class="form-control mb-3 <?= form_error('acuan') ? 'is-invalid' : '' ?>" id="acuan" required><?= set_value('acuan') ?></textarea>
                        <div id="acuan" class="invalid-feedback">
                            <?= form_error('acuan') ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <input type="submit" value="Tambahkan !!!!" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Modal ubah Isian -->
<?php foreach ($this->db->get('sub_daftar_isian')->result_array() as $si) : ?>
    <div class="modal fade" id="ubah_isian-<?= $si['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ubah_isianLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubah_isianLabel">ubah Isian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('daftar_isian/ubah_isian') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= set_value('id', $si['id']) ?>">
                        <label for="kd_daftar_isian">Kategori :</label>
                        <input type="hidden" name="kd_daftar_isian" id="kd_daftar_isian" class="form-control mb-3" value="<?= $di['kd_daftar_isian'] ?>" readonly required>
                        <input type="text" class="form-control mb-3" value="<?= $di['nama_isian'] ?>" readonly>
                        <!-- <select name="kd_daftar_isian" id="kd_daftar_isian" class="form-control" required>
                            <?php foreach ($daftar_isian as $di) : ?>
                                <option value="<?= $di['kd_daftar_isian'] ?>" <?= set_select('kd_daftar_isian', $di['kd_daftar_isian']); ?>><?= $di['nama_isian'] ?></option>
                            <?php endforeach ?>
                        </select> -->
                        <div id="kd_daftar_isian" class="invalid-feedback">
                            <?= form_error('kd_daftar_isian') ?>
                        </div>
                        <label for="nama_subisian">Nama Isian :</label>
                        <input type="text" name="nama_subisian" id="nama_subisian" class="form-control mb-3 <?= form_error('nama_subisian') ? 'is-invalid' : '' ?>" value="<?= set_value('nama_subisian', $si['nama_subisian']) ?>">
                        <div id="nama_subisian" class="invalid-feedback">
                            <?= form_error('nama_subisian') ?>
                        </div>
                        <label>Kriteria :</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="is_minor" name="is_minor" value="1" <?= set_checkbox('is_minor', $si['is_minor'], $si['is_minor'] == 1 ? true : false) ?>>
                            <label class="form-check-label" for="is_minor">Minor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="is_mayor" name="is_mayor" value="1" <?= set_checkbox('is_mayor', $si['is_mayor'], $si['is_mayor'] == 1 ? true : false) ?>>
                            <label class="form-check-label" for="is_mayor">Mayor</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="is_serius" name="is_serius" value="1" <?= set_checkbox('is_serius', $si['is_serius'], $si['is_serius'] == 1 ? true : false) ?>>
                            <label class="form-check-label" for="is_serius">Serius</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="is_kritis" name="is_kritis" value="1" <?= set_checkbox('is_kritis', $si['is_kritis'], $si['is_kritis'] == 1 ? true : false) ?>>
                            <label class="form-check-label" for="is_kritis">Kritis</label>
                        </div><br>
                        <label for="acuan">Acuan :</label>
                        <textarea type="text" name="acuan" class="form-control mb-3 <?= form_error('acuan') ? 'is-invalid' : '' ?>" id="acuan"><?= set_value('acuan', $si['acuan']) ?></textarea>
                        <div id="acuan" class="invalid-feedback">
                            <?= form_error('acuan') ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Batal</button>
                        <input type="submit" value="Simpan Perubahan" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>