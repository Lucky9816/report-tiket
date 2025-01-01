<div class="footer-wrap pd-20 mb-20 card-box">
    &copy; <span id="currentYear"></span> Telkom Akses.
</div>
</div>
</div>
<!-- js -->
<script src="<?= base_url() ?>assets/vendors/scripts/core.js"></script>
<script src="<?= base_url() ?>assets/vendors/scripts/script.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/scripts/process.js"></script>
<script src="<?= base_url() ?>assets/vendors/scripts/layout-settings.js"></script>
<!-- Datatables -->
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<!-- Datatable Setting js -->
<script src="<?= base_url() ?>assets/vendors/scripts/datatable-setting.js"></script>
<!-- Custom Script -->
<script src="<?= base_url() ?>assets/vendors/scripts/custom-script.js"></script>
<!-- Switchalert -->
<script src="<?= base_url(); ?>assets/src/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/src/plugins/sweetalert/alert-script.js"></script>
<?php
$session = \Config\Services::session();
?>
<?php if (!empty($session->getFlashdata('error'))) { ?>
    <script>
        $(function() {
            $('#alert-modal').modal('show');
        });
        const faq1 = document.querySelector('#faq1');
        faq1.classList.add('show');
    </script>
<?php } ?>
</body>

</html>