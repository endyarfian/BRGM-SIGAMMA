<?php

namespace App\Controllers;

use \App\Models\GambAlokasiModel;
use \App\Models\GambKegiatanModel;
use \App\Models\GambPelaksanaModel;
use \App\Models\GambDesaModel;
use \App\Models\GambHruModel;
use \App\Models\GambLemdesModel;

class AdmGambutAlokasi extends BaseController
{
    protected $GambAlokasiModel;
    protected $GambKegiatanModel;
    protected $GambPelaksanaModel;
    protected $GambDesaModel;
    protected $GambHruModel;
    protected $GambLemdesModel;
    public function __construct()
    {
        $this->GambAlokasiModel = new GambAlokasiModel();

        $this->GambKegiatanModel = new GambKegiatanModel();
        $this->GambPelaksanaModel = new GambPelaksanaModel();
        $this->GambDesaModel = new GambDesaModel();
        $this->GambHruModel = new GambHruModel();
        $this->GambLemdesModel = new GambLemdesModel();
    }
    public function index($idkegiatan)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, 
        tb_rencana_kegiatan.id as idkegiatan, tb_rencana_kegiatan.kode_rencana_kegiatan as kodekegiatan, tb_rencana_kegiatan.kode_sub_tindakan_restorasi as kodesubtindakan,
        tb_alokasi.id, tb_alokasi.kode_alokasi, tb_alokasi.jenis_alokasi, tb_alokasi.kode_rencana_kegiatan, tb_alokasi.kode_pelaksana, tb_alokasi.kode_desa, tb_alokasi.kode_hru, 
        tb_alokasi.kode_lemdes, tb_alokasi.produk, tb_alokasi.volume, tb_alokasi.satuan, tb_alokasi.pj, tb_alokasi.deskripsi
        ');
        $data->join('tb_rencana_kegiatan', 'tb_rencana_kegiatan.kode_rencana = tb_rencana.kode_rencana');
        $data->join('tb_alokasi', 'tb_alokasi.kode_rencana_kegiatan = tb_rencana_kegiatan.kode_rencana_kegiatan');
        $data->where('tb_rencana_kegiatan.id', $idkegiatan);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, 
        tb_rencana_kegiatan.id as idkegiatan, tb_rencana_kegiatan.kode_rencana_kegiatan as kodekegiatan, tb_rencana_kegiatan.kode_sub_tindakan_restorasi as kodesubtindakan,
        ');
        $data->join('tb_rencana_kegiatan', 'tb_rencana_kegiatan.kode_rencana = tb_rencana.kode_rencana');
        $data->where('tb_rencana_kegiatan.id', $idkegiatan);
        $query2 = $data->get();


        $alokasi = $query->getResultArray();
        $kegiatan2 = $query2->getResultArray();
        // dd($alokasi);

        $kegiatan = $this->GambKegiatanModel->findAll();
        $pelaksana = $this->GambPelaksanaModel->findAll();
        $desa = $this->GambDesaModel->findAll();
        $hru = $this->GambHruModel->findAll();
        $lemdes = $this->GambLemdesModel->findAll();
        $data = [
            'alokasi' => $alokasi,
            'kegiatan2' => $kegiatan2,
            'kegiatan' => $kegiatan,
            'pelaksana' => $pelaksana,
            'desa' => $desa,
            'hru' => $hru,
            'lemdes' => $lemdes,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-rencana', $data);
    }

    public function simpan_alokasi($idkegiatan)
    {
        if (!$this->validate([
            'kodealokasi' => [
                'rules' => 'required|is_unique[tb_alokasi.kode_alokasi]',
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
            'kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'pelaksana' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'desa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'hru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'volume' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Data harus berupa angka.',
                ]
            ],
            'satuan' => [
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
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/rencana/alokasi/' . $idkegiatan)->withInput()->with('validation', $validation);
        }
        $this->GambAlokasiModel->save([
            'kode_alokasi' => $this->request->getVar('kodealokasi'),
            'jenis_alokasi' => $this->request->getVar('jenis'),
            'kode_rencana_kegiatan' => $this->request->getVar('kegiatan'),
            'kode_pelaksana' => $this->request->getVar('pelaksana'),
            'kode_desa' => $this->request->getVar('desa'),
            'kode_hru' => $this->request->getVar('hru'),
            'kode_lemdes' => $this->request->getVar('lemdes'),
            'produk' => $this->request->getVar('produk'),
            'satuan' => $this->request->getVar('satuan'),
            'volume' => $this->request->getVar('volume'),
            'pj' => $this->request->getVar('pj'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/rencana/alokasi/' . $idkegiatan);
    }
    public function edit_alokasi($idkegiatan, $id)
    {
        $primarycode = $this->request->getVar('kodealokasi1');
        $volume = $this->request->getVar('volume1');

        // Cek apakah volume adalah numerik
        if (!is_numeric($volume)) {
            // Jika bukan numerik, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Data volume harus berupa angka.']);
            return redirect()->to('admin/gambut/rencana/alokasi/' . $idkegiatan);
        }
        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambAlokasiModel->where('kode_alokasi', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode sasaran sudah ada dalam database.']);
            return redirect()->to('admin/gambut/rencana/alokasi/' . $idkegiatan);
        }
        $this->GambAlokasiModel->save([
            'id' => $id,
            'kode_alokasi' => $this->request->getVar('kodealokasi1'),
            'jenis_alokasi' => $this->request->getVar('jenis1'),
            'kode_rencana_kegiatan' => $this->request->getVar('kegiatan1'),
            'kode_pelaksana' => $this->request->getVar('pelaksana1'),
            'kode_desa' => $this->request->getVar('desa1'),
            'kode_hru' => $this->request->getVar('hru1'),
            'kode_lemdes' => $this->request->getVar('lemdes1'),
            'produk' => $this->request->getVar('produk1'),
            'satuan' => $this->request->getVar('satuan1'),
            'volume' => $this->request->getVar('volume1'),
            'pj' => $this->request->getVar('pj1'),
            'deskripsi' => $this->request->getVar('deskripsi1'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/rencana/alokasi/' . $idkegiatan);
    }

    public function hapus_alokasi($idkegiatan, $id)
    {
        $this->GambAlokasiModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/rencana/alokasi/' . $idkegiatan);
    }

    // public function upload($idkegiatan)
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
    //             if (
    //                 empty($value[1]) || empty($value[2]) || empty($value[3]) ||
    //                 empty($value[4]) || empty($value[5]) || empty($value[6]) ||
    //                 empty($value[7]) || empty($value[8]) || empty($value[9]) ||
    //                 empty($value[10]) || empty($value[11]) || empty($value[12])
    //             ) {
    //                 session()->setFlashdata(['info2' => 'error', 'judul2' => 'IMPORT GAGAL 😞', 'pesan2' => 'Data tidak lengkap. Pastikan semua kolom terisi.']);
    //                 return redirect()->to('admin/gambut/rencana/alokasi/' . $idkegiatan);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_rencana_kegiatan = $value[3];
    //             $result = $db->table('tb_rencana_kegiatan')->where('kode_rencana_kegiatan', $kode_rencana_kegiatan)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode rencana kegiatan tidak ditemukan di tabel referensi: ' . $kode_rencana_kegiatan);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_pelaksana = $value[4];
    //             $result = $db->table('tb_pelaksana')->where('kode_pelaksana', $kode_pelaksana)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode pelaksana tidak ditemukan di tabel referensi: ' . $kode_pelaksana);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_desa = $value[5];
    //             $result = $db->table('tb_desa')->where('kode_desa', $kode_desa)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode Desa tidak ditemukan di tabel referensi: ' . $kode_desa);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_hru = $value[6];
    //             $result = $db->table('tb_hru')->where('kode_hru', $kode_hru)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode HRU tidak ditemukan di tabel referensi: ' . $kode_hru);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_lemdes = $value[7];
    //             $result = $db->table('tb_lemdes')->where('kode_lemdes', $kode_lemdes)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode lembaga desa tidak ditemukan di tabel referensi: ' . $kode_lemdes);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_alokasi = $value[1];
    //             $exist = $db->table('tb_alokasi')->where('kode_alokasi', $kode_alokasi)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode alokasi rencana kegiatan sudah ada di database: ' . $kode_alokasi);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_alokasi' => $value[1],
    //                 'jenis_alokasi' => $value[2],
    //                 'kode_rencana_kegiatan' => $value[3],
    //                 'kode_pelaksana' => $value[4],
    //                 'kode_desa' => $value[5],
    //                 'kode_hru' => $value[6],
    //                 'kode_lemdes' => $value[7],
    //                 'produk' => $value[8],
    //                 'satuan' => $value[9],
    //                 'volume' => $value[10],
    //                 'pj' => $value[11],
    //                 'deskripsi' => $value[12],
    //             ];

    //             if ($this->GambAlokasiModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/rencana/alokasi/' . $idkegiatan);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/rencana/alokasi/' . $idkegiatan);
    //     }
    // }
}
