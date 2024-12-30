<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>LTI Persediaan</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url(); ?>assets/vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>assets/vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/vendors/styles/style.css" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
</head>

<body>
    <div class="error-page d-flex align-items-center flex-wrap justify-content-center">
        <div class="pd-10">
            <div class="error-page-wrap text-center">
                <div class="d-flex align-items-center flex-column justify-content-center">
                    <h2 class="mt-5">Akses ditolak!</h2>
                    <p class="mt-2">Anda tidak memiliki hak akses untuk melakukan operasi atau melihat halaman dengan URL ini.</p>
                    <div class="pt-2 mx-auto max-width-200">
                        <a href="javascript:window.history.back()" class="btn btn-primary btn-block btn-lg">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- js -->
        <script src="<?= base_url(); ?>assets/vendors/scripts/core.js"></script>
        <script src="<?= base_url(); ?>assets/vendors/scripts/script.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendors/scripts/process.js"></script>
        <script src="<?= base_url(); ?>assets/vendors/scripts/layout-settings.js"></script>
    </div>
</body>

</html>