<?php

namespace App\Controllers;

use \App\Models\GambRencanaModel;
use \App\Models\GambTargetModel;

class AdmGambutSasaran extends BaseController
{
    protected $GambTargetModel;
    protected $GambRencanaModel;
    public function __construct()
    {
        $this->GambTargetModel = new GambTargetModel();
        $this->GambRencanaModel = new GambRencanaModel();
    }
    public function index($idrencana)
    {

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, tb_target.id, tb_target.kode_target, tb_target.volume, tb_target.satuan, tb_target.deskripsi');
        $data->join('tb_target', 'tb_target.kode_rencana = tb_rencana.kode_rencana');
        $data->where('tb_rencana.id', $idrencana);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul');
        $data->where('tb_rencana.id', $idrencana);
        $query2 = $data->get();


        $sasaran = $query->getResultArray();
        $doc2 = $query2->getResultArray();
        // dd($sasaran);

        $doc = $this->GambRencanaModel->findAll();
        $data = [
            'doc' => $doc,
            'doc2' => $doc2,
            'sasaran' => $sasaran,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-sasaran', $data);
    }

    public function simpan_sasaran($idrencana)
    {

        if (!$this->validate([
            'kodetarget' => [
                'rules' => 'required|is_unique[tb_rencana.kode_rencana]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'volume' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'numeric' => 'Data harus berupa angka.',
                ]
            ],
            'satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/rencana/sasaran/' . $idrencana)->withInput()->with('validation', $validation);
        }
        $this->GambTargetModel->save([
            'kode_rencana' => $this->request->getVar('koderencana'),
            'kode_target' => $this->request->getVar('kodetarget'),
            'volume' => $this->request->getVar('volume'),
            'satuan' => $this->request->getVar('satuan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/rencana/sasaran/' . $idrencana);
    }
    public function edit_sasaran($idrencana, $id)
    {
        $primarycode = $this->request->getVar('kodetarget');
        $volume = $this->request->getVar('volume');

        // Cek apakah volume adalah numerik
        if (!is_numeric($volume)) {
            // Jika bukan numerik, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Data volume harus berupa angka.']);
            return redirect()->to('admin/gambut/rencana/sasaran/' . $idrencana);
        }
        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambTargetModel->where('kode_target', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode sasaran sudah ada dalam database.']);
            return redirect()->to('admin/gambut/rencana/sasaran/' . $idrencana);
        }
        $this->GambTargetModel->save([
            'id' => $id,
            'kode_rencana' => $this->request->getVar('koderencana'),
            'kode_target' => $this->request->getVar('kodetarget'),
            'volume' => $this->request->getVar('volume'),
            'satuan' => $this->request->getVar('satuan'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/rencana/sasaran/' . $idrencana);
    }

    public function hapus_sasaran($idrencana, $id)
    {
        $this->GambTargetModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/rencana/sasaran/' . $idrencana);
    }

    // public function upload($idrencana)
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
    //         $var = $sheet->getActiveSheet()->toArray();
    //         $counter_success = 0;
    //         $counter_fail = 0;

    //         foreach ($var as $key => $value) {
    //             if ($key == 0) {
    //                 continue;
    //             }

    //             // Validasi data
    //             if (empty($value[1]) || empty($value[2]) || empty($value[3]) || empty($value[4]) || empty($value[5])) {
    //                 session()->setFlashdata(['info2' => 'error', 'judul2' => 'IMPORT GAGAL 😞', 'pesan2' => 'Data tidak lengkap. Pastikan semua kolom terisi.']);
    //                 return redirect()->to('admin/gambut/rencana/sasaran/' . $idrencana);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_rencana = $value[1];
    //             $result = $db->table('tb_rencana')->where('kode_rencana', $kode_rencana)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode dokumen tidak ditemukan di tabel referensi: ' . $kode_rencana);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_target = $value[2];
    //             $exist = $db->table('tb_target')->where('kode_target', $kode_target)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode sasaran sudah ada di database: ' . $kode_target);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_rencana' => $value[1],
    //                 'kode_target' => $value[2],
    //                 'satuan' => $value[3],
    //                 'volume' => $value[4],
    //                 'deskripsi' => $value[5],
    //             ];

    //             if ($this->GambTargetModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/rencana/sasaran/' . $idrencana);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/rencana/sasaran/' . $idrencana);
    //     }
    // }
}
