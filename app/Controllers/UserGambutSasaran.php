<?php

namespace App\Controllers;

use \App\Models\GambRencanaModel;
use \App\Models\GambTargetModel;

class UserGambutSasaran extends BaseController
{
    protected $GambTargetModel;
    protected $GambRencanaModel;
    public function __construct()
    {
        $this->GambTargetModel = new GambTargetModel();
        $this->GambRencanaModel = new GambRencanaModel();
    }
    public function index($idrencana)
    {

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, tb_target.id, tb_target.kode_target, tb_target.volume, tb_target.satuan, tb_target.deskripsi');
        $data->join('tb_target', 'tb_target.kode_rencana = tb_rencana.kode_rencana');
        $data->where('tb_rencana.id', $idrencana);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul');
        $data->where('tb_rencana.id', $idrencana);
        $query2 = $data->get();


        $sasaran = $query->getResultArray();
        $doc2 = $query2->getResultArray();
        // dd($sasaran);

        $doc = $this->GambRencanaModel->findAll();
        $data = [
            'doc' => $doc,
            'doc2' => $doc2,
            'sasaran' => $sasaran,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-sasaran', $data);
    }
}
