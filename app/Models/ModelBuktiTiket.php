<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBuktiTiket extends Model
{
    protected $table      = 'bukti_tiket';
    protected $primaryKey = 'id_bukti_tiket';
    protected $allowedFields = ['id_bukti_tiket','gambar1', 'gambar2', 'gambar3', 'gambar4','gambar5','no_tiket'];
}



