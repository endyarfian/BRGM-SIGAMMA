<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function gambutdashboard(): string
    {

        $db = db_connect();

        // Daftar tabel yang ingin Anda hitung
        $tables = [
            'tb_alokasi',
            'tb_desa',
            'tb_hru',
            'tb_kabkot',
            'tb_kec',
            'tb_khg',
            'tb_lemdes',
            'tb_output_target',
            'tb_outcome_target',
            'tb_pelaksana',
            'tb_prov',
            'tb_rencana',
            'tb_rencana_kegiatan',
            'tb_sub_khg',
            'tb_sub_tindakan_restorasi',
            'tb_target',
            'tb_tindakan_restorasi',
        ]; // Gantilah dengan nama tabel sesuai kebutuhan Anda

        // Hitung jumlah data untuk setiap tabel
        $query = null;
        foreach ($tables as $table) {
            if ($query === null) {
                $query = $db->table($table)->select('COUNT(*) as total');
            } else {
                $query->union($db->table($table)->select('COUNT(*) as total'));
            }
        }
        // Eksekusi query
        $result = $query->get()->getResult();
        // Hitung total
        $totaldata = 0;
        foreach ($result as $row) {
            $totaldata += $row->total;
        }

        $db = \Config\Database::connect();
        $data = $db->table('tb_alokasi');
        $data->select('SUM(tb_alokasi.volume) as total_volume');
        $query1 = $data->get();
        $volumeResult = $query1->getRow(); // Menggunakan getRow() karena mengambil satu baris data
        $volume = $volumeResult->total_volume;

        $db = \Config\Database::connect();
        $data = $db->table('tb_target');
        $data->select('SUM(tb_target.volume) as total_volume');
        $query1 = $data->get();
        $volumeResult = $query1->getRow(); // Menggunakan getRow() karena mengambil satu baris data
        $target = $volumeResult->total_volume;

        $db = \Config\Database::connect();
        $data = $db->table('tb_alokasi');
        $data->select('COUNT(tb_alokasi.id) as count_alokasi');
        $query1 = $data->get();
        $count = $query1->getRow(); // Menggunakan getRow() karena mengambil satu baris data
        $countalokasi = $count->count_alokasi;

        // dd($volume);

        $data = [
            'title' => 'SIGAMMA | Dashboard Gambut',
            'totaldata' => $totaldata,
            'volume' => $volume,
            'target' => $target,
            'countalokasi' => $countalokasi,
        ];
        return view('pages/gamb-dashboard', $data);
    }
    public function mangrovedashboard(): string
    {
        $data = [
            'title' => 'SIGAMMA | Dashboard Mangrove'
        ];
        return view('pages/mang-dashboard', $data);
    }
}
