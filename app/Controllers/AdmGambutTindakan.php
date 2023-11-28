<?php

namespace App\Controllers;

use \App\Models\GambTindakanModel;

class AdmGambutTindakan extends BaseController
{
    protected $GambTindakanModel;
    public function __construct()
    {
        $this->GambTindakanModel = new GambTindakanModel();
    }
    public function index()
    {

        $tindakan = $this->GambTindakanModel->findAll();
        $data = [
            'tindakan' => $tindakan,
            'title' => 'SIGAMMA | Data Arahan Tindakan Restorasi Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-tindakan', $data);
    }

    public function simpan_tindakan()
    {
        if (!$this->validate([
            'kodetindakan' => [
                'rules' => 'required|is_unique[tb_tindakan_restorasi.kode_tindakan_restorasi]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'namatindakan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],

        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/tindakan/')->withInput()->with('validation', $validation);
        }
        $this->GambTindakanModel->save([
            'kode_tindakan_restorasi' => $this->request->getVar('kodetindakan'),
            'nama_tindakan_restorasi' => $this->request->getVar('namatindakan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/tindakan/');
    }
    public function edit_tindakan($id)
    {
        $primarycode = $this->request->getVar('kodetindakan');

        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambTindakanModel->where('kode_tindakan_restorasi', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode arahan tindakan sudah ada dalam database.']);
            return redirect()->to('admin/gambut/tindakan/');
        }
        $this->GambTindakanModel->save([
            'id' => $id,
            'kode_tindakan_restorasi' => $this->request->getVar('kodetindakan'),
            'nama_tindakan_restorasi' => $this->request->getVar('namatindakan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/tindakan/');
    }

    public function hapus_tindakan($id)
    {
        $this->GambTindakanModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/tindakan/');
    }
    // public function upload()
    // {
    //     $file = $this->request->getFile('file_excel');
    //     $ext = strtolower($file->getClientExtension());

    //     if ($ext == 'xlsx' || $ext == 'xls') {
    //         if ($ext == 'xls') {
    //             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    //         } else {
    //             $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //         }

    //         $sheet = $reader->load($file);
    //         $tindakan = $sheet->getActiveSheet()->toArray();
    //         $counter_success = 0;
    //         $counter_fail = 0;

    //         foreach ($tindakan as $key => $value) {
    //             if ($key == 0) {
    //                 continue;
    //             }

    //             // Validasi data
    //             if (empty($value[1]) || empty($value[2]) || empty($value[3])) {
    //                 session()->setFlashdata(['info2' => 'error2', 'judul2' => 'IMPORT ERROR 😞', 'pesan2' => 'Data tidak lengkap. Pastikan semua kolom terisi.']);
    //                 return redirect()->to('admin/gambut/tindakan');
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_tindakan_restorasi = $value[1];
    //             $exist = $db->table('tb_tindakan_restorasi')->where('kode_tindakan_restorasi', $kode_tindakan_restorasi)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode sub tindakan restorasi sudah ada di database: ' . $kode_tindakan_restorasi);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_tindakan_restorasi' => $value[1],
    //                 'nama_tindakan_restorasi' => $value[2],
    //                 'deskripsi' => $value[3],
    //             ];

    //             if ($this->GambTindakanModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/tindakan');
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'IMPORT ERROR 😞', 'pesan' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/tindakan');
    //     }
    // }
}
