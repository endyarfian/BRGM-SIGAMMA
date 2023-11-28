<?php

namespace App\Controllers;

use \App\Models\GambKhgModel;
use \App\Models\GambSubKhgModel;
use \App\Models\GambProvModel;

class UserGambutKhg extends BaseController
{
    protected $GambKhgModel;
    protected $GambSubKhgModel;
    protected $GambProvModel;
    public function __construct()
    {
        $this->GambKhgModel = new GambKhgModel();
        $this->GambSubKhgModel = new GambSubKhgModel();
        $this->GambProvModel = new GambProvModel();
    }
    public function index($idkhg)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.kode_khg as kodekhg, tb_khg.id as idkhg,tb_khg.nama as namakhg, tb_sub_khg.id, tb_sub_khg.kode_sub_khg, tb_sub_khg.nama_sub_khg, tb_sub_khg.luas, tb_sub_khg.satuan');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg = tb_khg.kode_khg');
        $data->where('tb_khg.id', $idkhg);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.kode_khg as kodekhg, tb_khg.id as idkhg,tb_khg.nama');
        $data->where('tb_khg.id', $idkhg);
        $query2 = $data->get();


        $subkhg = $query->getResultArray();
        $khg2 = $query2->getResultArray();
        // dd($khg2);

        $khg = $this->GambKhgModel->findAll();
        $prov = $this->GambProvModel->findAll();
        $data = [
            'prov' => $prov,
            'khg' => $khg,
            'khg2' => $khg2,
            'subkhg' => $subkhg,
            'title' => 'SIGAMMA | Data Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-detailkhg', $data);
    }
}
