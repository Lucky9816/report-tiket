<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4><?= $title ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq-wrap">
                <div id="accordion">
                    <div class="card">
                        <div class="card-body">
                            <div class="pb-20">
                                <hr>
                                <form action="<?= base_url() ?>closed_tiket_reguler/post" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>No. Tiket</label>
                                                <select class="form-control custom-select2" name="no_tiket" required>
                                                    <option value="" selected disabled hidden>Pilih No. Tiket</option>
                                                    <?php foreach ($tiket_reguler as $tiket): ?>
                                                        <option value="<?= $tiket['no_tiket'] ?>"><?= $tiket['no_tiket'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>No. Service</label>
                                                <input type="text" name="no_service" class="form-control" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tipe Service</label>
                                                <input type="text" name="tipe_service" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <textarea name="keterangan" class="form-control" disabled></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jenis Pekerjaan</label>
                                                <select class="form-control custom-select2" name="jenis_pekerjaan" id="jenis_pekerjaan" style="width: 100%; height: 38px" required>
                                                    <option value="" selected disabled hidden>Pilih</option>
                                                    <option value="1">Valins</option>
                                                    <option value="2">SDWAN</option>
                                                    <option value="3">SQM HSI</option>
                                                    <option value="4">SQM DATIN</option>
                                                    <option value="5">Monet</option>
                                                    <option value="6">Dismantling</option>
                                                    <option value="7">Unspec DATIN</option>
                                                    <option value="8">Unspec HSI</option>
                                                    <option value="9">Infracare</option>
                                                    <option value="10">Lapsung</option>
                                                    <option value="11">Tiket Reguler</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>STO</label>
                                                <select class="form-control custom-select2" name="sto" id="sto" style="width: 100%; height: 38px" required>
                                                    <option value="" selected disabled hidden>Pilih</option>
                                                    <option value="1">CID</option>
                                                    <option value="2">CPP</option>
                                                    <option value="3">CBC</option>
                                                    <option value="4">GBI</option>
                                                    <option value="5">KMY</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Hasil Pengecekan</label>
                                                <textarea name="hasil_pengecekan" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Hasil Perbaikan</label>
                                                <textarea name="hasil_perbaikan" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>GPON</label>
                                                <input type="text" name="gpon" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add file input fields for 5 images -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gambar 1 (Foto Bukti)</label>
                                                <input type="file" name="gambar1" class="form-control" accept="image/*" onchange="previewImage(event, 'preview1')" required>
                                                <div id="preview1" class="mt-2"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gambar 2 (Foto Bukti)</label>
                                                <input type="file" name="gambar2" class="form-control" accept="image/*" onchange="previewImage(event, 'preview2')" required>
                                                <div id="preview2" class="mt-2"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gambar 3 (Foto Bukti)</label>
                                                <input type="file" name="gambar3" class="form-control" accept="image/*" onchange="previewImage(event, 'preview3')" required>
                                                <div id="preview3" class="mt-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gambar 4 (Foto Bukti)</label>
                                                <input type="file" name="gambar4" class="form-control" accept="image/*" onchange="previewImage(event, 'preview4')" required>
                                                <div id="preview4" class="mt-2"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gambar 5 (Foto Bukti)</label>
                                                <input type="file" name="gambar5" class="form-control" accept="image/*" onchange="previewImage(event, 'preview5')" required>
                                                <div id="preview5" class="mt-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </center>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function() {
            const previewDiv = document.getElementById(previewId);
            previewDiv.innerHTML = '<img src="' + reader.result + '" alt="Preview" style="max-width: 100%; height: auto;"/>';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<!-- Tambahkan jQuery sebelum script lainnya -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Kode JavaScript Anda yang menggunakan jQuery -->
<script type="text/javascript">
    $(document).ready(function() {
        // Ketika no_tiket dipilih
        $('select[name="no_tiket"]').change(function() {
            var noTiket = $(this).val(); // Ambil nilai no_tiket yang dipilih

            // Cek apakah no_tiket dipilih (tidak kosong)
            if (noTiket) {
                // Kirim request Ajax ke controller
                $.ajax({
                    url: '<?= site_url('closed_tiket_reguler/getServiceDetails') ?>', // URL controller
                    method: 'POST',
                    data: { no_tiket: noTiket }, // Kirim no_tiket ke controller
                    dataType: 'json',
                    success: function(response) {
                        console.log(response); // Debug: Lihat respons dari server
                        if (response.status === 'success') {
                            // Isi form dengan data yang diterima
                            $('input[name="no_service"]').val(response.no_service);
                            $('input[name="tipe_service"]').val(response.tipe_service);
                            $('textarea[name="keterangan"]').val(response.keterangan);
                        } else {
                            alert(response.message); // Tampilkan pesan error jika data tidak ditemukan
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error); // Debug: Menampilkan error di console
                        alert('Terjadi kesalahan, coba lagi nanti.');
                    }
                });
            }
        });
    });
</script>
