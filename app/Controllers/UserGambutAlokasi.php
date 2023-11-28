<?php

namespace App\Controllers;

use \App\Models\GambAlokasiModel;
use \App\Models\GambKegiatanModel;
use \App\Models\GambPelaksanaModel;
use \App\Models\GambDesaModel;
use \App\Models\GambHruModel;
use \App\Models\GambLemdesModel;

class UserGambutAlokasi extends BaseController
{
    protected $GambAlokasiModel;
    protected $GambKegiatanModel;
    protected $GambPelaksanaModel;
    protected $GambDesaModel;
    protected $GambHruModel;
    protected $GambLemdesModel;
    public function __construct()
    {
        $this->GambAlokasiModel = new GambAlokasiModel();

        $this->GambKegiatanModel = new GambKegiatanModel();
        $this->GambPelaksanaModel = new GambPelaksanaModel();
        $this->GambDesaModel = new GambDesaModel();
        $this->GambHruModel = new GambHruModel();
        $this->GambLemdesModel = new GambLemdesModel();
    }
    public function index($idkegiatan)
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, 
        tb_rencana_kegiatan.id as idkegiatan, tb_rencana_kegiatan.kode_rencana_kegiatan as kodekegiatan, tb_rencana_kegiatan.kode_sub_tindakan_restorasi as kodesubtindakan,
        tb_alokasi.id, tb_alokasi.kode_alokasi, tb_alokasi.jenis_alokasi, tb_alokasi.kode_rencana_kegiatan, tb_alokasi.kode_pelaksana, tb_alokasi.kode_desa, tb_alokasi.kode_hru, 
        tb_alokasi.kode_lemdes, tb_alokasi.produk, tb_alokasi.volume, tb_alokasi.satuan, tb_alokasi.pj, tb_alokasi.deskripsi
        ');
        $data->join('tb_rencana_kegiatan', 'tb_rencana_kegiatan.kode_rencana = tb_rencana.kode_rencana');
        $data->join('tb_alokasi', 'tb_alokasi.kode_rencana_kegiatan = tb_rencana_kegiatan.kode_rencana_kegiatan');
        $data->where('tb_rencana_kegiatan.id', $idkegiatan);
        $query = $data->get();

        $db = \Config\Database::connect();
        $data = $db->table('tb_rencana');
        $data->select('tb_rencana.kode_rencana as koderencana, tb_rencana.id as idrencana,tb_rencana.judul, 
        tb_rencana_kegiatan.id as idkegiatan, tb_rencana_kegiatan.kode_rencana_kegiatan as kodekegiatan, tb_rencana_kegiatan.kode_sub_tindakan_restorasi as kodesubtindakan,
        ');
        $data->join('tb_rencana_kegiatan', 'tb_rencana_kegiatan.kode_rencana = tb_rencana.kode_rencana');
        $data->where('tb_rencana_kegiatan.id', $idkegiatan);
        $query2 = $data->get();


        $alokasi = $query->getResultArray();
        $kegiatan2 = $query2->getResultArray();
        // dd($alokasi);

        $kegiatan = $this->GambKegiatanModel->findAll();
        $pelaksana = $this->GambPelaksanaModel->findAll();
        $desa = $this->GambDesaModel->findAll();
        $hru = $this->GambHruModel->findAll();
        $lemdes = $this->GambLemdesModel->findAll();
        $data = [
            'alokasi' => $alokasi,
            'kegiatan2' => $kegiatan2,
            'kegiatan' => $kegiatan,
            'pelaksana' => $pelaksana,
            'desa' => $desa,
            'hru' => $hru,
            'lemdes' => $lemdes,
            'title' => 'SIGAMMA | Data Rencana Kegiatan Gambut',
            'validation' => \Config\Services::validation(),
        ];
        return view('database/user/gamb-rencana', $data);
    }
}
