  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets') ?>/vendor/toastr/toastr.min.js"></script>

  <!-- Custom scripts for all pages-->
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
    </script>
  <?php endif ?>

  <!-- Perpage JS -->
  <?php if (isset($style['js'])) : ?>
    <script src="<?= base_url('assets') ?>/dist/js/custom/<?= $style['js'] ?>"></script>
  <?php endif ?>
</body>

</html>