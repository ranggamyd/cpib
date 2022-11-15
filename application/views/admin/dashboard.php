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
                                        Ajuan Tertunda</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pengajuan_tertunda ?> </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book-reader fa-2x text-primary"></i>
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
                                        Menunggu Perbaikan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $menunggu_perbaikan ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-marker fa-2x text-warning"></i>
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
                                        Total Sertifikat</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-certificate fa-2x text-info"></i>
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
                                        Total Supplier</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_supplier ?> </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <a href="#" class="btn btn btn-primary shadow-sm"><i class="mr-2 fas fa-book-reader fa-sm text-white-50"></i> Ajukan Permohonan Baru</a>
        </div>
        <div class="col">
            <!--Dayspedia.com widget-->
            <div class="card shadow DPDC" cityid="4251" lang="en" id="dayspedia_widget_3d9f3a6135221e8" host="https://dayspedia.com" ampm="false" nightsign="true" sun="false" style="background-image: url(&quot;https://cdn.dayspedia.com/img/widgets/bg-12.png&quot;); width: 100%; border-width: 1px; background-color: rgb(255, 255, 255); border-color: rgb(222, 222, 222);">

                <style media="screen" id="dayspedia_widget_3d9f3a6135221e8_style">
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

                <a class="DPl" href="https://dayspedia.com/time/th/Bangkok/" target="_blank" style="display:block!important;text-decoration:none!important;border:none!important;cursor:pointer!important;background:transparent!important;line-height:0!important;text-shadow:none!important;position:absolute;z-index:1;top:0;right:0;bottom:0;left:0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 16 16" style="position:absolute;right:8px;bottom:0;width:16px;height:16px">
                        <path style="fill:/*defined*/#007DBF" d="M0,0v16h1.7c-0.1-0.2-0.1-0.3-0.1-0.5c0-0.9,0.8-1.6,1.6-1.6c0.9,0,1.6,0.8,1.6,1.6c0,0.2,0,0.3-0.1,0.5h1.8 c-0.1-0.2-0.1-0.3-0.1-0.5c0-0.9,0.8-1.6,1.6-1.6s1.6,0.8,1.6,1.6c0,0.2,0,0.3-0.1,0.5h1.8c-0.1-0.2-0.1-0.3-0.1-0.5 c0-0.9,0.8-1.6,1.6-1.6c0.9,0,1.6,0.8,1.6,1.6c0,0.2,0,0.3-0.1,0.5H16V0H0z M4.2,8H2V2h2.2c2.1,0,3.3,1.3,3.3,3S6.3,8,4.2,8z M11.4,6.3h-0.8V8H9V2h2.5c1.4,0,2.4,0.8,2.4,2.1C13.9,5.6,12.9,6.3,11.4,6.3z M4.4,3.5H3.7v3h0.7C5.4,6.5,6,6,6,5 C6,4.1,5.4,3.5,4.4,3.5z M11.3,3.4h-0.8V5h0.8c0.6,0,0.9-0.3,0.9-0.8C12.2,3.7,11.9,3.4,11.3,3.4z">
                        </path>
                    </svg>
                    <span title="DaysPedia.com" style="position:absolute;right:28px;bottom:6px;height:10px;width:60px;overflow:hidden;text-align:right;font:normal 10px/10px Arial,sans-serif!important;color:/*defined*/#007DBF">Powered&nbsp;by DaysPedia.com</span>
                </a>
                <div class="DPDCh" style="text-align: center; margin-left: auto; margin-right: auto; font-weight: normal;">Current Time in Bangkok</div>
                <div class="DPDCt" style="text-align: center; margin-left: auto; margin-right: auto; color: rgb(0, 0, 0); font-weight: normal;">
                    <span class="DPDCth">17</span><span class="DPDCtm">18</span><span class="DPDCts" style="display: none;">08</span><span class="DPDCt12" style="display: none;"></span>
                </div>
                <div class="DPDCd" style="text-align: center; margin-left: auto; margin-right: auto; color: rgb(0, 0, 0); font-weight: normal;">
                    <span class="DPDCdt">Mon, November 14</span><span class="DPDCtn" style="display: none; border-color: rgb(0, 0, 0);"><i style="background-color: rgb(0, 0, 0);"></i></span>
                </div>

                <div class="DPDCs" style="display: none; text-align: center; margin-left: auto; margin-right: auto; color: rgb(0, 0, 0);">
                    <span class="DPDCsr">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24">
                            <path d="M12,4L7.8,8.2l1.4,1.4c0,0,0.9-0.9,1.8-1.8V14h2c0,0,0-3.3,0-6.2l1.8,1.8l1.4-1.4L12,4z" style="fill: rgb(0, 0, 0);"></path>
                            <path d="M6.8,15.3L5,13.5l-1.4,1.4l1.8,1.8L6.8,15.3z M4,21H1v2h3V21z M20.5,14.9L19,13.5l-1.8,1.8l1.4,1.4L20.5,14.9z M20,21v2h3 v-2H20z M6.1,23C6,22.7,6,22.3,6,22c0-3.3,2.7-6,6-6s6,2.7,6,6c0,0.3,0,0.7-0.1,1H6.1z" style="fill: rgb(0, 0, 0);"></path>
                        </svg>06:17<sup style="display: none;">am</sup>
                    </span>
                    <span class="DPDCsl">11:30</span>
                    <span class="DPDCss">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24">
                            <path d="M12,14L7.8,9.8l1.4-1.4c0,0,0.9,0.9,1.8,1.8V4h2c0,0,0,3.3,0,6.2l1.8-1.8l1.4,1.4L12,14z" style="fill: rgb(0, 0, 0);"></path>
                            <path d="M6.8,15.3L5,13.5l-1.4,1.4l1.8,1.8L6.8,15.3z M4,21H1v2h3V21z M20.5,14.9L19,13.5l-1.8,1.8l1.4,1.4L20.5,14.9z M20,21v2h3 v-2H20z M6.1,23C6,22.7,6,22.3,6,22c0-3.3,2.7-6,6-6s6,2.7,6,6c0,0.3,0,0.7-0.1,1H6.1z" style="fill: rgb(0, 0, 0);"></path>
                        </svg>17:47<sup style="display: none;">pm</sup>
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
                        window.dwidget.init("dayspedia_widget_3d9f3a6135221e8");
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
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-center">
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Tanggal</th>
                                        <th>Kode Pengajuan</th>
                                        <th>Nama Supplier</th>
                                        <th>Nama Mini Plant</th>
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
                                            <td><?= $this->db->get_where('suppliers', ['kd_supplier' => $ajuan['kd_supplier']])->row('nama_supplier'); ?></td>
                                            <td><?= $this->db->get_where('miniplant_supplier', ['kd_pengajuan' => $ajuan['kd_pengajuan'], 'kd_supplier' => $ajuan['kd_supplier']])->row('nama_miniplant'); ?></td>
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