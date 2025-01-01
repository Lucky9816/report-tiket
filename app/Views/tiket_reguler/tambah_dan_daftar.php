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
                            <button class="btn btn-block" data-toggle="collapse" data-target="#faq1">
                                Tambah Data
                            </button>
                        </div>
                        <div id="faq1" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <div class="pb-20">
                                    <?php
                                    $session = \Config\Services::session();
                                    ?>
                                    <div class="flash-data" data-flashdata="<?= $session->getFlashdata('message'); ?>"></div>
                                    <form action="<?= base_url() ?>tiket_reguler/post" method="post">
                                        <div class=" form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">No Tiket</label>
                                            <div class="col-sm-12 col-md-10">
                                                <input class="form-control" type="text" name="no_tiket" value="<?= old('no_tiket') ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Devisi</label>
                                            <div class="col-sm-12 col-md-10">
                                                <select class="form-control custom-select2" name="devisi" id="devisi" style="width: 100%; height: 38px" required>
                                                    <option value="" selected disabled hidden>Pilih</option>
                                                    <option value="1" <?= old('devisi') == 'CCAN' ? 'selected' : '' ?>>CCAN</option>
                                                    <option value="2" <?= old('devisi') == 'SPBU' ? 'selected' : '' ?>>SPBU</option>
                                                    <option value="3" <?= old('devisi') == 'IOAN' ? 'selected' : '' ?>>IOAN</option>
                                                    <option value="4" <?= old('devisi') == 'WIFIID' ? 'selected' : '' ?>>WIFIID</option>
                                                    <option value="5" <?= old('devisi') == 'NOTEB' ? 'selected' : '' ?>>NOTEB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">No. Service</label>
                                            <div class="col-sm-12 col-md-10">
                                                <input class="form-control" type="text" name="no_service" value="<?= old('no_service') ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Tipe Service</label>
                                            <div class="col-sm-12 col-md-10">
                                                <select class="form-control custom-select2" name="tipe_service" id="tipe_service" style="width: 100%; height: 38px" required>
                                                    <option value="" selected disabled hidden>Pilih</option>
                                                    <option value="1" <?= old('tipe_service') == 'Internet' ? 'selected' : '' ?>>Internet</option>
                                                    <option value="2" <?= old('tipe_service') == 'IPTV' ? 'selected' : '' ?>>IPTV</option>
                                                    <option value="3" <?= old('tipe_service') == 'Voice' ? 'selected' : '' ?>>Voice</option>
                                                    <option value="4" <?= old('tipe_service') == 'SIP Trunk' ? 'selected' : '' ?>>SIP Trunk</option>
                                                    <option value="5" <?= old('tipe_service') == 'Valins' ? 'selected' : '' ?>>Valins</option>
                                                    <option value="6" <?= old('tipe_service') == 'Datin OLO' ? 'selected' : '' ?>>Datin OLO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class=" form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-12 col-md-10">
                                                <textarea class="form-control" name="keterangan" required><?= old('keterangan') ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Petugas</label>
                                            <div class="col-sm-12 col-md-10">
                                                <select class="form-control custom-select2" name="petugas" id="petugas" style="width: 100%; height: 38px" required>
                                                    <option value="" selected disabled hidden>Pilih Petugas</option>
                                                    <?php if (!empty($petugas)): ?>
                                                        <?php foreach ($petugas as $petugas_item): ?>
                                                            <option value="<?= $petugas_item['id']; ?>">
                                                                <?= $petugas_item['nama']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <option value="">No petugas available</option>
                                                    <?php endif; ?>
                                                </select>
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
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq2">
                                Daftar Data
                            </button>
                        </div>
                        <div id="faq2" class="collapse show" data-parent="#accordion">
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
                                                <th>Petugas</th>
                                                <th>Selesai</th>
                                                <th>Info Data</th>
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
                                                    <td><?php echo pengguna_define($d['petugas']); ?></td>
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
                                                                <a class="dropdown-item" href="<?= base_url(); ?>tiket_reguler/edit/<?= encrypt($d['id_tiket_reguler']); ?>"><i class="dw dw-edit2"></i> Edit</a>
                                                                <a href="<?= base_url(); ?>tiket_reguler/delete/<?= encrypt($d['id_tiket_reguler']); ?>" class="dropdown-item delete-confirm"><i class="dw dw-delete-3"></i> Hapus</a>

                                                                <?php if ($d['status'] == 3) : ?>
                                                                    <a class="dropdown-item" href="<?= base_url(); ?>closed_tiket_reguler/generate_pdf/<?= encrypt($d['no_tiket']); ?>">
                                                                        <i class="dw dw-edit2"></i> Cetak Laporan
                                                                    </a>
                                                                <?php endif; ?>
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
            const user_manage = document.querySelector('#tiket_reguler');
            user_manage.classList.add('active');
        </script>