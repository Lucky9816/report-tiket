<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTiketReguler;
use App\Models\ModelPengguna;

class TiketReguler extends BaseController
{

    public function index()
    {
        $data['title'] = "Tiket";
        $data['pengguna'] = getLoginDataPengguna(); // If needed for current logged-in user info

        // Load models
        $ModelTiketReguler = new ModelTiketReguler();
        $ModelPengguna = new ModelPengguna();

        // Fetch all tickets ordered by id
        $data['tiket_reguler'] = $ModelTiketReguler->orderBy('id_tiket_reguler', 'DESC')->findAll();

        // Fetch all users with hak_akses = 2 (Petugas)
        $data['petugas'] = $ModelPengguna->getByHakAkses(2);

        // Return the view with the data
        return view('templates/header_1', $data)
            . view('templates/topbar_2')
            . view('templates/right_sidebar_3')
            . view('templates/left_sidebar_4')
            . view('tiket_reguler/tambah_dan_daftar')
            . view('templates/footer_6');
    }


    public function post()
    {
        $session = session();
        $ModelTiketReguler = new ModelTiketReguler();
        $data = [
            'no_tiket' => $this->request->getVar('no_tiket'),
            'devisi' => $this->request->getVar('devisi'),
            'no_service' => $this->request->getVar('no_service'),
            'tipe_service' => $this->request->getVar('tipe_service'),
            'keterangan' => $this->request->getVar('keterangan'),
            'ditambahkan_oleh' => $session->get('id'),
            'petugas' => $this->request->getVar('petugas'),
        ];
        $ModelTiketReguler->insert($data);
        return redirect()->back()->with('message', 1);
    }

    public function edit($id)
    {

        $data['title'] = "Tiket";
        $id = decrypt($id);
        $ModelTiketReguler = new ModelTiketReguler();
        $ModelPengguna = new ModelPengguna();
        $data['pengguna'] = getLoginDataPengguna();
        $data['tiket_reguler'] = $ModelTiketReguler->find($id);
        // Fetch all users with hak_akses = 2 (Petugas)
        $data['petugas'] = $ModelPengguna->getByHakAkses(2);
        return view('templates/header_1', $data)
            . view('templates/topbar_2')
            . view('templates/right_sidebar_3')
            . view('templates/left_sidebar_4')
            . view('tiket_reguler/edit')
            . view('templates/footer_6');
    }

    public function update($id)
    {

        $id = decrypt($id);
        $ModelTiketReguler = new ModelTiketReguler();
        $data = [
            'no_tiket' => $this->request->getVar('no_tiket'),
            'devisi' => $this->request->getVar('devisi'),
            'no_service' => $this->request->getVar('no_service'),
            'tipe_service' => $this->request->getVar('tipe_service'),
            'keterangan' => $this->request->getVar('keterangan'),
            'petugas' => $this->request->getVar('petugas'),
        ];
        $existingData = $ModelTiketReguler->find($id);
        $changedData = array_diff_assoc($data, $existingData);
        if (empty($changedData)) {
            return redirect()->back()->with('message', 5);
        } else {
            $ModelTiketReguler->update($id, $changedData);
            return redirect()->back()->with('message', 2);
        }
    }

    public function delete($id)
    {

        $id = decrypt($id);
        $ModelTiketReguler = new ModelTiketReguler();
        $ModelTiketReguler->delete(['id' => $id]);
        return redirect()->back()->with('message', 4);
    }
}
