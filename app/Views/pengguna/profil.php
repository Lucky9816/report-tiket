<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Profil Saya</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p">
                        <div class="profile-photo">
                            <img src="<?= base_url() ?>assets/src/images/profile.png" />
                        </div>
                        <h5 class="text-center h5 mb-0"><?= $pengguna['nama']; ?></h5>
                        <div class="profile-info">
                            <ul>
                                <li>
                                    <span>NIK:</span>
                                    <?= $pengguna['nik']; ?>
                                </li>
                                <li>
                                    <span>Hak Akses:</span>
                                    <?= hak_akses_define($pengguna['hak_akses']) ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" hak_akses="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#setting" hak_akses="tab">Edit Password</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Setting Tab start -->
                                    <div class="tab-pane fade show active" id="setting" hak_akses="tabpanel">
                                        <div class="pd-20">
                                            <div class="profile-timeline">
                                                <?php
                                                $session = \Config\Services::session();
                                                ?>
                                                <div class="flash-data" data-flashdata="<?= $session->getFlashdata('message'); ?>"></div>
                                                <form action="<?= base_url() ?>pengguna/profil/update_password" method="post" enctype="multipart/form-data">
                                                    <ul class="profile-edit-list row">
                                                        <li class="weight-500 col-md-6">
                                                            <div class="form-group">
                                                                <label>Password Sekarang</label>
                                                                <input class="form-control form-control-lg" name="password_sekarang" type="password" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password Baru</label>
                                                                <input class="form-control form-control-lg" name="password_baru" type="password" required />
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Konfirmasi Password</label>
                                                                <input class="form-control form-control-lg" name="new_passconf" type="password" required />
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Simpan Perubahan
                                                                </button>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Setting Tab End -->
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
                    </div>
                </div>