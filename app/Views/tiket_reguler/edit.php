<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4><?= $title ?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url() ?>tiket_reguler"><i class="icon-copy ion-reply"></i> Kembali</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Edit Tiket Reguler (<?php echo $tiket_reguler['no_tiket'] ?>)
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
                            <button class="btn btn-block" data-toggle="collapse" data-target="#faq2">
                                Edit Data
                            </button>
                        </div>
                        <div id="faq2" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <div class="pb-20">
                                    <?php
                                    $session = \Config\Services::session();
                                    ?>
                                    <div class="flash-data" data-flashdata="<?= $session->getFlashdata('message'); ?>"></div>
                                    <form action="<?= base_url() ?>/tiket_reguler/update/<?= encrypt($tiket_reguler['id_tiket_reguler']); ?>" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">No Tiket</label>
                                            <div class="col-sm-12 col-md-10">
                                                <input class="form-control" type="text" name="no_tiket" value="<?= $tiket_reguler['no_tiket'] ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Devisi</label>
                                            <div class="col-sm-12 col-md-10">
                                                <select class="form-control custom-select2" name="devisi" style="width: 100%; height: 38px" required>
                                                    <option value="" disabled hidden>Pilih</option>
                                                    <option value="1" <?= $tiket_reguler['devisi'] == 1 ? 'selected' : '' ?>>CCAN</option>
                                                    <option value="2" <?= $tiket_reguler['devisi'] == 2 ? 'selected' : '' ?>>SPBU</option>
                                                    <option value="3" <?= $tiket_reguler['devisi'] == 3 ? 'selected' : '' ?>>IOAN</option>
                                                    <option value="4" <?= $tiket_reguler['devisi'] == 4 ? 'selected' : '' ?>>WIFIID</option>
                                                    <option value="5" <?= $tiket_reguler['devisi'] == 5 ? 'selected' : '' ?>>NOTEB</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">No Service</label>
                                            <div class="col-sm-12 col-md-10">
                                                <input class="form-control" type="text" name="no_service" value="<?= $tiket_reguler['no_service'] ?>" required>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Tipe Service</label>
                                            <div class="col-sm-12 col-md-10">
                                                <select class="form-control custom-select2" name="tipe_service" style="width: 100%; height: 38px" required>
                                                    <option value="" disabled hidden>Pilih</option>
                                                    <option value="1" <?= $tiket_reguler['tipe_service'] == 1 ? 'selected' : '' ?>>Internet</option>
                                                    <option value="2" <?= $tiket_reguler['tipe_service'] == 2 ? 'selected' : '' ?>>IPTV</option>
                                                    <option value="3" <?= $tiket_reguler['tipe_service'] == 3 ? 'selected' : '' ?>>Voice</option>
                                                    <option value="4" <?= $tiket_reguler['tipe_service'] == 4 ? 'selected' : '' ?>>Dismantling</option>
                                                    <option value="5" <?= $tiket_reguler['tipe_service'] == 5 ? 'selected' : '' ?>>SIP Trunk</option>
                                                    <option value="6" <?= $tiket_reguler['tipe_service'] == 6 ? 'selected' : '' ?>>Peduli Infra Care</option>
                                                    <option value="7" <?= $tiket_reguler['tipe_service'] == 7 ? 'selected' : '' ?>>Valins</option>
                                                    <option value="8" <?= $tiket_reguler['tipe_service'] == 8 ? 'selected' : '' ?>>Datin OLO</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-12 col-md-10">
                                                <textarea class="form-control" name="keterangan" required><?= $tiket_reguler['keterangan'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-2 col-form-label">Petugas</label>
                                            <div class="col-sm-12 col-md-10">
                                                <select class="form-control custom-select2" name="petugas" id="petugas" style="width: 100%; height: 38px" required>
                                                    <option value="" disabled hidden>Pilih Petugas</option>
                                                    <?php if (!empty($petugas)): ?>
                                                        <?php foreach ($petugas as $petugas_item): ?>
                                                            <option value="<?= $petugas_item['id']; ?>"
                                                                <?= (isset($tiket_reguler['petugas']) && $tiket_reguler['petugas'] == $petugas_item['id']) ? 'selected' : ''; ?>>
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
                                                Simpan Perubahan
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
                            <?php
                            $error = $session->getFlashdata('error');
                            if (is_array($error)) {
                                foreach ($error as $err) {
                                    echo $err . '<br />';
                                }
                            } else {
                                echo $error;
                            }
                            ?>
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