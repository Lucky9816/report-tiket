<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengguna extends Model
{
    protected $table      = 'pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nik', 'nama', 'password', 'hak_akses'];

    public function getByHakAkses($hak_akses = 2)
    {
        // Use where() to filter by hak_akses = 2
        return $this->where('hak_akses', $hak_akses)->findAll();
    }
}
