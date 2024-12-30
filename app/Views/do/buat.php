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
                                    <i class="icon-copy dw dw-add-file-1"></i>&nbsp;Buat Dokumen
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
            <form action="<?= base_url() ?>do/post" method="post">
                <div class="faq-wrap">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <br>
                            </div>
                            <div>
                                <div class="card-body">
                                    <div class="pb-20">
                                        <strong>1. Input Informasi DO</strong>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>No. DO</label>
                                                    <input type="text" name="no_do" value="<?= $no_do ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <label>Tanggal DO</label>
                                                    <input class="form-control date-picker" name="tgl_do" autocomplete="off" placeholder="Select Date" type="text" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>No.PO dari Pelanggan</label>
                                                    <select class="form-control custom-select2" name="id_po_pelanggan" id="id_po" style="width: 100%; height: 38px" required>
                                                        <option value="" selected disabled hidden>Pilih</option>
                                                        <?php foreach ($po_pelanggan as $d) : ?>
                                                            <option value="<?= $d['id'] ?>"><?= $d['no_po'] ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Pelanggan</label>
                                                    <input type="text" class="form-control" id="nama_pelanggan" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Pengguna Akhir</label>
                                                    <input type="text" class="form-control" id="pengguna_akhir" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Proyek</label>
                                                    <input type="text" class="form-control" id="proyek" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header">
                                <br>
                            </div>
                            <div>
                                <div class="card-body">
                                    <div class="pb-20">
                                        <strong>2. Pilih Produk dan Informasinya</strong>
                                        <hr>
                                        <br>
                                        <div>
                                            <div>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="Produk">Produk</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="Jumlah">Jumlah</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="Hapus"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div id="items">
                                        </div>
                                        <button type="button" class="btn btn-secondary" onclick="addItem()">Tambah Item</button>
                                        <br> <br>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- menu active -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const user_manage = document.querySelector('#do');
                    if (user_manage) {
                        user_manage.classList.add('active');
                    }
                    // Attach event listener to supplier dropdown
                    initSupplierDropdown();
                });
                let itemIndex = 0;
                let products = []; // Array to store fetched products

                function addItem() {
                    const itemContainer = document.getElementById('items');
                    const newItem = document.createElement('div');
                    newItem.classList.add('item');
                    newItem.innerHTML = `
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <select name="items[${itemIndex}][id_produk]" class="id_produk custom-select2 form-control" style="width: 100%; height: 38px" required>
                            <option value="" selected disabled hidden>Pilih</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="text" name="items[${itemIndex}][jumlah]" class="qty form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" onclick="removeItem(this)">Hapus</button>
                    </div>
                </div>
            </div>
            <hr>
        `;
                    itemContainer.appendChild(newItem);

                    // Reinitialize select2 for new dropdown
                    $(`select[name="items[${itemIndex}][id_produk]"]`).select2();
                    populateProductDropdown($(`select[name="items[${itemIndex}][id_produk]"]`));

                    itemIndex++;
                }

                function removeItem(button) {
                    const item = button.closest('.item');
                    item.remove();
                }

                function initSupplierDropdown() {
                    $(document).ready(function() {
                        $.ajax({
                            url: '/produk/getProduk',
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                products = data; // Store fetched products
                                populateProductDropdowns();
                            }
                        });
                    });
                }

                function populateProductDropdowns() {
                    $('.id_produk').each(function() {
                        populateProductDropdown($(this));
                    });
                }

                function populateProductDropdown(dropdown) {
                    dropdown.empty();
                    dropdown.append('<option value="" selected disabled hidden>Pilih</option>');
                    $.each(products, function(key, value) {
                        dropdown.append('<option value="' + value.id + '">' + value.merek + ' ' + value.model + '-' + value.tipe + '</option>');
                    });
                }

                $(document).ready(function() {
                    console.log('ready!');
                    $('#id_po').change(function() {
                        console.log('ready!');
                        var po_id = $(this).val();
                        if (po_id) {
                            $.ajax({
                                url: '<?= base_url("po_pelanggan/getPoDetil") ?>/' + po_id,
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    $('#nama_pelanggan').val(data.pelanggan);
                                    $('#pengguna_akhir').val(data.pengguna_akhir);
                                    $('#proyek').val(data.proyek);
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                }
                            });
                        }
                    });
                });
            </script>