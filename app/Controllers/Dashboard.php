<?php

namespace App\Controllers;

use App\Models\ModelTiketReguler;
use App\Models\ModelPengguna;

class Dashboard extends BaseController
{
    public function index()
    {
        $modelTiketReguler = new \App\Models\ModelTiketReguler();
        $modelPengguna = new \App\Models\ModelPengguna();

        // Mengambil data petugas yang memiliki hak akses = 2
        $petugas = $modelPengguna->where('hak_akses', 2)->findAll();

        // Inisialisasi variabel untuk menyimpan data ringkasan
        $openCount = 0;
        $inProgressCount = 0;
        $closedCount = 0;
        $allCount = 0;

        // Menghitung jumlah tiket berdasarkan status
        foreach ($petugas as $user) {
            // Hitung tiket dengan status 'Open' (status = 1)
            // Hitung tiket dengan status 'Open' (status = 1)
            $open = $modelTiketReguler
                ->groupStart() // Mulai grup
                ->where('status', 1)
                ->groupStart() // Grup untuk kondisi OR
                ->where('petugas', $user['id'])
                ->orWhere('petugas2', $user['id'])
                ->groupEnd()
                ->groupEnd()
                ->countAllResults();

            // Hitung tiket dengan status 'In Progress' (status = 2)
            $inProgress = $modelTiketReguler
                ->groupStart()
                ->where('status', 2)
                ->groupStart()
                ->where('petugas', $user['id'])
                ->orWhere('petugas2', $user['id'])
                ->groupEnd()
                ->groupEnd()
                ->countAllResults();

            // Hitung tiket dengan status 'Closed' (status = 3)
            $closed = $modelTiketReguler
                ->groupStart()
                ->where('status', 3)
                ->groupStart()
                ->where('petugas', $user['id'])
                ->orWhere('petugas2', $user['id'])
                ->groupEnd()
                ->groupEnd()
                ->countAllResults();

            // Hitung semua tiket untuk petugas ini
            $all = $modelTiketReguler
                ->groupStart()
                ->where('petugas', $user['id'])
                ->orWhere('petugas2', $user['id'])
                ->groupEnd()
                ->countAllResults();


            // Menambahkan data petugas dan tiket ke dalam array
            $petugasData[] = [
                'nama' => $user['nama'],
                'open' => $open,
                'in_progress' => $inProgress,
                'closed' => $closed,
                'all' => $all
            ];

            // Menambahkan total ke dalam ringkasan
            $openCount += $open;
            $inProgressCount += $inProgress;
            $closedCount += $closed;
            $allCount += $all;
        }

        // Data untuk dikirim ke view
        $data['title'] = "Dashboard";
        $data['pengguna'] = getLoginDataPengguna();
        $data['petugasData'] = $petugasData;
        $data['openCount'] = $openCount;
        $data['inProgressCount'] = $inProgressCount;
        $data['closedCount'] = $closedCount;
        $data['allCount'] = $allCount;

        return view('templates/header_1', $data)
            . view('templates/topbar_2')
            . view('templates/right_sidebar_3')
            . view('templates/left_sidebar_4')
            . view('dashboard/ringkasan')
            . view('templates/footer_6');
    }
}
