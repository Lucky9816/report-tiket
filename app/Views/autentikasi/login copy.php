<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTI Inventory | <?= $title ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/vendors/images/fav/favicon.ico">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/login-page/css/style-with-prefix.css">
    <style>
        .srouce {
            text-align: center;
            color: #ffffff;
            padding: 10px;
        }

        .alert {
            padding: 20px;
            background-color: #f44336;
            /* Red */
            color: white;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="main-container">
        <div class="form-container">
            </br>
            </br>
            </br>
            </br>
            <div class="form-body">

                <center><img alt="Responsive image" style="width:160px;height:80px;" src="<?= base_url() ?>assets/vendors/images/lti-logo.png">
                </center>
                </br>
                <h2 class="title">Selamat Datang</h2>
                </br>
                <?php if (session()->getFlashdata('msg')) : ?>
                    <div class="alert"><?= session()->getFlashdata('msg') ?></div>
                <?php endif; ?>
                <form action="<?= base_url() ?>valid_login" method="post" class="the-form">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Ketik email anda" autocomplete="on" required>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Ketik password anda" autocomplete="off" required>

                    <input type="submit" value="Masuk">

                </form>

            </div><!-- FORM BODY-->

            <div class="form-footer">
                <div>
                    &copy; <span id="currentYear"></span> PT Lixa Teknologi Indonesia.
                </div>
            </div><!-- FORM FOOTER -->

        </div><!-- FORM CONTAINER -->
    </div>
    <!-- Custom Script -->
    <script src="<?= base_url() ?>assets/vendors/scripts/custom-script.js"></script>
</body>

</html>