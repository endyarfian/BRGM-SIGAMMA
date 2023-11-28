<?php

namespace App\Controllers;

use \App\Models\GambKhgModel;
use \App\Models\GambSubKhgModel;
use \App\Models\GambProvModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AdmGambutKhg extends BaseController
{
    protected $GambKhgModel;
    protected $GambSubKhgModel;
    protected $GambProvModel;
    public function __construct()
    {
        $this->GambKhgModel = new GambKhgModel();
        $this->GambSubKhgModel = new GambSubKhgModel();
        $this->GambProvModel = new GambProvModel();
    }
    public function index($idkhg)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.kode_khg as kodekhg, tb_khg.id as idkhg,tb_khg.nama as namakhg, tb_sub_khg.id, tb_sub_khg.kode_sub_khg, tb_sub_khg.nama_sub_khg, tb_sub_khg.luas, tb_sub_khg.satuan');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg = tb_khg.kode_khg');
        $data->where('tb_khg.id', $idkhg);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.kode_khg as kodekhg, tb_khg.id as idkhg,tb_khg.nama');
        $data->where('tb_khg.id', $idkhg);
        $query2 = $data->get();


        $subkhg = $query->getResultArray();
        $khg2 = $query2->getResultArray();
        // dd($khg2);

        $khg = $this->GambKhgModel->findAll();
        $prov = $this->GambProvModel->findAll();
        $data = [
            'prov' => $prov,
            'khg' => $khg,
            'khg2' => $khg2,
            'subkhg' => $subkhg,
            'title' => 'SIGAMMA | Data Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-detailkhg', $data);
    }

    public function simpan_subkhg($idkhg)
    {
        if (!$this->validate([
            'kodesubkhg' => [
                'rules' => 'required|is_unique[tb_sub_khg.kode_sub_khg]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'namasubkhg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'satuansubkhg' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'luassubkhg' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Data harus berupa angka.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/kawasan/khg/' . $idkhg)->withInput()->with('validation', $validation);
        }
        $this->GambSubKhgModel->save([
            'kode_khg' => $this->request->getVar('kodekhg'),
            'kode_sub_khg' => $this->request->getVar('kodesubkhg'),
            'nama_sub_khg' => $this->request->getVar('namasubkhg'),
            'luas' => $this->request->getVar('luassubkhg'),
            'satuan' => $this->request->getVar('satuansubkhg'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/kawasan/khg/' . $idkhg);
    }
    public function edit_subkhg($idkhg, $id)
    {
        $primarycode = $this->request->getVar('kodesubkhg');
        $volume = $this->request->getVar('luassubkhg');

        // Cek apakah volume adalah numerik
        if (!is_numeric($volume)) {
            // Jika bukan numerik, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Data luas harus berupa angka.']);
            return redirect()->to('admin/gambut/kawasan/khg/' . $idkhg);
        }
        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambSubKhgModel->where('kode_sub_khg', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode Sub KHG sudah ada dalam database.']);
            return redirect()->to('admin/gambut/kawasan/khg/' . $idkhg);
        }
        $this->GambSubKhgModel->save([
            'id' => $id,
            'kode_khg' => $this->request->getVar('kodekhg'),
            'kode_sub_khg' => $this->request->getVar('kodesubkhg'),
            'nama_sub_khg' => $this->request->getVar('namasubkhg'),
            'luas' => $this->request->getVar('luassubkhg'),
            'satuan' => $this->request->getVar('satuansubkhg'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/kawasan/khg/' . $idkhg);
    }

    public function hapus_subkhg($idkhg, $id)
    {
        $this->GambSubKhgModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/kawasan/khg/' . $idkhg);
    }

    // public function upload($idkhg)
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
    //                 return redirect()->to('admin/gambut/kawasan/khg/' . $idkhg);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_khg = $value[1];
    //             $result = $db->table('tb_khg')->where('kode_khg', $kode_khg)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode KHG tidak ditemukan di tabel referensi: ' . $kode_khg);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_sub_khg = $value[2];
    //             $exist = $db->table('tb_sub_khg')->where('kode_sub_khg', $kode_sub_khg)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode sub KHG sudah ada di database: ' . $kode_sub_khg);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_khg' => $value[1],
    //                 'kode_sub_khg' => $value[2],
    //                 'nama_sub_khg' => $value[3],
    //                 'luas' => $value[4],
    //                 'satuan' => $value[5],
    //             ];

    //             if ($this->GambSubKhgModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/kawasan/khg/' . $idkhg);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/kawasan/khg/' . $idkhg);
    //     }
    // }
}
