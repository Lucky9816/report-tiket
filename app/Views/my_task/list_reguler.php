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
                                    <i class="icon-copy dw dw-list"></i>&nbsp;Daftar Tiket Reguler
                                </li>
                            </ol>
                        </nav>
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
                        <div class="card-body">
                            <!-- Simple Datatable start -->
                            <div class="pb-20">
                                <table class="data-table table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="table-plus datatable-nosort">No</th>
                                            <th>Status</th>
                                            <th>Nomor Tiket</th>
                                            <th>Devisi</th>
                                            <th>No Service</th>
                                            <th>Tipe Service</th>
                                            <th>Keterangan</th>
                                            <th>Selesai</th>
                                            <th>Info Task</th>
                                            <th class="datatable-nosort">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;
                                        foreach ($tiket_reguler as $d) : ?>
                                            <tr>
                                                <td class="table-plus"><?php echo ++$no; ?></td>
                                                <td><?php echo status_tiket_reguler($d['status']); ?></td>
                                                <td><?php echo $d['no_tiket']; ?></td>
                                                <td><?php echo devisi($d['devisi']); ?></td>
                                                <td><?php echo $d['no_service']; ?></td>
                                                <td><?php echo tipe_service($d['tipe_service']); ?></td>
                                                <td><?php echo $d['keterangan']; ?></td>
                                                <td><?php echo format_indo($d['tgl_selesai']); ?></td>
                                                <td>
                                                    Dibuat Oleh: <?php echo pengguna_define($d['ditambahkan_oleh']); ?> <br>
                                                    Dibuat Pada: <?php echo format_indo($d['ditambahkan_pada']); ?>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="<?= base_url(); ?>mytask_tiket_reguler/update/<?= encrypt($d['id_tiket_reguler']); ?>"><i class="dw dw-edit2"></i> Update In Progress</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Simple Datatable End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- menu active -->
    <script>
        const user_manage = document.querySelector('#produk_masuk');
        user_manage.classList.add('active');
    </script>