<?php

namespace App\Controllers;

use \App\Models\GambOutputTargetModel;
use \App\Models\GambOutcomeTargetModel;

class UserGambutSasaranClaim extends BaseController
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
        tb_target.id as idtarget, tb_target.kode_target, tb_target.volume as volumetarget, tb_target.satuan as satuantarget, tb_target.deskripsi,
        tb_output_target.id as idtargetinv, tb_output_target.kode_output_target, tb_output_target.kode_hru, tb_output_target.satuan, tb_output_target.volume,
        tb_outcome_target.id, tb_outcome_target.kode_outcome_target, tb_outcome_target.satuan, tb_outcome_target.volume');
        $data->join('tb_target', 'tb_target.kode_rencana = tb_rencana.kode_rencana');
        $data->join('tb_output_target', 'tb_output_target.kode_target = tb_target.kode_target');
        $data->join('tb_outcome_target', 'tb_outcome_target.kode_output_target = tb_outcome_target.kode_output_target');
        $data->where('tb_output_target.id', $idtargetinv);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, 
        tb_target.id as idtarget, tb_target.kode_target, tb_target.volume as volumetarget, tb_target.satuan as satuantarget, tb_target.deskripsi,
        tb_output_target.id as idtargetinv, tb_output_target.kode_output_target, tb_output_target.kode_hru, tb_output_target.satuan, tb_output_target.volume');
        $data->join('tb_target', 'tb_target.kode_rencana = tb_rencana.kode_rencana');
        $data->join('tb_output_target', 'tb_output_target.kode_target = tb_target.kode_target');
        $data->where('tb_output_target.id', $idtargetinv);
        $query2 = $data->get();


        $claim = $query->getResultArray();
        $inv2 = $query2->getResultArray();
        // dd($inv2);

        $inv = $this->GambOutputTargetModel->findAll();
        $data = [
            'claim' => $claim,
            'inv2' => $inv2,
            'inv' => $inv,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-sasaran-clm', $data);
    }
}
