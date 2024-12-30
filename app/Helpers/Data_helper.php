<?php

use App\Models\ModelPelanggan;
use App\Models\ModelPemasok;
use App\Models\ModelProduk;

function pelanggan_define($id)
{
    $ModelPelanggan = new ModelPelanggan();
    $pelanggan = $ModelPelanggan->find($id);
    
    if ($pelanggan && is_array($pelanggan)) {
        // Memeriksa apakah kunci 'nama' ada dalam array $pelanggan
        if (isset($pelanggan['nama'])) {
            return $pelanggan['nama'];
        }
    }

    return ''; // Mengembalikan string kosong jika pelanggan tidak ditemukan atau kunci tidak ada
}

function pemasok_define($id)
{
    $ModelPemasok = new ModelPemasok();
    $supplier = $ModelPemasok->find($id);
    if ($supplier) {
        return $supplier['nama'];
    }
};

function produk_define($id)
{
    $ModelProduk = new ModelProduk();
    $produk = $ModelProduk->find($id);

    if ($produk && is_array($produk)) {
        // Memeriksa apakah kunci 'merek', 'model', dan 'tipe' ada dalam array $produk
        if (isset($produk['merek']) && isset($produk['model']) && isset($produk['tipe']) && isset($produk['tipe'])) {
            // Menggabungkan informasi merk, model, dan tipe menjadi satu string
            $infoProduk = $produk['merek'] . ' ' . $produk['model'] . '-' . $produk['tipe'];
            return $infoProduk;
        }
    }

    return ''; // Mengembalikan string kosong jika produk tidak ditemukan atau kunci tidak ada
}

function status_po($status)
{
    if ($status == 1) {
        return '<button type="button" class="btn btn-secondary btn-sm">Draf</button>';
    } elseif ($status == 2) {
        return '<button type="button" class="btn btn-success btn-sm">Dokumen tersedia</button>';
    }
}


function status_tiket_reguler($status)
{
    // Check the status and return the appropriate button with color
    if ($status == 1) {
        // Open - Blue
        echo '<button class="btn btn-primary">Open</button>';
    } else if ($status == 2) {
        // In Progress - Orange/Yellow
        echo '<button class="btn btn-warning">In Progress</button>';
    } else if ($status == 3) {
        // Closed - Green
        echo '<button class="btn btn-success">Closed</button>';
    } else {
        // Default status - Light Gray
        echo '<button class="btn btn-secondary">Unknown</button>';
    }
}

function sto($sto) {
    if ($sto == 1) {
        return "CID";  // Return "CID" if value is 1
    } else if ($sto == 2) {
        return "CPP";  // Return "CPP" if value is 2
    } else if ($sto == 3) {
        return "CBC";  // Return "CBC" if value is 3
    } else if ($sto == 4) {
        return "GBI";  // Return "GBI" if value is 4
    } else if ($sto == 5) {
        return "KMY";  // Return "KMY" if value is 5
    }
    return "Unknown STO";  // Return a default message for any unknown value
}


function devisi($devisi) {
    if ($devisi == 1) {
        return "CCAN";  // Return "CCAN" if value is 1
    } else if ($devisi == 2) {
        return "SPBU";  // Return "SPBU" if value is 2
    } else if ($devisi == 3) {
        return "IOAN";  // Return "IOAN" if value is 3
    } else if ($devisi == 4) {
        return "WIFIID";  // Return "WIFIID" if value is 4
    } else if ($devisi == 5) {
        return "NOTEB";  // Return "NOTEB" if value is 5
    }
    return "Unknown Devisi";  // Return a default message for any unknown value
}

function tipe_service($tipe) {
    if ($tipe == 1) {
        return "Internet";  // Return "Internet" if value is 1
    } else if ($tipe == 2) {
        return "IPTV";  // Return "IPTV" if value is 2
    } else if ($tipe == 3) {
        return "Voice";  // Return "Voice" if value is 3
    } else if ($tipe == 4) {
        return "SIP Trunk";  // Return "SIP Trunk" if value is 5
    } else if ($tipe == 5) {
        return "Valins";  // Return "Valins" if value is 7
    } else if ($tipe == 6) {
        return "Datin OLO";  // Return "Datin OLO" if value is 8
    }
    return "Unknown Tipe Service";  // Return a default message for any unknown value
}

function jenis_pekerjaan($jenis_pekerjaan) {
    if ($jenis_pekerjaan == 1) {
        return "Valins";  // Return "Valins" if value is 1
    } else if ($jenis_pekerjaan == 2) {
        return "SDWAN";  // Return "SDWAN" if value is 2
    } else if ($jenis_pekerjaan == 3) {
        return "SQM HSI";  // Return "SQM HSI" if value is 3
    } else if ($jenis_pekerjaan == 4) {
        return "SQM DATIN";  // Return "SQM DATIN" if value is 4
    } else if ($jenis_pekerjaan == 5) {
        return "Monet";  // Return "Monet" if value is 5
    } else if ($jenis_pekerjaan == 6) {
        return "Dismantling";  // Return "Dismantling" if value is 6
    } else if ($jenis_pekerjaan == 7) {
        return "Unspec DATIN";  // Return "Unspec DATIN" if value is 7
    } else if ($jenis_pekerjaan == 8) {
        return "Unspec HSI";  // Return "Unspec HSI" if value is 8
    } else if ($jenis_pekerjaan == 9) {
        return "Infracare";  // Return "Infracare" if value is 9
    } else if ($jenis_pekerjaan == 10) {
        return "Lapsung";  // Return "Lapsung" if value is 10
    } else if ($jenis_pekerjaan == 11) {
        return "Tiket Reguler";  // Return "Tiket Reguler" if value is 11
    }
    return "Unknown Jenis Pekerjaan";  // Return a default message for any unknown value
}

