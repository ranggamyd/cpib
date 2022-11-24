            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; CPIB BKIPM 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Tekan tombol "Keluar" dibawah jika anda ingin mengakhiri sesi ini.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Keluar</a>
                        </div>
                    </div>
                </div>
            </div>

            <script src="<?= base_url('assets') ?>/vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script>
            <script src="<?= base_url('assets') ?>/vendor/toastr/toastr.min.js"></script>
            <script src="<?= base_url('assets') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url('assets') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script>
                $(document).ready(function() {
                    $('#dataTable').dataTable();
                    $('[data-toggle="tooltip"]').tooltip({
                        placement: "bottom"
                    });

                    var no = 1;

                    $('#addProses').click(function() {
                        no++;
                        const input = `
                            <tr id="rowProses-${no}" class="dynamic-added">
                                <td>
                                    <select name="tahap_penanganan[][kd_penanganan]" id="tahap_penanganan" class="form-control" required>
                                        <option selected disabled>== Pilih Proses ==</option>
                                        <?php foreach ($this->db->get('penanganan')->result_array() as $tp) : ?>
                                            <option value="<?= $tp['kd_penanganan'] ?>"><?= $tp['nama_penanganan'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                                <td><button type="button" name="remove" id="${no}" class="btn btn-danger btn_remove-proses">X</button></td>
                            </tr>`
                        console.log(input);
                        $('#dynamic_field-proses').append(input);
                    });


                    $(document).on('click', '.btn_remove-proses', function() {
                        var button_id = $(this).attr("id");
                        $('#rowProses-' + button_id + '').remove();
                    });

                    var i = 1;

                    $('#addRevisi').click(function() {
                        i++;
                        const input = `
                            <tr id="rowRevisi-${i}" class="dynamic-added">
                                <td><input type="text" name="notes[][revisi]" placeholder="Tuliskan sesuatu .." class="form-control" required></td>
                                <td><button type="button" name="remove" id="${i}" class="btn btn-danger btn_remove-revisi">X</button></td>
                            </tr>
                        `
                        $('#dynamic_field-revisi').append(input);
                    });

                    $(document).on('click', '.btn_remove-revisi', function() {
                        var button_id = $(this).attr("id");
                        $('#rowRevisi-' + button_id + '').remove();
                    });

                    // ============================================================
                    // HITUNG NILAI
                    // ============================================================

                    // Update Klasifikasi
                    const updateKlasifikasi = () => {
                        const minor = $("#jmlMinor").val();
                        const mayor = $("#jmlMayor").val();
                        const serius = $("#jmlSerius").val();
                        const kritis = $("#jmlKritis").val();

                        let klasifikasi

                        if (minor == 0 && mayor == 0 && serius == 0 && kritis == 0) {
                            klasifikasi = '-';
                        } else if (minor <= 6 && mayor <= 5 && serius == 0 && kritis == 0) {
                            klasifikasi = 'Sangat Baik';
                        } else if (minor >= 7 && (mayor >= 6 && mayor <= 10) && (serius >= 1 && serius <= 2) && kritis == 0) {
                            klasifikasi = 'BAIK';
                            if (mayor + serius > 10) klasifikasi = 'Cukup';
                        } else if (mayor >= 11 && (serius >= 3 && serius <= 4) && kritis == 0) {
                            klasifikasi = 'Cukup';
                        } else if (serius >= 5 && kritis >= 1) {
                            klasifikasi = 'Kurang';
                        } else {
                            klasifikasi = 'Tidak memenuhi Kriteria';
                        }

                        $("#klasifikasi").val(klasifikasi);
                        $("#is_needRevisi").attr("checked", false);
                        if (klasifikasi == 'Cukup' || klasifikasi == 'Kurang') $("#is_needRevisi").attr("checked", true);

                        $(".tdKlasifikasi").attr('class', 'text-center tdKlasifikasi');
                        const className = "bg-success text-light";

                        if (minor <= 6) {
                            $("#minor_6").addClass(className);
                        } else if (minor >= 7) {
                            $("#minor_7").addClass(className)
                        }

                        if (mayor <= 5) {
                            $("#mayor_5").addClass(className)
                        } else if (mayor <= 10) {
                            $("#mayor_10").addClass(className)
                        } else if (mayor >= 11) {
                            $("#mayor_11").addClass(className)
                        }

                        if (serius == 0) {
                            $("#serius_0").addClass(className)
                        } else if (serius <= 2) {
                            $("#serius_2").addClass(className)
                        } else if (serius <= 4) {
                            $("#serius_4").addClass(className)
                        } else if (serius >= 5) {
                            $("#serius_5").addClass(className)
                        }

                        if (kritis == 0) {
                            $("#kritis_01").addClass(className)
                            $("#kritis_02").addClass(className)
                            $("#kritis_03").addClass(className)
                        } else if (kritis >= 1) {
                            $("#kritis_1").addClass(className)
                        }
                    }

                    updateKlasifikasi()

                    // MINOR
                    $(".checkbox_is_minor").click(function(e) {
                        $(this).toggleClass('checked_minor');

                        let totMinor = 0;
                        $(".checked_minor").each(function(index, element) {
                            totMinor += 1;
                        });

                        $("#jmlMinor").val(totMinor);
                        updateKlasifikasi()
                    });
                    // MAYOR
                    $(".checkbox_is_mayor").click(function(e) {
                        $(this).toggleClass('checked_mayor');

                        let totMayor = 0;
                        $(".checked_mayor").each(function(index, element) {
                            totMayor += 1;
                        });

                        $("#jmlMayor").val(totMayor);
                        updateKlasifikasi()
                    });
                    // SERIUS
                    $(".checkbox_is_serius").click(function(e) {
                        $(this).toggleClass('checked_serius');

                        let totSerius = 0;
                        $(".checked_serius").each(function(index, element) {
                            totSerius += 1;
                        });

                        $("#jmlSerius").val(totSerius);
                        updateKlasifikasi()
                    });
                    // KRITIS
                    $(".checkbox_is_kritis").click(function(e) {
                        $(this).toggleClass('checked_kritis');

                        let totKritis = 0;
                        $(".checked_kritis").each(function(index, element) {
                            totKritis += 1;
                        });

                        $("#jmlKritis").val(totKritis);
                        updateKlasifikasi()
                    });

                    // remove marked table
                    $("button[type='reset']").click(function(e) {
                        updateKlasifikasi()
                    });
                });
            </script>
            <?php if ($this->session->flashdata('sukses')) : ?>
                <script>
                    toastr.success("<?= $this->session->flashdata('sukses') ?>", "Berhasil", {
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "timeOut": "7500",
                    });
                </script>
            <?php elseif ($this->session->flashdata('gagal')) : ?>
                <script>
                    toastr.error("<?= $this->session->flashdata('gagal') ?>", "Gagal", {
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "timeOut": "5000",
                    });
                    <?php if ($this->session->flashdata('hasModalID')) : ?>
                        $("#<?= $this->session->flashdata('hasModalID') ?>").modal();
                    <?php endif ?>
                </script>
            <?php endif ?>

            <!-- Perpage JS -->
            <?php if (isset($style['js'])) : ?>
                <script src="<?= base_url('assets') ?>/js/<?= $style['js'] ?>"></script>
            <?php endif ?>
            </body>

            </html>