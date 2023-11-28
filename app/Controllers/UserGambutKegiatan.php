<?php

namespace App\Controllers;

use \App\Models\GambRencanaModel;
use \App\Models\GambSubTindakanModel;

class UserGambutKegiatan extends BaseController
{
    protected $GambRencanaModel;
    protected $GambSubTindakanModel;

    public function __construct()
    {
        $this->GambRencanaModel = new GambRencanaModel();
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
        return view('database/user/gamb-kegiatan', $data);
    }
}
