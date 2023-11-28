<?php

namespace App\Controllers;

use \App\Models\GambKabkotModel;
use \App\Models\GambKecModel;

class AdmGambutKabkot extends BaseController
{
    protected $GambKabkotModel;
    protected $GambKecModel;
    public function __construct()
    {
        $this->GambKabkotModel = new GambKabkotModel();
        $this->GambKecModel = new GambKecModel();
    }
    public function index($idkabkot)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov, tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
                        tb_kec.id, tb_kec.kode_kec, tb_kec.nama_kec, tb_kec.kode_kabkot
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->join('tb_kec', 'tb_kec.kode_kabkot = tb_kabkot.kode_kabkot');
        $data->where('tb_kabkot.id', $idkabkot);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov, tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->where('tb_kabkot.id', $idkabkot);
        $query2 = $data->get();


        $kec = $query->getResultArray();
        $kabkot2 = $query2->getResultArray();
        // dd($kabkot2);

        $kabkot = $this->GambKabkotModel->findAll();
        $data = [
            'kabkot2' => $kabkot2,
            'kabkot' => $kabkot,
            'kec' => $kec,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-detailkabkot', $data);
    }

    public function simpan_kec($idkabkot)
    {

        if (!$this->validate([
            'kodekec' => [
                'rules' => 'required|is_unique[tb_kec.kode_kec]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'namakec' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/administrasi/kabkot/' . $idkabkot)->withInput()->with('validation', $validation);
        }
        $this->GambKecModel->save([
            'kode_kec' => $this->request->getVar('kodekec'),
            'nama_kec' => $this->request->getVar('namakec'),
            'kode_kabkot' => $this->request->getVar('kodekabkot'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/administrasi/kabkot/' . $idkabkot);
    }

    public function edit_kec($idkabkot, $id)
    {
        $primarycode = $this->request->getVar('kodekec');

        // Cek apakah kodeoutputtargetGambKecModel sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambKecModel->where('kode_kec', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode kabupaten/kota sudah ada dalam database.']);
            return redirect()->to('admin/gambut/administrasi/kabkot/' . $idkabkot);
        }
        $this->GambKecModel->save([
            'id' => $id,
            'kode_kec' => $this->request->getVar('kodekec'),
            'nama_kec' => $this->request->getVar('namakec'),
            'kode_kabkot' => $this->request->getVar('kodekabkot'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/administrasi/kabkot/' . $idkabkot);
    }

    public function hapus_kec($idkabkot, $id)
    {
        $this->GambKecModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/administrasi/kabkot/' . $idkabkot);
    }

    // public function upload($idkabkot)
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
    //                 return redirect()->to('admin/gambut/administrasi/kabkot/' . $idkabkot);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_kabkot = $value[3];
    //             $result = $db->table('tb_kabkot')->where('kode_kabkot', $kode_kabkot)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode kabupaten/kota tidak ditemukan di tabel referensi: ' . $kode_kabkot);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_kec = $value[1];
    //             $exist = $db->table('tb_kec')->where('kode_kec', $kode_kec)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode kecamatan sudah ada di database: ' . $kode_kec);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_kec' => $value[1],
    //                 'nama_kec' => $value[2],
    //                 'kode_kabkot' => $value[3],
    //             ];

    //             if ($this->GambKecModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/administrasi/kabkot/' . $idkabkot);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/administrasi/kabkot/' . $idkabkot);
    //     }
    // }
}
