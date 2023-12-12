<?php

namespace App\Controllers;

class DataGrafik extends BaseController
{

    public function grafikgambut()
    {
        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('
            tb_prov.kode_prov as kodeprov, tb_prov.nama_prov, 
            COUNT(DISTINCT tb_khg.id) as total_khg,
            COUNT(DISTINCT tb_sub_khg.id) as total_sub_khg,
            COUNT(DISTINCT tb_hru.id) as total_hru
        ');
        $data->join('tb_khg', 'tb_khg.kode_prov = tb_prov.kode_prov', 'left');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg = tb_khg.kode_khg', 'left');
        $data->join('tb_hru', 'tb_hru.kode_sub_khg = tb_sub_khg.kode_sub_khg', 'left');
        $data->groupBy('tb_prov.kode_prov, tb_prov.nama_prov');
        $query = $data->get();

        $kawasan = $query->getResultArray();

        $kodeprov = array_column($kawasan, 'nama_prov');
        $khg = array_column($kawasan, 'total_khg');
        $subkhg = array_column($kawasan, 'total_sub_khg');
        $hru = array_column($kawasan, 'total_hru');
        // dd($kodeprov);
        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('SUM(luas) as total_luas');
        $query = $data->get();

        // Mengambil hasil dari query
        $result = $query->getRowArray();

        // Jumlah total luas
        $totalluas = $result['total_luas'];

        $db = \Config\Database::connect();
        $data = $db->table('tb_prov');
        $data->select('
            tb_prov.kode_prov as kodeprov, tb_prov.nama_prov, 
            SUM(tb_khg.luas) as total_khg_luas
        ');
        $data->join('tb_khg', 'tb_khg.kode_prov = tb_prov.kode_prov', 'left');
        $data->groupBy('tb_prov.kode_prov, tb_prov.nama_prov');
        $query = $data->get();

        $kawasan1 = $query->getResultArray();

        $data_luasan = [
            'data' => []
        ];
        foreach ($kawasan1 as $row) {
            $data_luasan['data'][] = [
                'x' => $row['nama_prov'],
                'y' => floatval($row['total_khg_luas'])
            ];
        }

        // stacked bar

        $db = \Config\Database::connect();
        // Dapatkan semua data provinsi
        $categoriesQuery = $db->table('tb_prov')
            ->select('kode_prov, nama_prov')
            ->get();
        $categories = $categoriesQuery->getResultArray();

        // Inisialisasi data series
        $series = [
            'Kabupaten/Kota' => [],
            'Kecamatan' => [],
            'Desa' => []
        ];

        // Untuk setiap kategori provinsi
        foreach ($categories as $category) {
            // Dapatkan kode_prov untuk provinsi saat ini
            $kode_prov = $category['kode_prov'];

            // Query untuk mendapatkan jumlah data di tb_kabkot
            $kabkotQuery = $db->table('tb_kabkot')
                ->select('COUNT(*) as jumlah')
                ->where('kode_prov', $kode_prov)
                ->get();
            $kabkot = $kabkotQuery->getRowArray()['jumlah'];

            // Query untuk mendapatkan jumlah data di tb_kec
            $kecQuery = $db->table('tb_kec')
                ->select('COUNT(*) as jumlah')
                ->join('tb_kabkot', 'tb_kabkot.kode_kabkot = tb_kec.kode_kabkot', 'left')
                ->join('tb_prov', 'tb_prov.kode_prov = tb_kabkot.kode_prov', 'left')
                ->where('tb_prov.kode_prov', $kode_prov)
                ->get();
            $kec = $kecQuery->getRowArray()['jumlah'];

            // Query untuk mendapatkan jumlah data di tb_desa
            $desaQuery = $db->table('tb_desa')
                ->select('COUNT(*) as jumlah')
                ->join('tb_kec', 'tb_kec.kode_kec = tb_desa.kode_kec', 'left')
                ->join('tb_kabkot', 'tb_kabkot.kode_kabkot = tb_kec.kode_kabkot', 'left')
                ->join('tb_prov', 'tb_prov.kode_prov = tb_kabkot.kode_prov', 'left')
                ->where('tb_prov.kode_prov', $kode_prov)
                ->get();
            $desa = $desaQuery->getRowArray()['jumlah'];

            // Simpan hasil query ke dalam data series
            $series['Kabupaten/Kota'][] = $kabkot;
            $series['Kecamatan'][] = $kec;
            $series['Desa'][] = $desa;
        }

        $data = [
            'data_luasan' => $data_luasan,
            'kodeprov' => $kodeprov,
            'khg' => $khg,
            'subkhg' => $subkhg,
            'hru' => $hru,
            'totalluas' => $totalluas,
            'stackbarkategori' => array_column($categories, 'nama_prov'),
            'stackbarseri' => [
                [
                    'name' => 'Kabupaten/Kota',
                    'data' => $series['Kabupaten/Kota']
                ],
                [
                    'name' => 'Kecamatan',
                    'data' => $series['Kecamatan']
                ],
                [
                    'name' => 'Desa',
                    'data' => $series['Desa']
                ]
            ]
        ];
        return $this->response->setJSON($data);
    }
}
