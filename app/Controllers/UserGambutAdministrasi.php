<?php

namespace App\Controllers;

use \App\Models\GambProvModel;
use \App\Models\GambKabkotModel;
use \App\Models\GambKecModel;
use \App\Models\GambDesaModel;

class UserGambutAdministrasi extends BaseController
{
    protected $GambProvModel;
    protected $GambKabkotModel;
    protected $GambKecModel;
    protected $GambDesaModel;
    public function __construct()
    {
        $this->GambProvModel = new GambProvModel();
        $this->GambKabkotModel = new GambKabkotModel();
        $this->GambKecModel = new GambKecModel();
        $this->GambDesaModel = new GambDesaModel();
    }
    public function index()
    {
        $prov = $this->GambProvModel->findAll();
        $kabkot = $this->GambKabkotModel->findAll();
        $kec = $this->GambKecModel->findAll();
        $desa = $this->GambDesaModel->findAll();
        $data = [
            'prov' => $prov,
            'kabkot' => $kabkot,
            'kec' => $kec,
            'desa' => $desa,
            'title' => 'SIGAMMA | Data Administrasi Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-administrasi', $data);
    }
}
