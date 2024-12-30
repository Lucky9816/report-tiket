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
                                <li class="breadcrumb-item active" aria-current="page">
                                    <i class="icon-copy dw dw-list"></i>&nbsp;Daftar Dokumen
                                </li>
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
                            </br> </br>
                        </div>
                        <?php
                        $session = \Config\Services::session();
                        ?>
                        <div class="flash-data" data-flashdata="<?= $session->getFlashdata('message'); ?>"></div>
                        <div class="col-md-4 col-sm-12">
                            <form action="<?= base_url('do'); ?>" method="post">
                                <div class="form-group">
                                    <label>Filter Data Berdasarkan Range Tanggal DO</label>
                                    <div class="d-flex align-items-center">
                                        <input class="form-control datetimepicker-range" name="date_filter" value="<?php echo $range_date; ?>" placeholder="Klik disini untuk pilih range tanggal" type="text" autocomplete='off' spellcheck='false' autocorrect='off'>
                                        <button type="submit" class="btn btn-primary btn-sm mr-2">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="pb-20">
                                <table class="data-table table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>No.DO</th>
                                            <th>Tgl.DO</th>
                                            <th>Partner</th>
                                            <th>No.PO dari Partner</th>
                                            <th>Info Data</th>
                                            <th class="datatable-nosort">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($do as $d) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo status_do($d['status']); ?>
                                                </td>
                                                <td><?php echo $d['no_do']; ?></td>
                                                <td><?php echo indo_date($d['tgl_do']); ?></td>
                                                <td><?php echo pelanggan_define($d['id_pelanggan']); ?></td>
                                                <td><?php echo $d['no_po']; ?></td>
                                                <td>
                                                    <u>Created by:</u> <br> <?php echo pengguna_define($d['dibuat_oleh']); ?> <br>
                                                    <u>Created at:</u> <br> <?php echo format_indo($d['dibuat_pada']); ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="<?= base_url(); ?>do/detail/<?= encrypt($d['id']); ?>"><i class="fa fa-info-circle"></i> Detail</a>
                                                            <?php if (in_array($d['status'], [3, 4])) : ?>
                                                                <a class="dropdown-item" href="<?= base_url(); ?>do/generate_pdf/<?= encrypt($d['id']); ?>"><i class="icon-copy fa fa-file-pdf-o" aria-hidden="true"></i> Lihat dan Cetak PDF</a>
                                                                <?php if ($d['dokumen_ttd'] == null) : ?>
                                                               
                                                                        <a class="dropdown-item" href="<?= base_url(); ?>do/upload/<?= encrypt($d['id']); ?>"><i class="icon-copy bi bi-upload" aria-hidden="true"></i> Upload Dokumen Tertanda</a>
                                                                  
                                                                <?php else : ?>
                                                                    <a class="dropdown-item" href="<?= base_url(); ?>do/view/<?= $d['dokumen_ttd']; ?>"><i class="icon-copy bi bi-eye" aria-hidden="true"></i> Lihat Dokumen Tertanda</a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                            <?php if ($d['status'] == 1) { ?>
                                                                <a class="dropdown-item" href="<?= base_url(); ?>do/proses/<?= encrypt($d['id']); ?>"><i class="dw dw-edit2"></i> Proses</a>
                                                            <?php } ?>
                                                            <?php if ($d['status'] == 2) { ?>
                                                                <a class="dropdown-item" href="<?= base_url(); ?>do/penyiapan_selesai/<?= encrypt($d['id']); ?>"><i class="dw dw-edit2"></i> Penyiapan Selesai</a>
                                                            <?php } ?>
                                                            <?php if ($d['status'] == 1) { ?>
                                                                <a href="<?= base_url(); ?>do/delete/<?= encrypt($d['id']); ?>" class="dropdown-item delete-confirm"><i class="dw dw-delete-3"></i> Hapus</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu active -->
    <script>
        const user_manage = document.querySelector('#do');
        user_manage.classList.add('active');
    </script>