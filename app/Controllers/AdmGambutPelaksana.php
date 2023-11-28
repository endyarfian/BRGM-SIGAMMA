<?php

namespace App\Controllers;

use \App\Models\GambKabkotModel;
use \App\Models\GambProvModel;
use \App\Models\GambPelaksanaModel;

class AdmGambutPelaksana extends BaseController
{
    protected $GambKabkotModel;
    protected $GambProvModel;
    protected $GambPelaksanaModel;
    public function __construct()
    {
        $this->GambKabkotModel = new GambKabkotModel();
        $this->GambProvModel = new GambProvModel();
        $this->GambPelaksanaModel = new GambPelaksanaModel();
    }
    public function index($idprov)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov,tb_prov.nama_prov, tb_pelaksana.id, tb_pelaksana.kode_pelaksana, tb_pelaksana.nama, tb_pelaksana.jenis, tb_pelaksana.pj, tb_pelaksana.tlpn, tb_pelaksana.alamat, tb_pelaksana.kode_prov');
        $data->join('tb_pelaksana', 'tb_pelaksana.kode_prov = tb_prov.kode_prov');
        $data->where('tb_prov.id', $idprov);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov,tb_prov.nama_prov');
        $data->where('tb_prov.id', $idprov);
        $query2 = $data->get();


        $pelaksana = $query->getResultArray();
        $prov2 = $query2->getResultArray();
        // dd($pelaksana);

        $prov = $this->GambProvModel->findAll();
        $data = [
            'prov' => $prov,
            'prov2' => $prov2,
            'pelaksana' => $pelaksana,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-pelaksana', $data);
    }

    public function simpan_pelaksana($idprov)
    {

        if (!$this->validate([
            'kodepelaksana' => [
                'rules' => 'required|is_unique[tb_pelaksana.kode_pelaksana]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'pj' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/administrasi/pelaksana/' . $idprov)->withInput()->with('validation', $validation);
        }
        $this->GambPelaksanaModel->save([
            'kode_pelaksana' => $this->request->getVar('kodepelaksana'),
            'jenis' => $this->request->getVar('jenis'),
            'nama' => $this->request->getVar('nama'),
            'pj' => $this->request->getVar('pj'),
            'tlpn' => $this->request->getVar('tlpn'),
            'alamat' => $this->request->getVar('alamat'),
            'kode_prov' => $this->request->getVar('kodeprov'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/administrasi/pelaksana/' . $idprov);
    }

    public function edit_pelaksana($idprov, $id)
    {
        $primarycode = $this->request->getVar('kodepelaksana');

        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambPelaksanaModel->where('kode_pelaksana', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode kabupaten/kota sudah ada dalam database.']);
            return redirect()->to('admin/gambut/administrasi/pelaksana/' . $idprov);
        }
        $this->GambPelaksanaModel->save([
            'id' => $id,
            'kode_pelaksana' => $this->request->getVar('kodepelaksana'),
            'jenis' => $this->request->getVar('jenis'),
            'nama' => $this->request->getVar('nama'),
            'pj' => $this->request->getVar('pj'),
            'tlpn' => $this->request->getVar('tlpn'),
            'alamat' => $this->request->getVar('alamat'),
            'kode_prov' => $this->request->getVar('kodeprov'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/administrasi/pelaksana/' . $idprov);
    }

    public function hapus_pelaksana($idprov, $id)
    {
        $this->GambPelaksanaModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/administrasi/pelaksana/' . $idprov);
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
    //             if (empty($value[1]) || empty($value[2]) || empty($value[3]) || empty($value[4]) || empty($value[5]) || empty($value[6]) || empty($value[7])) {
    //                 session()->setFlashdata(['info2' => 'error', 'judul2' => 'IMPORT GAGAL 😞', 'pesan2' => 'Data tidak lengkap. Pastikan semua kolom terisi.']);
    //                 return redirect()->to('admin/gambut/administrasi/pelaksana/' . $idprov);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_prov = $value[7];
    //             $result = $db->table('tb_prov')->where('kode_prov', $kode_prov)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode provinsi tidak ditemukan di tabel referensi: ' . $kode_prov);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_pelaksana = $value[1];
    //             $exist = $db->table('tb_kabkot')->where('kode_pelaksana', $kode_pelaksana)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode pelaksana sudah ada di database: ' . $kode_pelaksana);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_pelaksana' => $value[1],
    //                 'jenis' => $value[2],
    //                 'nama' => $value[3],
    //                 'pj' => $value[4],
    //                 'tlpn' => $value[5],
    //                 'alamat' => $value[6],
    //                 'kode_prov' => $value[7],
    //             ];

    //             if ($this->GambPelaksanaModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/administrasi/pelaksana/' . $idprov);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/administrasi/pelaksana/' . $idprov);
    //     }
    // }
}
