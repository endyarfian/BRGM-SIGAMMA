<?php

namespace App\Controllers;

use \App\Models\GambProvModel;
use \App\Models\GambKabkotModel;
use \App\Models\GambKecModel;
use \App\Models\GambDesaModel;

class AdmGambutAdministrasi extends BaseController
{
    protected $GambProvModel;
    protected $GambKabkotModel;
    protected $GambKecModel;
    protected $GambDesaModel;
    public function __construct()
    {
        $this->GambProvModel = new GambProvModel();
        $this->GambKabkotModel = new GambKabkotModel();
        $this->GambKecModel = new GambKecModel();
        $this->GambDesaModel = new GambDesaModel();
    }
    public function index()
    {
        $prov = $this->GambProvModel->findAll();
        $kabkot = $this->GambKabkotModel->findAll();
        $kec = $this->GambKecModel->findAll();
        $desa = $this->GambDesaModel->findAll();
        // dd($desa);
        $data = [
            'prov' => $prov,
            'kabkot' => $kabkot,
            'kec' => $kec,
            'desa' => $desa,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-administrasi', $data);
    }

    public function simpan_prov()
    {
        if (!$this->validate([
            'kodeprov' => [
                'rules' => 'required|is_unique[tb_prov.kode_prov]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'namaprov' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('/admin/gambut/administrasi')->withInput()->with('validation', $validation);
        }
        $this->GambProvModel->save([
            'kode_prov' => $this->request->getVar('kodeprov'),
            'nama_prov' => $this->request->getVar('namaprov'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('/admin/gambut/administrasi');
    }
    public function edit_prov($id)
    {
        $primarycode = $this->request->getVar('kodeprov');
        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambProvModel->where('kode_prov', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode provinsi sudah ada dalam database.']);
            return redirect()->to('/admin/gambut/administrasi');
        }
        $this->GambProvModel->save([
            'id' => $id,
            'kode_prov' => $this->request->getVar('kodeprov'),
            'nama_prov' => $this->request->getVar('namaprov'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('/admin/gambut/administrasi');
    }

    public function hapus_prov($id)
    {
        $this->GambProvModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('/admin/gambut/administrasi');
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
    //             if (empty($value[1]) || empty($value[2])) {
    //                 session()->setFlashdata(['info2' => 'error', 'judul2' => 'IMPORT GAGAL 😞', 'pesan2' => 'Data tidak lengkap. Pastikan semua kolom terisi.']);
    //                 return redirect()->to('/admin/gambut/administrasi');
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_prov = $value[1];
    //             $exist = $db->table('tb_prov')->where('kode_prov', $kode_prov)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode UPRG sudah ada di database: ' . $kode_prov);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_prov' => $value[1],
    //                 'nama_prov' => $value[2],
    //             ];

    //             if ($this->GambProvModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('/admin/gambut/administrasi');
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('/admin/gambut/administrasi');
    //     }
    // }
}
