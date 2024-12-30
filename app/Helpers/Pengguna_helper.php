<?php

use App\Models\ModelPengguna;

function pengguna_define($id)
{
    $ModelPengguna = new ModelPengguna();
    $pengguna = $ModelPengguna->find($id);
    if ($pengguna) {
        return $pengguna['nama'];
    }
};


function getLoginDataPengguna(): array
{
    $session = session();
    $ModelPengguna = new ModelPengguna();
    $pengguna = $ModelPengguna->where('id', $session->get('id'))->first();

    return $pengguna ?? [];
}
