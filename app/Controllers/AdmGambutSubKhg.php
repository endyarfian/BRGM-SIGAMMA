<?php

namespace App\Controllers;

use \App\Models\GambSubKhgModel;
use \App\Models\GambHruModel;

class AdmGambutSubKhg extends BaseController
{
    protected $GambSubKhgModel;
    protected $GambHruModel;
    public function __construct()
    {
        $this->GambSubKhgModel = new GambSubKhgModel();
        $this->GambHruModel = new GambHruModel();
    }
    public function index($idsubkhg)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.kode_khg as kodekhg, tb_khg.id as idkhg,tb_khg.nama as namakhg, tb_sub_khg.id as idsubkhg, tb_sub_khg.kode_sub_khg, tb_sub_khg.nama_sub_khg,
        tb_hru.id, tb_hru.kode_hru, tb_hru.nama_hru, tb_hru.luas, tb_hru.satuan');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg = tb_khg.kode_khg');
        $data->join('tb_hru', 'tb_hru.kode_sub_khg = tb_sub_khg.kode_sub_khg');
        $data->where('tb_sub_khg.id', $idsubkhg);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.kode_khg as kodekhg, tb_khg.id as idkhg,tb_khg.nama as namakhg, tb_sub_khg.id as idsubkhg, tb_sub_khg.kode_sub_khg as kodesubkhg, tb_sub_khg.nama_sub_khg as namasubkhg');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg = tb_khg.kode_khg');
        $data->where('tb_sub_khg.id', $idsubkhg);
        $query2 = $data->get();


        $hru = $query->getResultArray();
        $subkhg2 = $query2->getResultArray();
        // dd($hru);

        $subkhg = $this->GambSubKhgModel->findAll();
        $data = [
            'subkhg' => $subkhg,
            'subkhg2' => $subkhg2,
            'hru' => $hru,
            'title' => 'SIGAMMA | Data Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-detailsubkhg', $data);
    }

    public function simpan_hru($idsubkhg)
    {
        if (!$this->validate([
            'kodehru' => [
                'rules' => 'required|is_unique[tb_hru.kode_hru]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'namahru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'satuanhru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'luashru' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Data harus berupa angka.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/kawasan/subkhg/' . $idsubkhg)->withInput()->with('validation', $validation);
        }
        $this->GambHruModel->save([
            'kode_sub_khg' => $this->request->getVar('kodesubkhg'),
            'kode_hru' => $this->request->getVar('kodehru'),
            'nama_hru' => $this->request->getVar('namahru'),
            'satuan' => $this->request->getVar('satuanhru'),
            'luas' => $this->request->getVar('luashru'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/kawasan/subkhg/' . $idsubkhg);
    }
    public function edit_hru($idsubkhg, $id)
    {
        $primarycode = $this->request->getVar('kodesubkhg');
        $volume = $this->request->getVar('luashru');

        // Cek apakah volume adalah numerik
        if (!is_numeric($volume)) {
            // Jika bukan numerik, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Data luas harus berupa angka.']);
            return redirect()->to('admin/gambut/kawasan/subkhg/' . $idsubkhg);
        }
        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambHruModel->where('kode_sub_khg', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode HRU sudah ada dalam database.']);
            return redirect()->to('admin/gambut/kawasan/subkhg/' . $idsubkhg);
        }
        $this->GambHruModel->save([
            'id' => $id,
            'kode_sub_khg' => $this->request->getVar('kodesubkhg'),
            'kode_hru' => $this->request->getVar('kodehru'),
            'nama_hru' => $this->request->getVar('namahru'),
            'satuan' => $this->request->getVar('satuanhru'),
            'luas' => $this->request->getVar('luashru'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/kawasan/subkhg/' . $idsubkhg);
    }

    public function hapus_hru($idsubkhg, $id)
    {
        $this->GambHruModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/kawasan/subkhg/' . $idsubkhg);
    }

    // public function upload($idsubkhg)
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
    //                 return redirect()->to('admin/gambut/kawasan/subkhg/' . $idsubkhg);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_sub_khg = $value[1];
    //             $result = $db->table('tb_sub_khg')->where('kode_sub_khg', $kode_sub_khg)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode KHG tidak ditemukan di tabel referensi: ' . $kode_sub_khg);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_hru = $value[2];
    //             $exist = $db->table('tb_hru')->where('kode_hru', $kode_hru)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode sub KHG sudah ada di database: ' . $kode_hru);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_sub_khg' => $value[1],
    //                 'kode_hru' => $value[2],
    //                 'nama_hru' => $value[3],
    //                 'luas' => $value[4],
    //                 'satuan' => $value[5],
    //             ];

    //             if ($this->GambHruModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/kawasan/subkhg/' . $idsubkhg);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/kawasan/subkhg/' . $idsubkhg);
    //     }
    // }
}
