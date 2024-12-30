<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengguna;

class Autentikasi extends BaseController
{

    public function login()
    {
        $data['title'] = "Login";
        return view('autentikasi/login', $data);
    }

    public function valid_login()
    {
        $session = \Config\Services::session();
        $ModelPengguna = new ModelPengguna();
        $data = $this->request->getPost();
        $pengguna = $ModelPengguna->where('nik', $data['nik'])->first();
        if ($pengguna) {
            $verify_pass = password_verify($data['password'], $pengguna['password']);
            if ($verify_pass) {
                $sessLogin = [
                    'logged_in' => TRUE,
                    'id' => $pengguna['id'],
                    'hak_akses' => $pengguna['hak_akses']
                ];
                $session->set($sessLogin);
                return redirect()->to(base_url());
            } else {
                $session->setFlashdata('msg', 'Password tidak benar');
                return redirect()->to(base_url('login'));
            }
        } else {
            $session->setFlashdata('msg', 'nik tidak terdaftar');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
