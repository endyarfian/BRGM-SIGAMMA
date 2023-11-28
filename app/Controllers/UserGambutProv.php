<?php

namespace App\Controllers;

use \App\Models\GambKabkotModel;
use \App\Models\GambProvModel;

class UserGambutProv extends BaseController
{
    protected $GambKabkotModel;
    protected $GambProvModel;
    public function __construct()
    {
        $this->GambKabkotModel = new GambKabkotModel();
        $this->GambProvModel = new GambProvModel();
    }
    public function index($idprov)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov,tb_prov.nama_prov, tb_kabkot.id, tb_kabkot.kode_kabkot, tb_kabkot.nama_kabkot');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->where('tb_prov.id', $idprov);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov,tb_prov.nama_prov');
        $data->where('tb_prov.id', $idprov);
        $query2 = $data->get();


        $kabkot = $query->getResultArray();
        $prov2 = $query2->getResultArray();
        // dd($kabkot);

        $prov = $this->GambProvModel->findAll();
        $data = [
            'prov' => $prov,
            'prov2' => $prov2,
            'kabkot' => $kabkot,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-detailprov', $data);
    }
}
