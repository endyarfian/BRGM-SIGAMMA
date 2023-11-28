<?php

namespace App\Controllers;

use \App\Models\GambRencanaModel;

class AdmGambutRencana extends BaseController
{
    protected $GambRencanaModel;
    public function __construct()
    {
        $this->GambRencanaModel = new GambRencanaModel();
    }
    public function index()
    {
        $doc = $this->GambRencanaModel->findAll();
        $data = [
            'doc' => $doc,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-dokumen', $data);
    }

    public function simpan_rencana()
    {
        if (!$this->validate([
            'kodedoc' => [
                'rules' => 'required|is_unique[tb_rencana.kode_rencana]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'tipedoc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'numeric' => 'Data harus berupa angka.',
                ]
            ],
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'berlaku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'berakhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
            'pengesah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/rencana')->withInput()->with('validation', $validation);
        }
        $this->GambRencanaModel->save([
            'kode_rencana' => $this->request->getVar('kodedoc'),
            'tipe_rencana' => $this->request->getVar('tipedoc'),
            'judul' => $this->request->getVar('judul'),
            'tahun' => $this->request->getVar('tahun'),
            'tgl_berlaku' => $this->request->getVar('berlaku'),
            'tgl_berakhir' => $this->request->getVar('berakhir'),
            'pengesah' => $this->request->getVar('pengesah'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/rencana');
    }
    public function edit_rencana($id)
    {
        $primarycode = $this->request->getVar('kodedoc');

        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambRencanaModel->where('kode_rencana', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode dokumen sudah ada dalam database.']);
            return redirect()->to('admin/gambut/rencana');
        }
        $this->GambRencanaModel->save([
            'id' => $id,
            'kode_rencana' => $this->request->getVar('kodedoc'),
            'tipe_rencana' => $this->request->getVar('tipedoc'),
            'judul' => $this->request->getVar('judul'),
            'tahun' => $this->request->getVar('tahun'),
            'tgl_berlaku' => $this->request->getVar('berlaku'),
            'tgl_berakhir' => $this->request->getVar('berakhir'),
            'pengesah' => $this->request->getVar('pengesah'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/rencana');
    }

    public function hapus_rencana($id)
    {
        $this->GambRencanaModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/rencana');
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
    //             if (empty($value[1]) || empty($value[2]) || empty($value[3]) || empty($value[4]) || empty($value[5]) || empty($value[6])) {
    //                 session()->setFlashdata(['info2' => 'error', 'judul2' => 'IMPORT GAGAL 😞', 'pesan2' => 'Data tidak lengkap. Pastikan semua kolom terisi.']);
    //                 return redirect()->to('admin/gambut/rencana');
    //             }

    //             $db = \Config\Database::connect();
    //             $kode_rencana = $value[1];
    //             $exist = $db->table('tb_rencana')->where('kode_rencana', $kode_rencana)->get()->getRowArray();

    //             if ($exist) {
    //                 log_message('error', 'Kode rencana sudah ada di database: ' . $kode_rencana);
    //                 $counter_fail++;
    //                 continue;
    //             }

    //             $data = [
    //                 'kode_rencana' => $value[1],
    //                 'tipe_rencana' => $value[2],
    //                 'judul' => $value[3],
    //                 'tgl_berlaku' => $value[4],
    //                 'tgl_berakhir' => $value[5],
    //                 'pengesah' => $value[6],
    //             ];

    //             if ($this->GambRencanaModel->insert($data)) {
    //                 $counter_success++;
    //             } else {
    //                 log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                 $counter_fail++;
    //             }
    //         }

    //         session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //         return redirect()->to('admin/gambut/rencana');
    //     } else {
    //         session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //         return redirect()->to('admin/gambut/rencana');
    //     }
    // }
}
