<?php

namespace App\Controllers;

use \App\Models\GambRencanaModel;

class UserGambutRencana extends BaseController
{
    protected $GambRencanaModel;
    public function __construct()
    {
        $this->GambRencanaModel = new GambRencanaModel();
    }
    public function index()
    {
        $doc = $this->GambRencanaModel->findAll();
        $data = [
            'doc' => $doc,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-dokumen', $data);
    }
}
