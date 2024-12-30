<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LTI Persediaan | Delivery Order (DO)</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/vendors/images/fav/favicon.ico">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin-top: 2cm;
            margin-right: 0.5cm;
            margin-bottom: 2cm;
            margin-left: 0.5cm;
            font-size: 12pt;
        }

        h1 {
            font-size: 16pt;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 3px;
            text-align: left;
            font-size: 12pt;
        }

        .no-border td {
            border: none;
            padding: 1px;
            vertical-align: top;
        }

        .no-border td:first-child {
            white-space: nowrap;
            width: auto;
        }

        th {
            text-align: center;
        }

        .right-table {
            float: right;
            width: auto;
            margin-bottom: 20px;
        }

        .no-border {
            border: none;
        }

        .center {
            vertical-align: middle;
            text-align: center;
        }

        .right {
            text-align: right;
            vertical-align: middle;
        }

        .border-bottom {
            border-bottom: 3px solid #000;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <h1><u>Delivery Order</u></h1>
    <br>
    <table class="no-border">
        <tr>
            <td><strong>DO No.</strong></td>
            <td><strong>:</strong></td>
            <td><strong><?= $do['no_do'] ?></strong></td>
        </tr>
        <tr>
            <td><strong>DO Date</strong></td>
            <td><strong>:</strong></td>
            <td><strong><?= $do['tgl_do'] ?></strong></td>
        </tr>
        <tr>
            <td><strong>Customer Name</strong></td>
            <td><strong>:</strong></td>
            <td><strong><?= $do['nama'] ?></strong></td>
        </tr>
        <tr>
            <td><strong>Address</strong></td>
            <td><strong>:</strong></td>
            <td><strong><?= $do['alamat'] ?></strong></td>
        </tr>
        <tr>
            <td><strong>Phone</strong></td>
            <td><strong>:</strong></td>
            <td><strong><?= $do['tlp'] ?></strong></td>
        </tr>
        <tr>
            <td><strong>Attn</strong></td>
            <td><strong>:</strong></td>
            <td><strong><?= $do['attn'] ?></strong></td>
        </tr>
        <tr>
            <td><strong>Customer PO No.</strong></td>
            <td><strong>:</strong></td>
            <td><strong><?= $do['no_po'] ?></strong></td>
        </tr>
    </table>

    <br>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Serial Number</th>
                <th>MAC Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $current_product = '';
            $row_count = 0;
            $grouped_items = [];

            foreach ($item_do as $d) {
                if (!isset($grouped_items[$d['produk']])) {
                    $grouped_items[$d['produk']] = [];
                }
                $grouped_items[$d['produk']][] = $d;
            }

            foreach ($grouped_items as $product => $items) :
                $rowspan = count($items);
                foreach ($items as $index => $item) :
                    if ($index % 10 == 0 && $index > 0) : ?>
        </tbody>
    </table>
    <div class="page-break"></div>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Serial Number</th>
                <th>MAC Address</th>
            </tr>
        </thead>
        <tbody>
        <?php endif; ?>
        <tr>
            <?php if ($index == 0) : ?>
                <td class="center" rowspan="<?= $rowspan ?>"><?php echo ++$no; ?></td>
                <td rowspan="<?= $rowspan ?>"><?php echo $product; ?></td>
                <td class="center" rowspan="<?= $rowspan ?>"><?php echo $item['jumlah']; ?></td>
            <?php endif; ?>
            <td><?php echo $item['nomor_seri']; ?></td>
            <td><?php echo $item['alamat_mac']; ?></td>
        </tr>
    <?php endforeach; ?>
<?php endforeach; ?>
        </tbody>
    </table>
    <br><br><br>
    <table width="100%" class="no-border">
        <tr>
            <td align="left" style="width: 70%;">
                <b>Delivered by,<br><br><br><br><br>
                    Name : .......................</b>
            </td>
            <td align="right" style="width: 30%;">
                <b>Received by,<br><br><br><br><br>
                    Name : .......................</b>
            </td>
        </tr>
    </table>

    <?php if (count($item_do) > 10) : ?>
        <div class="page-break"></div>
        <h1><u>Lampiran</u></h1>
        <br>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Serial Number</th>
                    <th>MAC Address</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($grouped_items as $product => $items) :
                    foreach ($items as $index => $item) :
                        if ($index % 10 == 0 && $index > 0) : ?>
            </tbody>
        </table>
        <div class="page-break"></div>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Serial Number</th>
 <th>MAC Address</th>
                </tr>
            </thead>
            <tbody>
            <?php endif; ?>
            <tr>
                <td class="center"><?php echo ++$no; ?></td>
                <td class="center"><?php echo $product; ?></td>
                <td><?php echo $item['nomor_seri']; ?></td>
                <td><?php echo $item['alamat_mac']; ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>