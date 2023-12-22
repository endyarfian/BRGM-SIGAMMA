<?php

namespace App\Controllers;

use \App\Models\GambOutputTargetModel;
use \App\Models\GambOutcomeTargetModel;

class AdmGambutSasaranClaim extends BaseController
{
    protected $GambOutputTargetModel;
    protected $GambOutcomeTargetModel;
    public function __construct()
    {
        $this->GambOutcomeTargetModel = new GambOutcomeTargetModel();
        $this->GambOutputTargetModel = new GambOutputTargetModel();
    }
    public function index($idtargetinv)
    {

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, 
        tb_target.id as idtarget, tb_target.kode_target, tb_target.volume as volumetarget, tb_target.satuan as satuantarget,
        tb_output_target.id as idtargetinv, tb_output_target.kode_output_target as kodeoutputtarget, tb_output_target.kode_hru, tb_output_target.satuan, tb_output_target.volume,
        tb_outcome_target.id, tb_outcome_target.kode_output_target, tb_outcome_target.kode_outcome_target, tb_outcome_target.satuan, tb_outcome_target.volume');
        $data->join('tb_target', 'tb_target.kode_rencana = tb_rencana.kode_rencana');
        $data->join('tb_output_target', 'tb_output_target.kode_target = tb_target.kode_target');
        $data->join('tb_outcome_target', 'tb_outcome_target.kode_output_target = tb_output_target.kode_output_target');
        $data->where('tb_output_target.id', $idtargetinv);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, 
        tb_target.id as idtarget, tb_target.kode_target, tb_target.volume as volumetarget, tb_target.satuan as satuantarget,
        tb_output_target.id as idtargetinv, tb_output_target.kode_output_target, tb_output_target.kode_hru, tb_output_target.satuan, tb_output_target.volume');
        $data->join('tb_target', 'tb_target.kode_rencana = tb_rencana.kode_rencana');
        $data->join('tb_output_target', 'tb_output_target.kode_target = tb_target.kode_target');
        $data->where('tb_output_target.id', $idtargetinv);
        $query2 = $data->get();


        $claim = $query->getResultArray();
        $inv2 = $query2->getResultArray();
        // dd($claim);

        $inv = $this->GambOutputTargetModel->findAll();
        $data = [
            'claim' => $claim,
            'inv2' => $inv2,
            'inv' => $inv,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut [ESTIMASI KLAIM]',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/admin/gamb-sasaran-clm', $data);
    }

    public function simpan_sasaran_claim($idtargetinv)
    {
        if (!$this->validate([
            'kodeoutcometarget' => [
                'rules' => 'required|is_unique[tb_outcome_target.kode_outcome_target]',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'is_unique' => 'Data sudah tercatat dalam database.'
                ]
            ],
            'volume' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Data harus diisi.',
                    'numeric' => 'Data harus berupa angka.',
                ]
            ],
            'satuan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data harus diisi.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/gambut/rencana/sasaran-claim/' . $idtargetinv)->withInput()->with('validation', $validation);
        }
        $this->GambOutcomeTargetModel->save([
            'kode_outcome_target' => $this->request->getVar('kodeoutcometarget'),
            'kode_output_target' => $this->request->getVar('kodeoutputtarget'),
            'satuan' => $this->request->getVar('satuan'),
            'volume' => $this->request->getVar('volume'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data sudah tersimpan. 👍']);
        return redirect()->to('admin/gambut/rencana/sasaran-claim/' . $idtargetinv);
    }
    public function edit_sasaran_claim($idtargetinv, $id)
    {
        $primarycode = $this->request->getVar('kodeoutcometarget');
        $volume = $this->request->getVar('volume');

        // Cek apakah volume adalah numerik
        if (!is_numeric($volume)) {
            // Jika bukan numerik, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Data volume harus berupa angka.']);
            return redirect()->to('admin/gambut/rencana/sasaran-claim/' . $idtargetinv);
        }
        // Cek apakah kodeoutputtarget sudah ada di database dan bukan data yang sedang diedit
        $existingData = $this->GambOutcomeTargetModel->where('kode_outcome_target', $primarycode)
            ->where('id !=', $id)
            ->first();

        if ($existingData) {
            // Jika kodeoutputtarget sudah ada, set flashdata error dan redirect ke halaman edit
            session()->setFlashdata(['info' => 'error', 'judul' => 'GAGAL MENYUNTING DATA', 'pesan' => 'Kode estimasi claim sudah ada dalam database.']);
            return redirect()->to('admin/gambut/rencana/sasaran-claim/' . $idtargetinv);
        }
        $this->GambOutcomeTargetModel->save([
            'id' => $id,
            'kode_outcome_target' => $this->request->getVar('kodeoutcometarget'),
            'kode_output_target' => $this->request->getVar('kodeoutputtarget'),
            'satuan' => $this->request->getVar('satuan'),
            'volume' => $this->request->getVar('volume'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data telah diperbarui. 👍']);
        return redirect()->to('admin/gambut/rencana/sasaran-claim/' . $idtargetinv);
    }

    public function hapus_sasaran_claim($idtargetinv, $id)
    {
        $this->GambOutcomeTargetModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Data sudah terhapus. 😞']);
        return redirect()->to('admin/gambut/rencana/sasaran-claim/' . $idtargetinv);
    }

    //     public function upload($idtargetinv)
    //     {
    //         $file = $this->request->getFile('file_excel');
    //         $ext = strtolower($file->getClientExtension());

    //         if ($ext == 'xlsx' || $ext == 'xls') {
    //             if ($ext == 'xls') {
    //                 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    //             } else {
    //                 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    //             }

    //             $sheet = $reader->load($file);
    //             $var = $sheet->getActiveSheet()->toArray();
    //             $counter_success = 0;
    //             $counter_fail = 0;

    //             foreach ($var as $key => $value) {
    //                 if ($key == 0) {
    //                     continue;
    //                 }

    //                 // Validasi data
    //                 if (empty($value[1]) || empty($value[2]) || empty($value[3]) || empty($value[4])) {
    //                     session()->setFlashdata(['info2' => 'error', 'judul2' => 'IMPORT GAGAL 😞', 'pesan2' => 'Data tidak lengkap. Pastikan semua kolom terisi.']);
    //                     return redirect()->to('admin/gambut/rencana/sasaran-claim/' . $idtargetinv);
    //                 }
    //                 $db = \Config\Database::connect();
    //                 $kode_output_target = $value[2];
    //                 $result = $db->table('tb_output_target')->where('kode_output_target', $kode_output_target)->get()->getRowArray();

    //                 if (!$result) {
    //                     log_message('error', 'Kode target intervensi tidak ditemukan di tabel referensi: ' . $kode_output_target);
    //                     $counter_fail++;
    //                     continue;
    //                 }

    //                 $db = \Config\Database::connect();
    //                 $kode_outcome_target = $value[1];
    //                 $exist = $db->table('tb_outcome_target')->where('kode_outcome_target', $kode_outcome_target)->get()->getRowArray();

    //                 if ($exist) {
    //                     log_message('error', 'Kode target claim sudah ada di database: ' . $kode_outcome_target);
    //                     $counter_fail++;
    //                     continue;
    //                 }

    //                 $data = [
    //                     'kode_outcome_target' => $value[1],
    //                     'kode_output_target' => $value[2],
    //                     'satuan' => $value[3],
    //                     'volume' => $value[4],
    //                 ];

    //                 if ($this->GambOutcomeTargetModel->insert($data)) {
    //                     $counter_success++;
    //                 } else {
    //                     log_message('error', 'Gagal menyimpan data: ' . print_r($data, true));
    //                     $counter_fail++;
    //                 }
    //             }

    //             session()->setFlashdata(['info2' => 'info', 'judul2' => 'REPORT LOG', 'pesan2' => 'Berhasil mengimport ' . $counter_success . ' baris data. Dan ' . $counter_fail . ' baris data gagal diimport.']);
    //             return redirect()->to('admin/gambut/rencana/sasaran-claim/' . $idtargetinv);
    //         } else {
    //             session()->setFlashdata(['info2' => 'error', 'judul2' => 'ERROR UPLOAD 😞', 'pesan2' => 'Ekstensi file tidak didukung. 😞']);
    //             return redirect()->to('admin/gambut/rencana/sasaran-claim/' . $idtargetinv);
    //         }
    //     }
}
