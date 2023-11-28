<?php

namespace App\Controllers;

use \App\Models\GambTindakanModel;

class UserGambutTindakan extends BaseController
{
    protected $GambTindakanModel;
    public function __construct()
    {
        $this->GambTindakanModel = new GambTindakanModel();
    }
    public function index()
    {

        $tindakan = $this->GambTindakanModel->findAll();
        $data = [
            'tindakan' => $tindakan,
            'title' => 'SIGAMMA | Data Arahan Tindakan Restorasi Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-tindakan', $data);
    }
}
