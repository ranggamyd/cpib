<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Isian (CHECKLIST) Penilaian Kelayakan Supplier</h1>
    <hr>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('daftar_isian/tambah_ajuan') ?>" class="btn btn-sm btn-primary" id="#myBtn"><i class="fas fa-plus-circle mr-2"></i>Tambah Ajuan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th class="text-center">No.</th>
                            <th>Nama Isian</th>
                            <th>MINOR</th>
                            <th>MAYOR</th>
                            <th>SERIUS</th>
                            <th>KRITIS</th>
                            <th>ACUAN</th>
                            <th style="text-align:center;">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($daftar_isian as $di) { ?>

                            <tr>
                                <th align="center"><?= $no++; ?></th>
                                <th><?= $di['nama_isian'] ?></th>
                                <th>MINOR</th>
                                <th>MAYOR</th>
                                <th>SERIUS</th>
                                <th>KRITIS</th>
                                <th>ACUAN</th>
                                <td align="center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit_daftar_isian<?= $di['kd_daftar_isian'] ?>" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#hapus_daftar_isian<?= $di['kd_daftar_isian'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <?php
                            $sub_isian = $this->db->get_where('sub_daftar_isian', ['kd_daftar_isian' => $di['kd_daftar_isian']])->result_array();

                            $i = 1;
                            foreach ($sub_isian as $si) { ?>
                                ?>
                                <tr>
                                    <td align="center"><?= $no . "." . $i++; ?></td>
                                    <td><?= $si['nama_isian'] ?></td>
                                    <td class="text-center">
                                        <?php
                                        if ($si['is_minor']) { ?>
                                            <i class="fas fa-check-circle text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($si['is_mayor']) { ?>
                                            <i class="fas fa-check-circle text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($si['is_serius']) { ?>
                                            <i class="fas fa-check-circle text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($si['is_kritis']) { ?>
                                            <i class="fas fa-check-circle text-success"></i>
                                        <?php } ?>
                                    </td>
                                    <td><?= $si['acuan'] ?></td>
                                    <td align="center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit_sub_daftar_isian<?= $di['kd_sub_daftar_isian'] ?>" id="#myBtn" data-dismiss="modal"><i class="fa fa-fw fa-edit"></i></a>
                                            <a href="#" data-toggle="modal" data-target="#hapus_sub_daftar_isian<?= $di['kd_sub_daftar_isian'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>