<?php

namespace App\Controllers;

use \App\Models\GambKabkotModel;
use \App\Models\GambProvModel;
use \App\Models\GambPelaksanaModel;

class UserGambutPelaksana extends BaseController
{
    protected $GambKabkotModel;
    protected $GambProvModel;
    protected $GambPelaksanaModel;
    public function __construct()
    {
        $this->GambKabkotModel = new GambKabkotModel();
        $this->GambProvModel = new GambProvModel();
        $this->GambPelaksanaModel = new GambPelaksanaModel();
    }
    public function index($idprov)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov,tb_prov.nama_prov, tb_pelaksana.id, tb_pelaksana.kode_pelaksana, tb_pelaksana.nama, tb_pelaksana.jenis, tb_pelaksana.pj, tb_pelaksana.tlpn, tb_pelaksana.alamat, tb_pelaksana.kode_prov');
        $data->join('tb_pelaksana', 'tb_pelaksana.kode_prov = tb_prov.kode_prov');
        $data->where('tb_prov.id', $idprov);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov,tb_prov.nama_prov');
        $data->where('tb_prov.id', $idprov);
        $query2 = $data->get();


        $pelaksana = $query->getResultArray();
        $prov2 = $query2->getResultArray();
        // dd($pelaksana);

        $prov = $this->GambProvModel->findAll();
        $data = [
            'prov' => $prov,
            'prov2' => $prov2,
            'pelaksana' => $pelaksana,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-pelaksana', $data);
    }
}
