<?php

namespace App\Controllers;

use \App\Models\GambKhgModel;
use \App\Models\GambSubKhgModel;
use \App\Models\GambHruModel;
use \App\Models\GambProvModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AdmGambutKawasan extends BaseController
{
    protected $GambKhgModel;
    protected $GambSubKhgModel;
    protected $GambHruModel;
    protected $GambProvModel;
    public function __construct()
    {
        $this->GambKhgModel = new GambKhgModel();
        $this->GambSubKhgModel = new GambSubKhgModel();
        $this->GambHruModel = new GambHruModel();
        $this->GambProvModel = new GambProvModel();
    }
    public function index()
    {
        $khg = $this->GambKhgModel->findAll();
        $subkhg = $this->GambSubKhgModel->findAll();
        $hru = $this->GambHruModel->findAll();
        $prov = $this->GambProvModel->findAll();
        $data = [
            'prov' => $prov,
            'khg' => $khg,
            'subkhg' => $subkhg,
            'hru' => $hru,
            'title' => 'SIGAMMA | Data Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-kawasan', $data);
    }

    public function simpan_khg()
    {
        if (!$this->validate([
            'kodekhg' => [
                'rules' => 'required|is_unique[tb_khg.kode_khg]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'namakhg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'luaskhg' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Data harus berupa angka.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/kawasan')->withInput()->with('validation', $validation);
        }
        $this->GambKhgModel->save([
            'kode_khg' => $this->request->getVar('kodekhg'),
            'nama' => $this->request->getVar('namakhg'),
            'kode_prov' => $this->request->getVar('kodeprov'),
            'luas' => $this->request->getVar('luaskhg'),
            'satuan' => $this->request->getVar('satuankhg'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/kawasan');
    }
    public function edit_khg($id)
    {
        $primarycode = $this->request->getVar('kodekhg');
        $volume = $this->request->getVar('luaskhg');

        // Cek apakah volume adalah numerik
        if (!is_numeric($volume)) {
            // Jika bukan numerik, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Data luas harus berupa angka.']);
            return redirect()->to('admin/gambut/kawasan');
        }
        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambKhgModel->where('kode_khg', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode KHG sudah ada dalam database.']);
            return redirect()->to('admin/gambut/kawasan');
        }
        $this->GambKhgModel->save([
            'id' => $id,
            'kode_khg' => $this->request->getVar('kodekhg'),
            'nama' => $this->request->getVar('namakhg'),
            'kode_prov' => $this->request->getVar('kodeprov'),
            'luas' => $this->request->getVar('luaskhg'),
            'satuan' => $this->request->getVar('satuankhg'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/kawasan');
    }

    public function hapus_khg($id)
    {
        $this->GambKhgModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/kawasan');
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
    //                 return redirect()->to('admin/gambut/kawasan');
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_prov = $value[3];
    //             $result = $db->table('tb_prov')->where('kode_prov', $kode_prov)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode provinsi tidak ditemukan di tabel referensi: ' . $kode_prov);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_khg = $value[1];
    //             $exist = $db->table('tb_khg')->where('kode_khg', $kode_khg)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode KHG sudah ada di database: ' . $kode_khg);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_khg' => $value[1],
    //                 'nama' => $value[2],
    //                 'kode_prov' => $value[3],
    //                 'luas' => $value[4],
    //                 'satuan' => $value[5],
    //             ];

    //             if ($this->GambKhgModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/kawasan');
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/kawasan');
    //     }
    // }
}
