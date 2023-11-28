<?php

namespace App\Controllers;

use \App\Models\GambRencanaModel;
use \App\Models\GambKegiatanModel;
use \App\Models\GambSubTindakanModel;

class AdmGambutKegiatan extends BaseController
{
    protected $GambRencanaModel;
    protected $GambKegiatanModel;
    protected $GambSubTindakanModel;
    public function __construct()
    {
        $this->GambRencanaModel = new GambRencanaModel();
        $this->GambKegiatanModel = new GambKegiatanModel();
        $this->GambSubTindakanModel = new GambSubTindakanModel();
    }
    public function index($idrencana)
    {

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, 
                    tb_rencana_kegiatan.id, tb_rencana_kegiatan.kode_rencana, tb_rencana_kegiatan.kode_sub_tindakan_restorasi, tb_rencana_kegiatan.kode_rencana_kegiatan
                    ');
        $data->join('tb_rencana_kegiatan', 'tb_rencana_kegiatan.kode_rencana = tb_rencana.kode_rencana');
        $data->where('tb_rencana.id', $idrencana);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul,');
        $data->where('tb_rencana.id', $idrencana);
        $query2 = $data->get();

        $kegiatan = $query->getResultArray();
        $doc2 = $query2->getResultArray();
        // dd($kegiatan);

        $doc = $this->GambRencanaModel->findAll();
        $subtindakan = $this->GambSubTindakanModel->findAll();
        $data = [
            'doc' => $doc,
            'doc2' => $doc2,
            'kegiatan' => $kegiatan,
            'subtindakan' => $subtindakan,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-kegiatan', $data);
    }

    public function simpan_kegiatan($idrencana)
    {
        if (!$this->validate([
            'kodekegiatan' => [
                'rules' => 'required|is_unique[tb_rencana_kegiatan.kode_rencana_kegiatan]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/rencana/kegiatan/' .  $idrencana)->withInput()->with('validation', $validation);
        }
        $this->GambKegiatanModel->save([
            'kode_rencana' => $this->request->getVar('koderencana'),
            'kode_sub_tindakan_restorasi' => $this->request->getVar('kodesubtindakan'),
            'kode_rencana_kegiatan' => $this->request->getVar('kodekegiatan'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/rencana/kegiatan/' .  $idrencana);
    }
    public function edit_kegiatan($idrencana, $id)
    {
        $this->GambKegiatanModel->save([
            'id' => $id,
            'kode_rencana' => $this->request->getVar('koderencana'),
            'kode_sub_tindakan_restorasi' => $this->request->getVar('kodesubtindakan'),
            'kode_rencana_kegiatan' => $this->request->getVar('kodekegiatan'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/rencana/kegiatan/' .  $idrencana);
    }

    public function hapus_kegiatan($idrencana, $id)
    {
        $this->GambKegiatanModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/rencana/kegiatan/' .  $idrencana);
    }

    // public function upload($idrencana)
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
    //                 return redirect()->to('admin/gambut/rencana/kegiatan/' .  $idrencana);
    //             }
    //             $db = \Config\Database::connect();
    //             $kode_rencana = $value[1];
    //             $result = $db->table('tb_rencana')->where('kode_rencana', $kode_rencana)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode dokumen tidak ditemukan di tabel referensi: ' . $kode_rencana);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_sub_tindakan_restorasi = $value[2];
    //             $result = $db->table('tb_sub_tindakan_restorasi')->where('kode_sub_tindakan_restorasi', $kode_sub_tindakan_restorasi)->get()->getRowArray();

    //             if (!$result) {
    //                 log_message('error', 'Kode sub tindakan restorasi tidak ditemukan di tabel referensi: ' . $kode_sub_tindakan_restorasi);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_rencana_kegiatan = $value[3];
    //             $exist = $db->table('tb_rencana_kegiatan')->where('kode_rencana_kegiatan', $kode_rencana_kegiatan)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode rencana kegiatan sudah ada di database: ' . $kode_rencana_kegiatan);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_rencana' => $value[1],
    //                 'kode_sub_tindakan_restorasi' => $value[2],
    //                 'kode_rencana_kegiatan' => $value[3],
    //             ];

    //             if ($this->GambKegiatanModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/rencana/kegiatan/' .  $idrencana);
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/rencana/kegiatan/' .  $idrencana);
    //     }
    // }
}
