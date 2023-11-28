<?php

namespace App\Controllers;

use \App\Models\GambTindakanModel;
use \App\Models\GambSubTindakanModel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class UserGambutSubTindakan extends BaseController
{
    protected $GambTindakanModel;
    protected $GambSubTindakanModel;
    public function __construct()
    {
        $this->GambTindakanModel = new GambTindakanModel();
        $this->GambSubTindakanModel = new GambSubTindakanModel();
    }
    public function index($idtindakan)
    {

        $db = \Config\Database::connect();
        $data = $db->table('tb_tindakan_restorasi');
        $data->select('
        tb_tindakan_restorasi.id as idtindakan, tb_tindakan_restorasi.kode_tindakan_restorasi as kodetindakan, tb_tindakan_restorasi.nama_tindakan_restorasi as namatindakan,
        tb_sub_tindakan_restorasi.id, tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi, tb_sub_tindakan_restorasi.nama_sub_tindakan_restorasi, 
        tb_sub_tindakan_restorasi.deskripsi');
        $data->join('tb_sub_tindakan_restorasi', 'tb_sub_tindakan_restorasi.kode_tindakan_restorasi = tb_tindakan_restorasi.kode_tindakan_restorasi');
        $data->where('tb_tindakan_restorasi.id', $idtindakan);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_tindakan_restorasi');
        $data->select('
        tb_tindakan_restorasi.id as idtindakan, tb_tindakan_restorasi.kode_tindakan_restorasi as kodetindakan, tb_tindakan_restorasi.nama_tindakan_restorasi as namatindakan');
        $data->where('tb_tindakan_restorasi.id', $idtindakan);
        $query2 = $data->get();


        $subtindakan = $query->getResultArray();
        $tindakan2 = $query2->getResultArray();
        // dd($subtindakan);

        $tindakan = $this->GambTindakanModel->findAll();
        $data = [
            'tindakan' => $tindakan,
            'tindakan2' => $tindakan2,
            'subtindakan' => $subtindakan,
            'title' => 'SIGAMMA | Data Arahan Tindakan Restorasi Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-subtindakan', $data);
    }
}
