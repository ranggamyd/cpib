<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-md-3 mb-4">
                    <div class="card border-left-primary shadow h-100 py-0">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Tertunda</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pengajuan_tertunda ?> </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clock fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-md-3 mb-4">
                    <div class="card border-left-warning shadow h-100 py-0">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Perbaikan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $menunggu_perbaikan ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-signature fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card border-left-info shadow h-100 py-0">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Sertifikat</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-medal fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-4">
                    <div class="card border-left-success shadow h-100 py-0">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Supplier</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-friends fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url('pengajuan_supplier/tambah_ajuan') ?>" class="btn btn btn-primary shadow-sm"><i class="mr-2 fas fa-book-reader fa-sm text-white-50"></i> Ajukan Permohonan Baru</a>
        </div>
        <div class="col">
            <!--Dayspedia.com widget-->
            <div class="DPDC card shadow" cityid="6582" lang="en" id="dayspedia_widget_35c2ed5bc7d4a1b6" host="https://dayspedia.com" ampm="false" nightsign="true" sun="false" style="background-image: url(&quot;https://cdn.dayspedia.com/img/widgets/bg-12.png&quot;); width: 100%; border-width: 1px; border-color: rgb(207, 207, 207);" auto="false">

                <style media="screen" id="dayspedia_widget_35c2ed5bc7d4a1b6_style">
                    /*COMMON*/
                    .DPDC {
                        display: table;
                        position: relative;
                        box-sizing: border-box;
                        font-size: 100.01%;
                        font-style: normal;
                        font-family: Arial;
                        background-position: 50% 50%;
                        background-repeat: no-repeat;
                        background-size: cover;
                        overflow: hidden;
                        user-select: none
                    }

                    .DPDCh,
                    .DPDCd {
                        width: fit-content;
                        line-height: 1.4
                    }

                    .DPDCh {
                        margin-bottom: 1em
                    }

                    .DPDCd {
                        margin-top: .24em
                    }

                    .DPDCt {
                        line-height: 1
                    }

                    .DPDCth,
                    .DPDCtm,
                    .DPDCts {
                        display: inline-block;
                        vertical-align: text-top;
                        white-space: nowrap
                    }

                    .DPDCth {
                        min-width: 0.6em;
                        text-align: right
                    }

                    .DPDCtm,
                    .DPDCts {
                        min-width: 1.44em
                    }

                    .DPDCtm::before,
                    .DPDCts::before {
                        display: inline-block;
                        content: ':';
                        vertical-align: middle;
                        margin: -.34em 0 0 -.07em;
                        width: .32em;
                        text-align: center;
                        opacity: .72;
                        filter: alpha(opacity=72)
                    }

                    .DPDCt12 {
                        display: inline-block;
                        vertical-align: baseline;
                        top: -0.12em;
                        position: relative;
                        font-size: 40%
                    }

                    .DPDCdm::after {
                        content: ' '
                    }

                    .DPDCda::after {
                        content: ', '
                    }

                    .DPDCdt {
                        margin-right: .48em
                    }

                    .DPDCtn {
                        display: inline-block;
                        position: relative;
                        width: 13px;
                        height: 13px;
                        border: 2px solid;
                        border-radius: 50%;
                        overflow: hidden
                    }

                    .DPDCtn>i {
                        display: block;
                        content: '';
                        position: absolute;
                        right: 33%;
                        top: -5%;
                        width: 85%;
                        height: 85%;
                        border-radius: 50%
                    }

                    .DPDCs {
                        margin: .96em 0 0 -3px;
                        font-size: 90%;
                        line-height: 1;
                        white-space: nowrap
                    }

                    .DPDCs sup {
                        padding-left: .24em;
                        font-size: 65%
                    }

                    .DPDCsl::before,
                    .DPDCsl::after {
                        display: inline-block;
                        opacity: .4
                    }

                    .DPDCsl::before {
                        content: '~';
                        margin: 0 .12em
                    }

                    .DPDCsl::after {
                        content: '~';
                        margin: 0 .24em
                    }

                    .DPDCs svg {
                        display: inline-block;
                        vertical-align: bottom;
                        width: 1.2em;
                        height: 1.2em;
                        opacity: .48
                    }

                    /*CUSTOM*/

                    .DPDC {
                        width: auto;
                        padding: 24px;
                        background-color: #ffffff;
                        border: 1px solid #343434;
                        border-radius: 8px
                    }

                    /* widget width, padding, background, border, rounded corners */
                    .DPDCh {
                        color: #007DBF;
                        font-weight: normal
                    }

                    /* headline color, font-weight*/
                    .DPDCt,
                    .DPDCd {
                        color: #343434;
                        font-weight: bold
                    }

                    /* time & date color, font-weight */
                    .DPDCtn {
                        border-color: #343434
                    }

                    /* night-sign color = time & date color */
                    .DPDCtn>i {
                        background-color: #343434
                    }

                    /* night-sign color = time & date color */
                    .DPDCt {
                        font-size: 48px
                    }

                    /* time font-size */
                    .DPDCh,
                    .DPDCd {
                        font-size: 16px
                    }

                    /* headline & date font-size */
                </style>
                <div class="DPDCh" style="text-align: center; margin-left: auto; margin-right: auto;">Current Time in Cirebon</div>
                <div class="DPDCt" style="text-align: center; margin-left: auto; margin-right: auto; font-weight: normal;">
                    <span class="DPDCth">14</span><span class="DPDCtm">14</span><span class="DPDCts" style="display: none;">03</span><span class="DPDCt12" style="display: none;"></span>
                </div>
                <div class="DPDCd" style="text-align: center; margin-left: auto; margin-right: auto; font-weight: normal;">
                    <span class="DPDCdt">Tue, November 15</span><span class="DPDCtn" style="display: none;"><i></i></span>
                </div>

                <div class="DPDCs" style="display: none; text-align: center; margin-left: auto; margin-right: auto;">
                    <span class="DPDCsr">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24">
                            <path d="M12,4L7.8,8.2l1.4,1.4c0,0,0.9-0.9,1.8-1.8V14h2c0,0,0-3.3,0-6.2l1.8,1.8l1.4-1.4L12,4z"></path>
                            <path d="M6.8,15.3L5,13.5l-1.4,1.4l1.8,1.8L6.8,15.3z M4,21H1v2h3V21z M20.5,14.9L19,13.5l-1.8,1.8l1.4,1.4L20.5,14.9z M20,21v2h3 v-2H20z M6.1,23C6,22.7,6,22.3,6,22c0-3.3,2.7-6,6-6s6,2.7,6,6c0,0.3,0,0.7-0.1,1H6.1z"></path>
                        </svg>
                        6:17 am<sup>am</sup>
                    </span>
                    <span class="DPDCsl">11:30</span>
                    <span class="DPDCss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24">
                            <path d="M12,14L7.8,9.8l1.4-1.4c0,0,0.9,0.9,1.8,1.8V4h2c0,0,0,3.3,0,6.2l1.8-1.8l1.4,1.4L12,14z"></path>
                            <path d="M6.8,15.3L5,13.5l-1.4,1.4l1.8,1.8L6.8,15.3z M4,21H1v2h3V21z M20.5,14.9L19,13.5l-1.8,1.8l1.4,1.4L20.5,14.9z M20,21v2h3 v-2H20z M6.1,23C6,22.7,6,22.3,6,22c0-3.3,2.7-6,6-6s6,2.7,6,6c0,0.3,0,0.7-0.1,1H6.1z"></path>
                        </svg>
                        5:47 pm<sup>pm</sup>
                    </span>
                </div>
                <script>
                    var s, t;
                    s = document.createElement("script");
                    s.type = "text/javascript";
                    s.src = "//cdn.dayspedia.com/js/dwidget.min.vbf5fce77.js";
                    t = document.getElementsByTagName('script')[0];
                    t.parentNode.insertBefore(s, t);
                    s.onload = function() {
                        window.dwidget = new window.DigitClock();
                        window.dwidget.init("dayspedia_widget_35c2ed5bc7d4a1b6");
                    };
                </script>
                <!--/DPDC-->
            </div>
            <!--Dayspedia.com widget ENDS-->
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card mt-3 shadow shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Daftar Permohonan Tertunda</h5>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Tanggal</th>
                                        <th>Kode Pengajuan</th>
                                        <th>Mini Plant</th>
                                        <th>Pimpinan Supplier</th>
                                        <th>Jenis Produk</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengajuan as $ajuan) { ?>
                                        <tr class="align-middle">
                                            <td align="center"><?= $no++; ?></td>
                                            <td class="text-center"><?= date('d-M-Y', strtotime($ajuan['tgl_pengajuan'])) ?></td>
                                            <td class="text-center"><span class="badge badge-white"><?= $ajuan['kd_pengajuan']; ?></span></td>
                                            <td><?= $ajuan['nama_miniplant'] ?></td>
                                            <td><?= $ajuan['nama_pimpinan'] ?></td>
                                            <td class="text-center">
                                                <?php
                                                $colors = ["badge-primary", "badge-success", "badge-danger", "badge-warning", "badge-info"];
                                                $this->db->join('jenis_produk', 'jenis_produk.kd_jenis_produk = jenis_produk_supplier.kd_jenis_produk', 'left');
                                                $jenis_produk_supplier = $this->db->get_where('jenis_produk_supplier', ['kd_pengajuan' => $ajuan['kd_pengajuan'], 'kd_supplier' => $ajuan['kd_supplier']])->result_array();
                                                foreach ($jenis_produk_supplier as $jp) :
                                                ?>
                                                    <div class="badge <?= $colors[array_rand($colors)] ?>"><?= $jp['jenis_produk'] ?></div>
                                                <?php endforeach; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($ajuan['status'] == 'Tertunda') : ?>
                                                    <a href="<?= base_url('pengajuan/proses_inspeksi/' . $ajuan['kd_pengajuan']) ?>" onclick="return confirm('Apakah anda yakin?')" class="badge badge-primary" data-toggle="tooltip" data-placement="right" title="Lakukan Inspeksi?"><?= $ajuan['status']; ?></a>
                                                <?php elseif ($ajuan['status'] == 'Perlu Revisi') : ?>
                                                    <a href="<?= base_url('pengajuan/detail_inspeksi/' . $ajuan['kd_pengajuan']) ?>" class="badge badge-warning" data-toggle="tooltip" data-placement="right" title="Lihat Detail Inspeksi"><?= $ajuan['status']; ?></a>
                                                <?php elseif ($ajuan['status'] == 'Diterima') : ?>
                                                    <a href="<?= base_url('pengajuan/detail_inspeksi/' . $ajuan['kd_pengajuan']) ?>" class="badge badge-success" data-toggle="tooltip" data-placement="right" title="Lihat Detail Inspeksi"><?= $ajuan['status']; ?></a>
                                                <?php endif; ?>
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
    </div>

</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->