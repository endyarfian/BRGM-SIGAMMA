<?php

namespace App\Controllers;

use \App\Models\GambKabkotModel;
use \App\Models\GambKecModel;

class UserGambutKabkot extends BaseController
{
    protected $GambKabkotModel;
    protected $GambKecModel;
    public function __construct()
    {
        $this->GambKabkotModel = new GambKabkotModel();
        $this->GambKecModel = new GambKecModel();
    }
    public function index($idkabkot)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov, tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
                        tb_kec.id, tb_kec.kode_kec, tb_kec.nama_kec, tb_kec.kode_kabkot
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->join('tb_kec', 'tb_kec.kode_kabkot = tb_kabkot.kode_kabkot');
        $data->where('tb_kabkot.id', $idkabkot);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov, tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->where('tb_kabkot.id', $idkabkot);
        $query2 = $data->get();


        $kec = $query->getResultArray();
        $kabkot2 = $query2->getResultArray();
        // dd($kabkot2);

        $kabkot = $this->GambKabkotModel->findAll();
        $data = [
            'kabkot2' => $kabkot2,
            'kabkot' => $kabkot,
            'kec' => $kec,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-detailkabkot', $data);
    }
}
