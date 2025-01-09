<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTiketReguler;
use App\Models\ModelBuktiTiket;
use App\Models\ModelPengguna;
use Dompdf\Dompdf;
use Dompdf\Options;


class ClosedTask extends BaseController
{
    public function input()
    {
        $data['title'] = "Tiket";
        $data['pengguna'] = getLoginDataPengguna();

        // Get all tickets assigned to the logged-in user (assuming 'petugas' is the logged-in user ID)
        $ModelTiketReguler = new ModelTiketReguler();
        $data['tiket_reguler'] = $ModelTiketReguler
            ->groupStart() // Mulai grup untuk logika OR
            ->where('petugas', $data['pengguna']['id'])
            ->orWhere('petugas2', $data['pengguna']['id'])
            ->groupEnd() // Akhiri grup
            ->findAll(); // Ambil semua hasil


        return view('templates/header_1', $data)
            . view('templates/topbar_2')
            . view('templates/right_sidebar_3')
            . view('templates/left_sidebar_4')
            . view('closed_task/input')
            . view('templates/footer_6');
    }

    public function post()
    {
        // Ambil data input dari form, kecuali yang disabled
        $data = $this->request->getPost([
            'no_tiket',
            'jenis_pekerjaan',
            'sto',
            'hasil_pengecekan',
            'hasil_perbaikan',
            'gpon'
        ]);

        // Validasi input data
        if (empty($data['no_tiket']) || empty($data['jenis_pekerjaan']) || empty($data['sto'])) {
            return redirect()->back()->with('error', 'Data tidak lengkap.');
        }

        // Ambil model untuk update tiket reguler
        $modelTiketReguler = new ModelTiketReguler();
        $tiket = $modelTiketReguler->getDataByNoTiket($data['no_tiket']);

        if ($tiket) {
            // Update data tiket reguler
            $updateData = [
                'jenis_pekerjaan' => $data['jenis_pekerjaan'],
                'sto' => $data['sto'],
                'hasil_pengecekan' => $data['hasil_pengecekan'],
                'hasil_perbaikan' => $data['hasil_perbaikan'],
                'gpon' => $data['gpon'],
                'tgl_selesai' => date('Y-m-d H:i:s'),
                'status' => 3,
            ];

            $modelTiketReguler->update($tiket['id_tiket_reguler'], $updateData);

            // Menangani file gambar
            $gambarData = [];
            $fileFields = ['gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5'];

            foreach ($fileFields as $fileField) {
                $file = $this->request->getFile($fileField);
                if ($file->isValid()) {
                    $fileName = $file->getRandomName(); // Generate random file name
                    $file->move(ROOTPATH . 'public/uploads/', $fileName); // Move to the uploads folder
                    $gambarData[$fileField] = $fileName;
                }
            }

            // Insert data gambar ke tabel bukti_tiket
            if (!empty($gambarData)) {
                $modelBuktiTiket = new ModelBuktiTiket();
                $gambarData['no_tiket'] = $data['no_tiket']; // Tambahkan no_tiket untuk menghubungkan
                $modelBuktiTiket->insert($gambarData);
            }

            // Redirect atau tampilkan success message
            return redirect()->to('/mytask_tiket_reguler')->with('success', 'Data berhasil diproses.');
        } else {
            return redirect()->back()->with('error', 'Tiket tidak ditemukan.');
        }
    }

    public function getServiceDetails()
    {
        $noTiket = $this->request->getPost('no_tiket'); // Ambil nilai no_tiket dari post request
        $modelTiketReguler = new ModelTiketReguler();

        // Cek apakah no_tiket ada dan valid
        if ($noTiket) {
            $data = $modelTiketReguler->getDataByNoTiket($noTiket); // Ambil data dari model

            if ($data) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'no_service' => $data['no_service'],
                    'tipe_service' => tipe_service($data['tipe_service']),
                    'keterangan' => $data['keterangan']
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Data tidak ditemukan.'
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No tiket tidak valid.'
            ]);
        }
    }

    public function generate_pdf($no_tiket)
    {
        ob_start();

        // Dekripsi no_tiket jika diperlukan
        $no_tiket = decrypt($no_tiket);

        // Inisialisasi model
        $ModelTiketReguler = new ModelTiketReguler();
        $ModelBuktiTiket = new ModelBuktiTiket();
        $ModelPengguna = new ModelPengguna();

        // Ambil data tiket reguler berdasarkan no_tiket
        $data['tiket'] = $ModelTiketReguler->where('no_tiket', $no_tiket)->first();

        // Ambil data bukti tiket berdasarkan no_tiket
        $data['bukti_tiket'] = $ModelBuktiTiket->where('no_tiket', $no_tiket)->first();

        // Ambil data pengguna berdasarkan petugas dari tiket reguler
        if (!empty($data['tiket']['petugas'])) {
            $data['petugas'] = $ModelPengguna->find($data['tiket']['petugas']);
        } else {
            $data['petugas'] = null;
        }

        if (!empty($data['tiket']['petugas2'])) {
            $data['petugas2'] = $ModelPengguna->find($data['tiket']['petugas2']);
        } else {
            $data['petugas2'] = null;
        }

        // Pastikan data tidak kosong
        if (empty($data['tiket']) || empty($data['bukti_tiket'])) {
            throw new \Exception("Data tidak ditemukan atau kosong.");
        }

        // Render view menjadi HTML
        $html = view('closed_task/pdf_view', $data);

        // Bersihkan output buffering
        ob_end_clean();


        // Buat opsi Dompdf
        $options = new Options();
        $options->set('defaultFont', 'times');
        $options->set('isRemoteEnabled', true);


        // Inisialisasi Dompdf dengan opsi
        $dompdf = new Dompdf($options);

        // Muat HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Setel ukuran dan orientasi kertas
        // Setel ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');


        // Render PDF
        $dompdf->render();

        // Stream PDF ke browser
        $dompdf->stream("tiket_$no_tiket.pdf", array("Attachment" => 0));
        exit();
    }
}
