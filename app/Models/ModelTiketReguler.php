<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTiketReguler extends Model
{
    protected $table      = 'tiket_reguler';
    protected $primaryKey = 'id_tiket_reguler';
    protected $allowedFields = ['id_tiket_reguler', 'no_tiket', 'devisi', 'no_service','tipe_service', 'keterangan','ditambahkan_oleh', 'ditambahkan_pada','petugas','petugas2','status', 'jenis_pekerjaan','hasil_pengecekan','hasil_perbaikan', 'sto', 'tgl_selesai'];

    public function getDataByNoTiket($noTiket)
    {
        return $this->where('no_tiket', $noTiket)->first(); 
    }
}



