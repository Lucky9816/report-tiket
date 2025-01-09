<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTiketReguler;

class MyTask extends BaseController
{

    public function list_reguler()
    {
        $data['title'] = "Tiket";

        // Get the current logged-in user's ID (assuming getLoginDataPengguna() returns the logged-in user data)
        $data['pengguna'] = getLoginDataPengguna();

        // Fetch the logged-in user's ID (assuming 'id' is the field for user ID)
        $user_id = $data['pengguna']['id'];

        // Load the Tiket Reguler model
        $ModelTiketReguler = new ModelTiketReguler();

        // Fetch Tiket Reguler data where 'petugas' equals the logged-in user's ID
        $data['tiket_reguler'] = $ModelTiketReguler
            ->groupStart() // Mulai grup kondisi
            ->where('petugas', $user_id) // Kondisi pertama
            ->orWhere('petugas2', $user_id) // Kondisi kedua
            ->groupEnd() // Akhir grup kondisi
            ->orderBy('id_tiket_reguler', 'DESC') // Urutkan berdasarkan ID tiket secara descending
            ->findAll(); // Ambil semua hasil
        // Fetch all matching records

        // Return the view with the data
        return view('templates/header_1', $data)
            . view('templates/topbar_2')
            . view('templates/right_sidebar_3')
            . view('templates/left_sidebar_4')
            . view('my_task/list_reguler')  // Your specific view for the list
            . view('templates/footer_6');
    }

    public function update_reguler($id)
    {

        $id = decrypt($id);
        $ModelTiketReguler = new ModelTiketReguler();
        $data = [
            'status' => 2,
        ];
        $ModelTiketReguler->update($id, $data);
        return redirect()->back();
    }
}
