<?php

namespace App\Controllers;

use \App\Models\GambDesaModel;
use \App\Models\GambKecModel;

class UserGambutKec extends BaseController
{
    protected $GambKecModel;
    protected $GambDesaModel;
    public function __construct()
    {
        $this->GambKecModel = new GambKecModel();
        $this->GambDesaModel = new GambDesaModel();
    }
    public function index($idkec)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov,
                        tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
                        tb_kec.id as idkec, tb_kec.kode_kec as kodekec, tb_kec.nama_kec, tb_kec.kode_kabkot,
                        tb_desa.id, tb_desa.kode_desa, tb_desa.nama_desa, tb_desa.kode_kec,
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->join('tb_kec', 'tb_kec.kode_kabkot = tb_kabkot.kode_kabkot');
        $data->join('tb_desa', 'tb_desa.kode_kec = tb_kec.kode_kec');
        $data->where('tb_kec.id', $idkec);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov,
                        tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
                        tb_kec.id as idkec, tb_kec.kode_kec as kodekec, tb_kec.nama_kec, tb_kec.kode_kabkot
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->join('tb_kec', 'tb_kec.kode_kabkot = tb_kabkot.kode_kabkot');
        $data->where('tb_kec.id', $idkec);
        $query2 = $data->get();


        $desa = $query->getResultArray();
        $kec2 = $query2->getResultArray();
        // dd($kec2);

        $kec = $this->GambKecModel->findAll();
        $data = [
            'kec2' => $kec2,
            'kec' => $kec,
            'desa' => $desa,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-detailkec', $data);
    }
}
