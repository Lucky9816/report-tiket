<!DOCTYPE html>
<html>
<head>
    <title>LTI Inventori | Delivery Order (DO)</title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/vendors/images/fav/favicon.ico" type="image/x-icon">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
            overflow: auto;
        }
    </style>
</head>
<body>
    <iframe src="<?= base_url('do/download/' . $dokumen_ttd) ?>">
        This browser does not support PDFs. Please download the PDF to view it: 
        <a href="<?= base_url('do/download/' . $dokumen_ttd) ?>">Download PDF</a>
    </iframe>
</body>
</html>
