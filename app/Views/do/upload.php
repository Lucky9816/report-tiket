<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4><?= $title ?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url() ?>do"><i class="icon-copy dw dw-list"></i> Daftar Dokumen</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <i class="icon-copy bi bi-upload"></i>&nbsp;Upload Dokumen Tertanda
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                Submenu
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actions-dropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>do"><i class="icon-copy dw dw-list"></i>&nbsp;Daftar Dokumen</a>
                               
                                    <a class="dropdown-item" href="<?= base_url() ?>do/buat"><i class="icon-copy dw dw-add-file-1"></i>&nbsp;Buat Dokumen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-wrap">
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <br>
                        </div>
                        <div>
                            <?php
                            $session = \Config\Services::session();
                            ?>
                            <div class="flash-data" data-flashdata="<?= $session->getFlashdata('message'); ?>">
                                <div class="card-body">
                                    <div class="pb-20">
                                        <strong>Upload Dokumen Tertanda Nomor DO : <?php echo $do['no_do']; ?> </strong>
                                        <hr>
                                        <div id="selectedProducts">
                                            <!-- Daftar produk yang dipilih akan ditampilkan di sini -->
                                        </div>
                                        <br>
                                        <form action="<?= base_url() ?>do/post_upload/<?= encrypt($do['id']); ?>/<?php echo $do['id_po_pelanggan']; ?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>File PDF*</label>
                                                    <input type="file" name="dokumen_ttd" class="form-control-file form-control height-auto" required accept=".pdf">
                                                </div>
                                            </div>
                                        </div>
                                        <center>
                                            <button type="submit" class="btn btn-primary">
                                                Simpan
                                            </button>
                                        </center>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Alert modal -->
                <div class="modal fade" id="alert-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content bg-danger text-white">
                            <div class="modal-body text-center">
                                <h3 class="text-white mb-15">
                                    <i class="fa fa-exclamation-triangle"></i> Error
                                </h3>
                                <p>
                                    Tidak berhasil disimpan, karena mengalami error sebagai berikut :
                                    <br />
                                    <?php echo $session->getFlashdata('error'); ?>
                                </p>
                                <button type="button" class="btn btn-light" data-dismiss="modal">
                                    Ok
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- menu active -->
                <script>
                    const user_manage = document.querySelector('#do');
                    user_manage.classList.add('active');
                </script>