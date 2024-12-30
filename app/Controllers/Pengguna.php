<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPengguna;

#Class Controller Pengguna
class Pengguna extends BaseController
{

    #Method atau fungsi untuk halaman pengguna buat baru dan daftar pengguna
    public function index()
    { 
        $ModelPengguna = new ModelPengguna();
        $data['pengguna'] = getLoginDataPengguna();
        $data['title'] = "Pengguna";
        $data['daftar_pengguna'] = $ModelPengguna->findAll();
        return view('templates/header_1', $data)
            . view('templates/topbar_2')
            . view('templates/right_sidebar_3')
            . view('templates/left_sidebar_4')
            . view('pengguna/buat_dan_daftar')
            . view('templates/footer_6');
    }

    #Method atau fungsi untuk proses menyimpan pengguna baru
    public function post()
    {
        $ModelPengguna = new ModelPengguna();
        $validation = \Config\Services::validation();
        $validation->setRules(
            [
                'nama' => [
                    'rules'  => 'required|is_unique[pengguna.nama]',
                    'errors' => [
                        'required' => 'Nama belum diisi',
                        'is_unique' => 'Pengguna sudah terdaftar',
                    ],
                ],
                'nik' => [
                    'rules'  => 'required|is_unique[pengguna.nik]',
                    'errors' => [
                        'required' => 'NIK harus diisi',
                        'is_unique' => 'NIK sudah terdaftar',
                    ],
                ],
                'hak_akses' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Hak akses belum dipilih',
                    ],
                ],
                'password' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Password harus diisi',
                    ],
                ],
                'passconf' => [
                    'rules'  => 'required|matches[password]',
                    'errors' => [
                        'matches' => 'Password dan konfirmasi password tidak sesuai',
                    ],
                ],
            ]
        );
        $validation->withRequest($this->request)->run();
        if (!$validation->run()) {
            $error = $validation->listErrors();
            return redirect()->back()->withInput()->with('error', $error);
        } else {
            $data = [
                'nama' => $this->request->getVar('nama'),
                'nik' => $this->request->getVar('nik'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'hak_akses' => $this->request->getVar('hak_akses'),
            ];
            $ModelPengguna->insert($data);
            return redirect()->back()->with('message', 1);
        }
    }

    #Method atau fungsi untuk halaman edit pengguna
    public function edit($id)
    {
        $id = decrypt($id);
        $ModelPengguna = new ModelPengguna();
        $data['pengguna'] = getLoginDataPengguna();
        $data['title'] = "Pengguna";
        $data['pengguna_edit'] = $ModelPengguna->find($id);
        return view('templates/header_1', $data)
            . view('templates/topbar_2')
            . view('templates/right_sidebar_3')
            . view('templates/left_sidebar_4')
            . view('pengguna/edit')
            . view('templates/footer_6');
    }

    #Method atau fungsi untuk proses simpan perubahan profile
    public function update($id)
    {
        $id = decrypt($id);
        $ModelPengguna = new ModelPengguna();
        
        $data = [
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'hak_akses' => $this->request->getVar('hak_akses'),
        ];

        $existingData = $ModelPengguna->find($id);
    
        $changedData = array_diff_assoc($data, $existingData);
        if (empty($changedData)) {
            return redirect()->back()->with('message', 5);
            exit;
        }
        
        $ModelPengguna->update($id, $data);
        
        return redirect()->to(base_url('/pengguna'))->with('message', 2);
    }    

    #Method atau fungsi untuk proses simpan perubahan password
    public function update_password($id)
    {
        $id = decrypt($id);
        $ModelPengguna = new ModelPengguna();
        $validation = \Config\Services::validation();
        $validation->setRules(
            [
                'konfirm_password_baru' => [
                    'rules'  => 'required|matches[password_baru]',
                    'errors' => [
                        'matches' => 'Password dan konfirmasi password tidak sesuai',
                    ],
                ],
            ]
        );
        $validation->withRequest($this->request)->run();
        if (!$validation->run()) {
            $error = $validation->listErrors();
            return redirect()->back()->with('error', $error);
        } else {
            $data = [
                'password' => password_hash($this->request->getVar('password_baru'), PASSWORD_DEFAULT),
            ];
            $ModelPengguna->update($id, $data);
            return redirect()->to(base_url('/pengguna'))->with('message', 2);
        }
    }

    #Method atau fungsi untuk proses hapus pengguna
    public function delete($id)
    {
        $ModelPengguna = new ModelPengguna();
        $id = decrypt($id);
        $ModelPengguna->delete(['id' => $id]);
        return redirect()->to(base_url('/pengguna'))->with('message', 4);
    }

    #Method atau fungsi untuk halaman profil
    public function profil()
    {
        $data['pengguna'] = getLoginDataPengguna();
        $data['title'] = "Profil";
        return view('templates/header_1', $data)
            . view('templates/topbar_2')
            . view('templates/right_sidebar_3')
            . view('templates/left_sidebar_4')
            . view('pengguna/profil')
            . view('templates/footer_6');
    }

    #Method atau fungsi untuk proses simpan perubahan password melalui halaman profil
    public function update_password_byprofil()
    {
        $id = session()->get('id');
        $ModelPengguna = new ModelPengguna();
        $user = $ModelPengguna->where('id', $id)->first();
        $password_sekarang = $this->request->getVar('password_sekarang');
        if (password_verify($password_sekarang, $user['password'])) {
            $validation = \Config\Services::validation();
            $validation->setRules(
                [
                    'new_passconf' => [
                        'rules'  => 'required|matches[password_baru]',
                        'errors' => [
                            'matches' => 'Password dan konfirmasi password tidak sesuai',
                        ],
                    ],
                ]
            );
            $validation->withRequest($this->request)->run();
            if (!$validation->run()) {
                $error = $validation->listErrors();
                return redirect()->to(base_url('/pengguna/profil'))->with('error', $error);
            }
            $data = [
                'password' => password_hash($this->request->getVar('password_baru'), PASSWORD_DEFAULT),
            ];
            $ModelPengguna->update($id, $data);
            return redirect()->to(base_url('/pengguna/profil'))->with('message', 2);
        } else {
            return redirect()->to(base_url('/pengguna/profil'))->with('message', 3);
        }
    }
}
