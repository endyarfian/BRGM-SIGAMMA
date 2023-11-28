<?php

namespace App\Controllers;

use \App\Models\GambDesaModel;
use \App\Models\GambKecModel;
use \App\Models\GambLemdesModel;

class AdmGambutLemdes extends BaseController
{
    protected $GambKecModel;
    protected $GambDesaModel;
    protected $GambLemdesModel;
    public function __construct()
    {
        $this->GambKecModel = new GambKecModel();
        $this->GambDesaModel = new GambDesaModel();
        $this->GambLemdesModel = new GambLemdesModel();
    }
    public function index($iddesa)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov,
                        tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
                        tb_kec.id as idkec, tb_kec.kode_kec as kodekec, tb_kec.nama_kec, tb_kec.kode_kabkot,
                        tb_desa.id as iddesa, tb_desa.kode_desa as kodedesa, tb_desa.nama_desa, tb_desa.kode_kec,
                        tb_lemdes.id, tb_lemdes.kode_desa, tb_lemdes.kode_lemdes, tb_lemdes.nama_lemdes, tb_lemdes.jenis_lemdes, tb_lemdes.jumlah_anggota, tb_lemdes.pj, tb_lemdes.tlpn,
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->join('tb_kec', 'tb_kec.kode_kabkot = tb_kabkot.kode_kabkot');
        $data->join('tb_desa', 'tb_desa.kode_kec = tb_kec.kode_kec');
        $data->join('tb_lemdes', 'tb_lemdes.kode_desa = tb_desa.kode_desa');
        $data->where('tb_desa.id', $iddesa);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov,
                        tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
                        tb_kec.id as idkec, tb_kec.kode_kec as kodekec, tb_kec.nama_kec, tb_kec.kode_kabkot,
                        tb_desa.id as iddesa, tb_desa.kode_desa as kodedesa, tb_desa.nama_desa, tb_desa.kode_kec,
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->join('tb_kec', 'tb_kec.kode_kabkot = tb_kabkot.kode_kabkot');
        $data->join('tb_desa', 'tb_desa.kode_kec = tb_kec.kode_kec');
        $data->where('tb_desa.id', $iddesa);
        $query2 = $data->get();


        $lemdes = $query->getResultArray();
        $desa2 = $query2->getResultArray();
        // dd($kec2);

        $desa = $this->GambDesaModel->findAll();
        $data = [
            'desa2' => $desa2,
            'lemdes' => $lemdes,
            'desa' => $desa,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-lemdes', $data);
    }

    public function simpan_lemdes($iddesa)
    {

        if (!$this->validate([
            'kodelemdes' => [
                'rules' => 'required|is_unique[tb_lemdes.kode_lemdes]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'namalemdes' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'jumlahlemdes' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Data harus berupa angka.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/administrasi/lemdes/' . $iddesa)->withInput()->with('validation', $validation);
        }
        $this->GambLemdesModel->save([
            'kode_desa' => $this->request->getVar('kodedesa'),
            'kode_lemdes' => $this->request->getVar('kodelemdes'),
            'nama_lemdes' => $this->request->getVar('namalemdes'),
            'jenis_lemdes' => $this->request->getVar('jenislemdes'),
            'jumlah_anggota' => $this->request->getVar('jumlahlemdes'),
            'pj' => $this->request->getVar('pjlemdes'),
            'tlpn' => $this->request->getVar('tlpnlemdes'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/administrasi/lemdes/' . $iddesa);
    }

    public function edit_lemdes($iddesa, $id)
    {
        $primarycode = $this->request->getVar('kodelemdes');

        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambLemdesModel->where('kode_lemdes', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode desa sudah ada dalam database.']);
            return redirect()->to('admin/gambut/administrasi/lemdes/' . $iddesa);
        }
        $this->GambLemdesModel->save([
            'id' => $id,
            'kode_desa' => $this->request->getVar('kodedesa1'),
            'kode_lemdes' => $this->request->getVar('kodelemdes'),
            'nama_lemdes' => $this->request->getVar('namalemdes'),
            'jenis_lemdes' => $this->request->getVar('jenislemdes'),
            'jumlah_anggota' => $this->request->getVar('jumlahlemdes'),
            'pj' => $this->request->getVar('pjlemdes'),
            'tlpn' => $this->request->getVar('tlpnlemdes'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/administrasi/lemdes/' . $iddesa);
    }

    public function hapus_lemdes($iddesa, $id)
    {
        $this->GambLemdesModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/administrasi/lemdes/' . $iddesa);
    }

    // public function upload($iddesa)
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
    //                 return redirect()->to('admin/gambut/administrasi/lemdes/' . $iddesa);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_desa = $value[1];
    //             $result = $db->table('tb_desa')->where('kode_desa', $kode_desa)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode kecamatan tidak ditemukan di tabel referensi: ' . $kode_desa);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_desa' => $value[1],
    //                 'kode_lemdes' => $value[2],
    //                 'nama_lemdes' => $value[3],
    //                 'jenis_lemdes' => $value[4],
    //                 'jumlah_anggota' => $value[5],
    //                 'pj' => $value[6],
    //                 'tlpn' => $value[7],
    //             ];

    //             if ($this->GambLemdesModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/administrasi/lemdes/' . $iddesa);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/administrasi/lemdes/' . $iddesa);
    //     }
    // }
}
