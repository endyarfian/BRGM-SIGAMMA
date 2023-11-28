<?php

namespace App\Controllers;

use \App\Models\GambTindakanModel;
use \App\Models\GambSubTindakanModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AdmGambutSubTindakan extends BaseController
{
    protected $GambTindakanModel;
    protected $GambSubTindakanModel;
    public function __construct()
    {
        $this->GambTindakanModel = new GambTindakanModel();
        $this->GambSubTindakanModel = new GambSubTindakanModel();
    }
    public function index($idtindakan)
    {

        $db = \Config\Database::connect();
        $data = $db->table('tb_tindakan_restorasi');
        $data->select('
        tb_tindakan_restorasi.id as idtindakan, tb_tindakan_restorasi.kode_tindakan_restorasi as kodetindakan, tb_tindakan_restorasi.nama_tindakan_restorasi as namatindakan,
        tb_sub_tindakan_restorasi.id, tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi, tb_sub_tindakan_restorasi.nama_sub_tindakan_restorasi, 
        tb_sub_tindakan_restorasi.deskripsi');
        $data->join('tb_sub_tindakan_restorasi', 'tb_sub_tindakan_restorasi.kode_tindakan_restorasi = tb_tindakan_restorasi.kode_tindakan_restorasi');
        $data->where('tb_tindakan_restorasi.id', $idtindakan);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_tindakan_restorasi');
        $data->select('
        tb_tindakan_restorasi.id as idtindakan, tb_tindakan_restorasi.kode_tindakan_restorasi as kodetindakan, tb_tindakan_restorasi.nama_tindakan_restorasi as namatindakan');
        $data->where('tb_tindakan_restorasi.id', $idtindakan);
        $query2 = $data->get();


        $subtindakan = $query->getResultArray();
        $tindakan2 = $query2->getResultArray();
        // dd($subtindakan);

        $tindakan = $this->GambTindakanModel->findAll();
        $data = [
            'tindakan' => $tindakan,
            'tindakan2' => $tindakan2,
            'subtindakan' => $subtindakan,
            'title' => 'SIGAMMA | Data Arahan Tindakan Restorasi Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-subtindakan', $data);
    }

    public function simpan_subtindakan($idtindakan)
    {
        if (!$this->validate([
            'kodesubtindakan' => [
                'rules' => 'required|is_unique[tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],

        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/tindakan/subtindakan/' . $idtindakan)->withInput()->with('validation', $validation);
        }
        $this->GambSubTindakanModel->save([
            'kode_tindakan_restorasi' => $this->request->getVar('kodetindakan'),
            'kode_sub_tindakan_restorasi' => $this->request->getVar('kodesubtindakan'),
            'nama_sub_tindakan_restorasi' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/tindakan/subtindakan/' . $idtindakan);
    }
    public function edit_subtindakan($idtindakan, $id)
    {

        $primarycode = $this->request->getVar('kodesubtindakan');
        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambSubTindakanModel->where('kode_sub_tindakan_restorasi', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode sub arahan tindakan sudah ada dalam database.']);
            return redirect()->to('admin/gambut/tindakan/subtindakan/' . $idtindakan);
        }
        $this->GambSubTindakanModel->save([
            'id' => $id,
            'kode_tindakan_restorasi' => $this->request->getVar('kodetindakan'),
            'kode_sub_tindakan_restorasi' => $this->request->getVar('kodesubtindakan'),
            'nama_sub_tindakan_restorasi' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/tindakan/subtindakan/' . $idtindakan);
    }

    public function hapus_subtindakan($idtindakan, $id)
    {
        $this->GambSubTindakanModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/tindakan/subtindakan/' . $idtindakan);
    }

    // public function upload($idtindakan)
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
    //         $subtindakan = $sheet->getActiveSheet()->toArray();
    //         $counter_success = 0;
    //         $counter_fail = 0;

    //         foreach ($subtindakan as $key => $value) {
    //             if ($key == 0) {
    //                 continue;
    //             }

    //             // Validasi data
    //             if (empty($value[1]) || empty($value[2]) || empty($value[3]) || empty($value[4])) {
    //                 session()->setFlashdata(['info2' => 'error', 'judul2' => 'IMPORT GAGAL 😞', 'pesan2' => 'Data tidak lengkap. Pastikan semua kolom terisi.']);
    //                 return redirect()->to('admin/gambut/tindakan/subtindakan/' . $idtindakan);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_tindakan_restorasi = $value[1];
    //             $result = $db->table('tb_tindakan_restorasi')->where('kode_tindakan_restorasi', $kode_tindakan_restorasi)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode tindakan restorasi tidak ditemukan di tabel referensi: ' . $kode_tindakan_restorasi);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_sub_tindakan_restorasi = $value[2];
    //             $exist = $db->table('tb_sub_tindakan_restorasi')->where('kode_sub_tindakan_restorasi', $kode_sub_tindakan_restorasi)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode sub tindakan restorasi sudah ada di database: ' . $kode_sub_tindakan_restorasi);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_tindakan_restorasi' => $value[1],
    //                 'kode_sub_tindakan_restorasi' => $value[2],
    //                 'nama_sub_tindakan_restorasi' => $value[3],
    //                 'deskripsi' => $value[4],
    //             ];

    //             if ($this->GambSubTindakanModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/tindakan/subtindakan/' . $idtindakan);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/tindakan/subtindakan/' . $idtindakan);
    //     }
    // }
}
