<?php

namespace App\Controllers;

use \App\Models\GambDesaModel;
use \App\Models\GambKecModel;

class AdmGambutKec extends BaseController
{
    protected $GambKecModel;
    protected $GambDesaModel;
    public function __construct()
    {
        $this->GambKecModel = new GambKecModel();
        $this->GambDesaModel = new GambDesaModel();
    }
    public function index($idkec)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov,
                        tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
                        tb_kec.id as idkec, tb_kec.kode_kec as kodekec, tb_kec.nama_kec, tb_kec.kode_kabkot,
                        tb_desa.id, tb_desa.kode_desa, tb_desa.nama_desa, tb_desa.kode_kec,
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->join('tb_kec', 'tb_kec.kode_kabkot = tb_kabkot.kode_kabkot');
        $data->join('tb_desa', 'tb_desa.kode_kec = tb_kec.kode_kec');
        $data->where('tb_kec.id', $idkec);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov,
                        tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
                        tb_kec.id as idkec, tb_kec.kode_kec as kodekec, tb_kec.nama_kec, tb_kec.kode_kabkot
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->join('tb_kec', 'tb_kec.kode_kabkot = tb_kabkot.kode_kabkot');
        $data->where('tb_kec.id', $idkec);
        $query2 = $data->get();


        $desa = $query->getResultArray();
        $kec2 = $query2->getResultArray();
        // dd($kec2);

        $kec = $this->GambKecModel->findAll();
        $data = [
            'kec2' => $kec2,
            'kec' => $kec,
            'desa' => $desa,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-detailkec', $data);
    }

    public function simpan_desa($idkec)
    {

        if (!$this->validate([
            'kodedesa' => [
                'rules' => 'required|is_unique[tb_desa.kode_desa]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'namadesa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/administrasi/kec/' . $idkec)->withInput()->with('validation', $validation);
        }
        $this->GambDesaModel->save([
            'kode_desa' => $this->request->getVar('kodedesa'),
            'nama_desa' => $this->request->getVar('namadesa'),
            'kode_kec' => $this->request->getVar('kodekec'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/administrasi/kec/' . $idkec);
    }

    public function edit_desa($idkec, $id)
    {
        $primarycode = $this->request->getVar('kodedesa');

        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambDesaModel->where('kode_desa', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode desa sudah ada dalam database.']);
            return redirect()->to('admin/gambut/administrasi/kec/' . $idkec);
        }
        $this->GambDesaModel->save([
            'id' => $id,
            'kode_desa' => $this->request->getVar('kodedesa'),
            'nama_desa' => $this->request->getVar('namadesa'),
            'kode_kec' => $this->request->getVar('kodekec'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/administrasi/kec/' . $idkec);
    }

    public function hapus_desa($idkec, $id)
    {
        $this->GambDesaModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/administrasi/kec/' . $idkec);
    }

    // public function upload($idkec)
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
    //                 return redirect()->to('admin/gambut/administrasi/kec/' . $idkec);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_kec = $value[3];
    //             $result = $db->table('tb_kec')->where('kode_kec', $kode_kec)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode kecamatan tidak ditemukan di tabel referensi: ' . $kode_kec);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_desa = $value[1];
    //             $exist = $db->table('tb_desa')->where('kode_desa', $kode_desa)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode kecamatan sudah ada di database: ' . $kode_desa);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_desa' => $value[1],
    //                 'nama_desa' => $value[2],
    //                 'kode_kec' => $value[3],
    //             ];

    //             if ($this->GambDesaModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/administrasi/kec/' . $idkec);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/administrasi/kec/' . $idkec);
    //     }
    // }
}
