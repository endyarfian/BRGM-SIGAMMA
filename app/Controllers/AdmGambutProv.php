<?php

namespace App\Controllers;

use \App\Models\GambKabkotModel;
use \App\Models\GambProvModel;

class AdmGambutProv extends BaseController
{
    protected $GambKabkotModel;
    protected $GambProvModel;
    public function __construct()
    {
        $this->GambKabkotModel = new GambKabkotModel();
        $this->GambProvModel = new GambProvModel();
    }
    public function index($idprov)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov,tb_prov.nama_prov, tb_kabkot.id, tb_kabkot.kode_kabkot, tb_kabkot.nama_kabkot');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->where('tb_prov.id', $idprov);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov,tb_prov.nama_prov');
        $data->where('tb_prov.id', $idprov);
        $query2 = $data->get();


        $kabkot = $query->getResultArray();
        $prov2 = $query2->getResultArray();
        // dd($kabkot);

        $prov = $this->GambProvModel->findAll();
        $data = [
            'prov' => $prov,
            'prov2' => $prov2,
            'kabkot' => $kabkot,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-detailprov', $data);
    }

    public function simpan_kabkot($idprov)
    {

        if (!$this->validate([
            'kodekabkot' => [
                'rules' => 'required|is_unique[tb_kabkot.kode_kabkot]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'namakabkot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/administrasi/prov/' . $idprov)->withInput()->with('validation', $validation);
        }
        $this->GambKabkotModel->save([
            'kode_kabkot' => $this->request->getVar('kodekabkot'),
            'nama_kabkot' => $this->request->getVar('namakabkot'),
            'kode_prov' => $this->request->getVar('kodeprov'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/administrasi/prov/' . $idprov);
    }

    public function edit_kabkot($idprov, $id)
    {
        $primarycode = $this->request->getVar('kodekabkot');

        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambKabkotModel->where('kode_kabkot', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode kabupaten/kota sudah ada dalam database.']);
            return redirect()->to('admin/gambut/administrasi/prov/' . $idprov);
        }
        $this->GambKabkotModel->save([
            'id' => $id,
            'kode_kabkot' => $this->request->getVar('kodekabkot'),
            'nama_kabkot' => $this->request->getVar('namakabkot'),
            'kode_prov' => $this->request->getVar('kodeprov'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/administrasi/prov/' . $idprov);
    }

    public function hapus_kabkot($idprov, $id)
    {
        $this->GambKabkotModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/administrasi/prov/' . $idprov);
    }

    // public function upload($idprov)
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
    //             if (empty($value[1]) || empty($value[2]) || empty($value[3])) {
    //                 session()->setFlashdata(['info2' => 'error', 'judul2' => 'IMPORT GAGAL 😞', 'pesan2' => 'Data tidak lengkap. Pastikan semua kolom terisi.']);
    //                 return redirect()->to('admin/gambut/administrasi/prov/' . $idprov);
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
    //             $kode_kabkot = $value[1];
    //             $exist = $db->table('tb_kabkot')->where('kode_kabkot', $kode_kabkot)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode kabupaten/kota sudah ada di database: ' . $kode_kabkot);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_kabkot' => $value[1],
    //                 'nama_kabkot' => $value[2],
    //                 'kode_prov' => $value[3],
    //             ];

    //             if ($this->GambKabkotModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/administrasi/prov/' . $idprov);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/administrasi/prov/' . $idprov);
    //     }
    // }
}
