<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tiket <?= esc($tiket['no_tiket']) ?></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            color: #333;
            background-color: #f4f4f9;
        }

        h1 {
            text-align: center;
            color: #004d99;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .detail-box {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .detail-box p {
            flex: 1;
            margin: 10px;
            font-size: 14px;
            line-height: 1.6;
        }

        .detail-box p strong {
            color: #0056b3;
        }

        .image-container {
            display: inline-block;
            margin: 10px;
            border: 2px solid #ddd;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 120px;
        }

        .image-container img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }

        h2 {
            color: #004d99;
            font-size: 18px;
            margin-top: 30px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
            color: #aaa;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Detail Tiket <?= esc($tiket['no_tiket']) ?></h1>
        
        <div class="detail-box">
            <p><strong>No. Tiket:</strong> <?= esc($tiket['no_tiket']) ?></p>
            <p><strong>Devisi:</strong> <?= esc(devisi($tiket['devisi'])) ?></p>
            <p><strong>No. Service:</strong> <?= esc($tiket['no_service']) ?></p>
            <p><strong>Tipe Service:</strong> <?= esc(tipe_service($tiket['tipe_service'])) ?></p>
            <p><strong>Keterangan:</strong> <?= esc($tiket['keterangan']) ?></p>
            <p><strong>Petugas 1:</strong> <?= esc($petugas ? $petugas['nama'] : 'Tidak Ditentukan') ?></p>
            <p><strong>Petugas 2:</strong> <?= esc($petugas2 ? $petugas2['nama'] : 'Tidak Ditentukan') ?></p>
            <p><strong>Jenis Pekerjaan:</strong> <?= esc(jenis_pekerjaan($tiket['jenis_pekerjaan'])) ?></p>
            <p><strong>Hasil Pengecekan:</strong> <?= esc($tiket['hasil_pengecekan']) ?></p>
            <p><strong>Hasil Perbaikan:</strong> <?= esc($tiket['hasil_perbaikan']) ?></p>
            <p><strong>STO:</strong> <?= esc($tiket['sto']) ?></p>
            <p><strong>Tanggal Selesai:</strong> <?= esc($tiket['tgl_selesai']) ?></p>
        </div>

        <h2>Foto Bukti Tiket</h2>

        <div class="detail-box">
            <?php 
                for ($i = 1; $i <= 5; $i++) {
                    if ($bukti_tiket['gambar' . $i]) {
            ?>
                <div class="image-container">
                    <img src="<?= base_url('uploads/' . $bukti_tiket['gambar' . $i]) ?>" alt="Gambar <?= $i ?>">
                </div>
            <?php 
                    }
              }
            ?>
        </div>

    </div>

    <div class="footer">
        <p>Dokumen ini dihasilkan secara otomatis dan hanya untuk referensi.</p>
    </div>
</body>

</html>
