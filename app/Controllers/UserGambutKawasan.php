<?php

namespace App\Controllers;

use \App\Models\GambKhgModel;
use \App\Models\GambSubKhgModel;
use \App\Models\GambHruModel;
use \App\Models\GambProvModel;

class UserGambutKawasan extends BaseController
{
    protected $GambKhgModel;
    protected $GambSubKhgModel;
    protected $GambHruModel;
    protected $GambProvModel;
    public function __construct()
    {
        $this->GambKhgModel = new GambKhgModel();
        $this->GambSubKhgModel = new GambSubKhgModel();
        $this->GambHruModel = new GambHruModel();
        $this->GambProvModel = new GambProvModel();
    }
    public function index()
    {
        $khg = $this->GambKhgModel->findAll();
        $subkhg = $this->GambSubKhgModel->findAll();
        $hru = $this->GambHruModel->findAll();
        $prov = $this->GambProvModel->findAll();
        $data = [
            'prov' => $prov,
            'khg' => $khg,
            'subkhg' => $subkhg,
            'hru' => $hru,
            'title' => 'SIGAMMA | Data Kawasan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-kawasan', $data);
    }
}
