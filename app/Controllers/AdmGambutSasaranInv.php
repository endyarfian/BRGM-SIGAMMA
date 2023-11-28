<?php

namespace App\Controllers;

use \App\Models\GambHruModel;
use \App\Models\GambTargetModel;
use \App\Models\GambOutputTargetModel;

class AdmGambutSasaranInv extends BaseController
{
    protected $GambTargetModel;
    protected $GambHruModel;
    protected $GambOutputTargetModel;
    public function __construct()
    {
        $this->GambTargetModel = new GambTargetModel();
        $this->GambHruModel = new GambHruModel();
        $this->GambOutputTargetModel = new GambOutputTargetModel();
    }
    public function index($idtarget)
    {

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, 
        tb_target.id as idtarget, tb_target.kode_target, tb_target.volume as volumetarget, tb_target.satuan as satuantarget, tb_target.deskripsi,
        tb_output_target.id, tb_output_target.kode_output_target, tb_output_target.kode_hru, tb_output_target.satuan, tb_output_target.volume');
        $data->join('tb_target', 'tb_target.kode_rencana = tb_rencana.kode_rencana');
        $data->join('tb_output_target', 'tb_output_target.kode_target = tb_target.kode_target');
        $data->where('tb_target.id', $idtarget);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul,
        tb_target.id as idtarget, tb_target.kode_target, tb_target.volume as volumetarget, tb_target.satuan as satuantarget, tb_target.deskripsi');
        $data->join('tb_target', 'tb_target.kode_rencana = tb_rencana.kode_rencana');
        $data->where('tb_target.id', $idtarget);
        $query2 = $data->get();


        $inv = $query->getResultArray();
        $sasaran2 = $query2->getResultArray();
        // dd($sasaran2);

        $sasaran = $this->GambTargetModel->findAll();
        $hru = $this->GambHruModel->findAll();
        $data = [
            'inv' => $inv,
            'sasaran2' => $sasaran2,
            'sasaran' => $sasaran,
            'hru' => $hru,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-sasaran-inv', $data);
    }

    public function simpan_sasaran_inv($idtarget)
    {
        if (!$this->validate([
            'kodeoutputtarget' => [
                'rules' => 'required|is_unique[tb_output_target.kode_output_target]',
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
            'hru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/rencana/sasaran-intervensi/' . $idtarget)->withInput()->with('validation', $validation);
        }
        $this->GambOutputTargetModel->save([
            'kode_output_target' => $this->request->getVar('kodeoutputtarget'),
            'kode_target' => $this->request->getVar('kodetarget'),
            'kode_hru' => $this->request->getVar('hru'),
            'satuan' => $this->request->getVar('satuan'),
            'volume' => $this->request->getVar('volume'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/rencana/sasaran-intervensi/' . $idtarget);
    }
    public function edit_sasaran_inv($idtarget, $id)
    {
        $primarycode = $this->request->getVar('kodeoutputtarget');
        $volume = $this->request->getVar('volume');

        // Cek apakah volume adalah numerik
        if (!is_numeric($volume)) {
            // Jika bukan numerik, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Data volume harus berupa angka.']);
            return redirect()->to('admin/gambut/rencana/sasaran-intervensi/' . $idtarget);
        }
        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambOutputTargetModel->where('kode_output_target', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode sasaran intervensi sudah ada dalam database.']);
            return redirect()->to('admin/gambut/rencana/sasaran-intervensi/' . $idtarget);
        }
        $this->GambOutputTargetModel->save([
            'id' => $id,
            'kode_output_target' => $this->request->getVar('kodeoutputtarget'),
            'kode_target' => $this->request->getVar('kodetarget'),
            'kode_hru' => $this->request->getVar('hru'),
            'satuan' => $this->request->getVar('satuan'),
            'volume' => $this->request->getVar('volume'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/rencana/sasaran-intervensi/' . $idtarget);
    }

    public function hapus_sasaran_inv($idtarget, $id)
    {
        $this->GambOutputTargetModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/rencana/sasaran-intervensi/' . $idtarget);
    }

    // public function upload($idtarget)
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
    //                 return redirect()->to('admin/gambut/rencana/sasaran-intervensi/' . $idtarget);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_target = $value[2];
    //             $result = $db->table('tb_target')->where('kode_target', $kode_target)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode target tidak ditemukan di tabel referensi: ' . $kode_target);
    //                 $counter_fail++;
    //                 continue;
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_hru = $value[3];
    //             $result = $db->table('tb_hru')->where('kode_hru', $kode_hru)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode dokumen tidak ditemukan di tabel referensi: ' . $kode_hru);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_output_target = $value[1];
    //             $exist = $db->table('tb_output_target')->where('kode_output_target', $kode_output_target)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode sasaran sudah ada di database: ' . $kode_output_target);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_output_target' => $value[1],
    //                 'kode_target' => $value[2],
    //                 'kode_hru' => $value[3],
    //                 'satuan' => $value[4],
    //                 'volume' => $value[5],
    //             ];

    //             if ($this->GambOutputTargetModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/rencana/sasaran-intervensi/' . $idtarget);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/rencana/sasaran-intervensi/' . $idtarget);
    //     }
    // }
}
