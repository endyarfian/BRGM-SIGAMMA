<?php

namespace App\Controllers;

use \App\Models\GambHruModel;
use \App\Models\GambTargetModel;
use \App\Models\GambOutputTargetModel;

class UserGambutSasaranInv extends BaseController
{
    protected $GambTargetModel;
    protected $GambHruModel;
    protected $GambOutputTargetModel;
    public function __construct()
    {
        $this->GambTargetModel = new GambTargetModel();
        $this->GambHruModel = new GambHruModel();
        $this->GambOutputTargetModel = new GambOutputTargetModel();
    }
    public function index($idtarget)
    {

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, 
        tb_target.id as idtarget, tb_target.kode_target, tb_target.volume as volumetarget, tb_target.satuan as satuantarget,,
        tb_output_target.id, tb_output_target.kode_output_target, tb_output_target.kode_hru, tb_output_target.satuan, tb_output_target.volume');
        $data->join('tb_target', 'tb_target.kode_rencana = tb_rencana.kode_rencana');
        $data->join('tb_output_target', 'tb_output_target.kode_target = tb_target.kode_target');
        $data->where('tb_target.id', $idtarget);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul,
        tb_target.id as idtarget, tb_target.kode_target, tb_target.volume as volumetarget, tb_target.satuan as satuantarget,');
        $data->join('tb_target', 'tb_target.kode_rencana = tb_rencana.kode_rencana');
        $data->where('tb_target.id', $idtarget);
        $query2 = $data->get();


        $inv = $query->getResultArray();
        $sasaran2 = $query2->getResultArray();
        // dd($sasaran2);

        $sasaran = $this->GambTargetModel->findAll();
        $hru = $this->GambHruModel->findAll();
        $data = [
            'inv' => $inv,
            'sasaran2' => $sasaran2,
            'sasaran' => $sasaran,
            'hru' => $hru,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-sasaran-inv', $data);
    }
}
