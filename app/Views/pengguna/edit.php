<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4><?= $title ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-wrap">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block" data-toggle="collapse" data-target="#faq2">
                                Edit Profil
                            </button>
                        </div>
                        <div id="faq2" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <div class="pb-20">
                                    <?php
                                    $session = \Config\Services::session();
                                    ?>
                                    <div class="flash-data" data-flashdata="<?= $session->getFlashdata('message'); ?>"></div>
                                    <form action="<?= base_url() ?>pengguna/update/<?= encrypt($pengguna_edit['id']); ?>" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Nama</label>
                                            <div class="col-sm-12 col-md-10">
                                                <input class="form-control" type="text" name="nama" value="<?php echo $pengguna_edit['nama'] ?>" required>
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">NIK</label>
                                            <div class="col-sm-12 col-md-10">
                                                <input class="form-control" type="text" name="nik" value="<?php echo $pengguna_edit['nik'] ?>" required>
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Hak Akses</label>
                                                <div class="custom-control custom-radio col-md-3">
                                                    &nbsp;<input type="radio" id="customRadio1" name="hak_akses" class="custom-control-input" value="1" required <?php if ($pengguna_edit['hak_akses'] == 1) {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                    <label class="custom-control-label" for="customRadio1">Admin</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-2">
                                                    <input type="radio" id="customRadio2" name="hak_akses" class="custom-control-input" value="2" required <?php if ($pengguna_edit['hak_akses'] == 2) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                    <label class="custom-control-label" for="customRadio2">Petugas</label>
                                                </div>
                                            </div>
                                        <center>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="icon-copy ti-save"></span> Simpan Perubahan
                                            </button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block" data-toggle="collapse" data-target="#faq1">
                                Edit Password
                            </button>
                        </div>
                        <div id="faq1" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="pb-20">
                                    <div class="flash-data" data-flashdata="<?= $session->getFlashdata('message'); ?>"></div>
                                    <form action="<?= base_url() ?>pengguna/update_password/<?= encrypt($pengguna_edit['id']); ?>" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Password Baru</label>
                                            <div class="col-sm-12 col-md-10">
                                                <input class="form-control" name="password_baru" type="password" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Konfirmasi Password</label>
                                            <div class="col-sm-12 col-md-10">
                                                <input class="form-control" name="konfirm_password_baru" type="password" required>
                                            </div>
                                        </div>
                                        <center>
                                            <button type="submit" class="btn btn-primary">
                                                <span class="icon-copy ti-save"></span> Simpan Perubahan
                                            </button>
                                        </center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert modal -->
        <div class="modal fade" id="alert-modal" tabindex="-1" hak_akses="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-danger text-white">
                    <div class="modal-body text-center">
                        <h3 class="text-white mb-15">
                            <i class="fa fa-exclamation-triangle"></i> Terjadi Kesalahan!
                        </h3>
                        <p> Tidak dapat menyimpan karena:
                        <p>
                            <?php echo $session->getFlashdata('error'); ?>
                        </p>
                        <button type="button" class="btn btn-light" data-dismiss="modal">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- menu active -->
        <script>
            const pengguna = document.querySelector('#pengguna');
            pengguna.classList.add('active');
        </script>