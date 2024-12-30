<script src="<?= base_url() ?>assets/src/scripts/jquery.min.js"></script>
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
                                    <a href="<?= base_url() ?>do"><i class="icon-copy dw dw-list"></i>Daftar Dokumen</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <i class="icon-copy dw dw-add-file-1"></i>&nbsp;Detail
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
            <div id="accordion">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-20">
                            <strong>Informasi DO</strong>
                            <hr>
                            <table>
                                <tr>
                                    <td>No. DO</td>
                                    <td>&nbsp;: <?= $do['no_do'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tgl. DO</td>
                                    <td>&nbsp;: <?= indo_date($do['tgl_do']) ?></td>
                                </tr>
                                <tr>
                                    <td>Pelanggan</td>
                                    <td>&nbsp;: <?= $do['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>No. Po dari Pelanggan</td>
                                    <td>&nbsp;: <?= $do['no_po'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>&nbsp;: <?= $do['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomot Telepon</td>
                                    <td>&nbsp;: <?= $do['tlp'] ?></td>
                                </tr>
                                <tr>
                                    <td>Attn</td>
                                    <td>&nbsp;: <?= $do['attn'] ?></td>
                                </tr>
                            </table>
                            <br>
                            <strong>Informasi Produk</strong>
                            <hr>
                            <div>
                                <div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="Produk">Produk</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="Jumlah">Jumlah</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <?php foreach ($item_do as $d) : ?>
                                <div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="Produk"><?= produk_define($d['id_produk'])?></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="Jumlah"><?= $d['jumlah'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <br>
                            <strong>Informasi Data</strong>
                            <hr>
                            <table>
                                <tr>
                                    <td>Dibuat Oleh</td>
                                    <td>&nbsp;: <?= pengguna_define($do['dibuat_oleh']); ?></td>
                                </tr>
                                <tr>
                                    <td>Dibuat Pada</td>
                                    <td>&nbsp;: <?= $do['dibuat_pada'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>