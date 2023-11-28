<?php

namespace App\Controllers;

use \App\Models\GambSubKhgModel;
use \App\Models\GambHruModel;

class UserGambutSubKhg extends BaseController
{
    protected $GambSubKhgModel;
    protected $GambHruModel;
    public function __construct()
    {
        $this->GambSubKhgModel = new GambSubKhgModel();
        $this->GambHruModel = new GambHruModel();
    }
    public function index($idsubkhg)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.kode_khg as kodekhg, tb_khg.id as idkhg,tb_khg.nama as namakhg, tb_sub_khg.id as idsubkhg, tb_sub_khg.kode_sub_khg, tb_sub_khg.nama_sub_khg,
        tb_hru.id, tb_hru.kode_hru, tb_hru.nama_hru, tb_hru.luas, tb_hru.satuan');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg = tb_khg.kode_khg');
        $data->join('tb_hru', 'tb_hru.kode_sub_khg = tb_sub_khg.kode_sub_khg');
        $data->where('tb_sub_khg.id', $idsubkhg);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.kode_khg as kodekhg, tb_khg.id as idkhg,tb_khg.nama as namakhg, tb_sub_khg.id as idsubkhg, tb_sub_khg.kode_sub_khg as kodesubkhg, tb_sub_khg.nama_sub_khg as namasubkhg');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg = tb_khg.kode_khg');
        $data->where('tb_sub_khg.id', $idsubkhg);
        $query2 = $data->get();


        $hru = $query->getResultArray();
        $subkhg2 = $query2->getResultArray();
        // dd($hru);

        $subkhg = $this->GambSubKhgModel->findAll();
        $data = [
            'subkhg' => $subkhg,
            'subkhg2' => $subkhg2,
            'hru' => $hru,
            'title' => 'SIGAMMA | Data Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-detailsubkhg', $data);
    }
}
