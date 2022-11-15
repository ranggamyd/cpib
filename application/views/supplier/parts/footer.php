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
                            <h5 class="modal-title" id="exampleModalLabel">Siap untuk keluar?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Tekan tombol "Keluar" dibawah jika kamu ingin mengakhiri sesi ini.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
            <script src="<?= base_url('assets') ?>/vendor/toastr/toastr.min.js"></script>
            <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script>
                $(document).ready(function() {
                    $('#dataTable').dataTable();
                    $('[data-toggle="tooltip"]').tooltip({
                        placement: "bottom"
                    });

                    var i = 1;

                    $('#add').click(function() {
                        i++;
                        $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="notes[][revisi]" placeholder="Hal yang perlu direvisi" class="form-control revision_notes" required></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    });

                    $(document).on('click', '.btn_remove', function() {
                        var button_id = $(this).attr("id");
                        $('#row' + button_id + '').remove();
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