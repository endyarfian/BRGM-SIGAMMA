<?php

namespace App\Controllers;

use \App\Models\GambDesaModel;
use \App\Models\GambKecModel;
use \App\Models\GambLemdesModel;

class UserGambutLemdes extends BaseController
{
    protected $GambKecModel;
    protected $GambDesaModel;
    protected $GambLemdesModel;
    public function __construct()
    {
        $this->GambKecModel = new GambKecModel();
        $this->GambDesaModel = new GambDesaModel();
        $this->GambLemdesModel = new GambLemdesModel();
    }
    public function index($iddesa)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov,
                        tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
                        tb_kec.id as idkec, tb_kec.kode_kec as kodekec, tb_kec.nama_kec, tb_kec.kode_kabkot,
                        tb_desa.id as iddesa, tb_desa.kode_desa as kodedesa, tb_desa.nama_desa, tb_desa.kode_kec,
                        tb_lemdes.id, tb_lemdes.kode_desa, tb_lemdes.kode_lemdes, tb_lemdes.nama_lemdes, tb_lemdes.jenis_lemdes, tb_lemdes.jumlah_anggota, tb_lemdes.pj, tb_lemdes.tlpn,
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->join('tb_kec', 'tb_kec.kode_kabkot = tb_kabkot.kode_kabkot');
        $data->join('tb_desa', 'tb_desa.kode_kec = tb_kec.kode_kec');
        $data->join('tb_lemdes', 'tb_lemdes.kode_desa = tb_desa.kode_desa');
        $data->where('tb_desa.id', $iddesa);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('tb_prov.kode_prov as kodeprov, tb_prov.id as idprov, tb_prov.nama_prov,
                        tb_kabkot.id as idkabkot, tb_kabkot.kode_kabkot as kodekabkot, tb_kabkot.nama_kabkot,
                        tb_kec.id as idkec, tb_kec.kode_kec as kodekec, tb_kec.nama_kec, tb_kec.kode_kabkot,
                        tb_desa.id as iddesa, tb_desa.kode_desa as kodedesa, tb_desa.nama_desa, tb_desa.kode_kec,
        ');
        $data->join('tb_kabkot', 'tb_kabkot.kode_prov = tb_prov.kode_prov');
        $data->join('tb_kec', 'tb_kec.kode_kabkot = tb_kabkot.kode_kabkot');
        $data->join('tb_desa', 'tb_desa.kode_kec = tb_kec.kode_kec');
        $data->where('tb_desa.id', $iddesa);
        $query2 = $data->get();


        $lemdes = $query->getResultArray();
        $desa2 = $query2->getResultArray();
        // dd($kec2);

        $desa = $this->GambDesaModel->findAll();
        $data = [
            'desa2' => $desa2,
            'lemdes' => $lemdes,
            'desa' => $desa,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-lemdes', $data);
    }
}
