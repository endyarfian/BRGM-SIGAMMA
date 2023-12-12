<?php

namespace App\Controllers;

class DetailPetaGambut extends BaseController
{
    public function index($idkhg)
    {

        $model = new \App\Models\GambKhgModel();

        $file = file_get_contents("./dashboard/mapdata/khg.geojson");
        $file = json_decode($file);

        $features = $file->features;

        foreach ($features as $index => $feature) {
            $kodekhg = $feature->properties->KODE_KHG;
            $data = $model->where('kode_khg', $kodekhg)->first();

            if ($data) {
                $features[$index]->properties->id = $data['id'];
                // $features[$index]->properties->luas = $data['luas'];
                // $features[$index]->properties->luasht = $data['luas_ht'];
                // $features[$index]->properties->persentase = $data['persentase'];
            }
        }

        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.id as idkhg, tb_khg.kode_khg as kodekhg, tb_khg.nama, tb_khg.luas
        ');
        $data->where('tb_khg.id', $idkhg);
        $query = $data->get();
        $allkhg = $query->getRowArray(); //data khg

        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.id as idkhg, tb_khg.kode_khg as kodekhg, 
        tb_sub_khg.id as idsubkhg, tb_sub_khg.kode_sub_khg as kodesubkhg,
        ');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg  = tb_khg.kode_khg');
        $data->where('tb_khg.id', $idkhg);
        $data->where('tb_sub_khg.tipe', 'SUB-KHG');
        $query = $data->get();
        $datasubkhg = $query->getResultArray();
        $countsubkhg = count($datasubkhg); //data hru

        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_khg.id as idkhg, tb_khg.kode_khg as kodekhg, 
        tb_sub_khg.id as idsubkhg, tb_sub_khg.kode_sub_khg as kodesubkhg,
        tb_hru.id as idhru, tb_hru.kode_hru as kodehru,
        ');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg  = tb_khg.kode_khg');
        $data->join('tb_hru', 'tb_hru.kode_sub_khg  = tb_sub_khg.kode_sub_khg');
        $data->where('tb_khg.id', $idkhg);
        $data->where('tb_hru.tipe', 'HRU');
        $query = $data->get();
        $datahru = $query->getResultArray();
        $counthru = count($datahru); //data hru
        // dd($countsubkhg);

        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_rencana.tahun, SUM(tb_target.volume) as total_volume');
        $data->join('tb_target', 'tb_target.kode_khg  = tb_khg.kode_khg');
        $data->join('tb_rencana', 'tb_rencana.kode_rencana  = tb_target.kode_rencana');
        $data->groupBy('tb_rencana.tahun');
        $data->where('tb_khg.id', $idkhg);
        $query = $data->get();
        $categories = $query->getResultArray();
        $series['tahun'] = []; // Inisialisasi $series['tahun']

        foreach ($categories as $category) {
            $tahun = $category['tahun'];

            $queryTarget = $db->table('tb_khg')
                ->select('SUM(tb_target.volume) as total_volume')
                ->join('tb_target', 'tb_target.kode_khg  = tb_khg.kode_khg', 'left')
                ->join('tb_rencana', 'tb_rencana.kode_rencana  = tb_target.kode_rencana', 'left')
                ->groupBy('tb_rencana.tahun')
                ->where('tb_khg.id', $idkhg)
                ->where('tb_rencana.tahun', $tahun)
                ->get();
            $target = $queryTarget->getRowArray()['total_volume'];
            $series['tahun'][] = $target;
        }
        // data R1
        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_rencana.tahun, tb_tindakan_restorasi.kode_tindakan_restorasi, tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi, tb_sub_tindakan_restorasi.nama_sub_tindakan_restorasi, SUM(tb_alokasi.volume) as countalokasi');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg  = tb_khg.kode_khg');
        $data->join('tb_hru', 'tb_hru.kode_sub_khg  = tb_sub_khg.kode_sub_khg');
        $data->join('tb_alokasi', 'tb_alokasi.kode_hru  = tb_hru.kode_hru');
        $data->join('tb_rencana_kegiatan', 'tb_rencana_kegiatan.kode_rencana_kegiatan  = tb_alokasi.kode_rencana_kegiatan');
        $data->join('tb_rencana', 'tb_rencana.kode_rencana  = tb_rencana_kegiatan.kode_rencana');
        $data->join('tb_sub_tindakan_restorasi', 'tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi  = tb_rencana_kegiatan.kode_sub_tindakan_restorasi');
        $data->join('tb_tindakan_restorasi', 'tb_tindakan_restorasi.kode_tindakan_restorasi  = tb_sub_tindakan_restorasi.kode_tindakan_restorasi');
        $data->groupBy('tb_rencana.tahun, tb_tindakan_restorasi.kode_tindakan_restorasi, tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi, tb_sub_tindakan_restorasi.nama_sub_tindakan_restorasi');
        $data->where('tb_khg.id', $idkhg);
        $data->where('tb_tindakan_restorasi.kode_tindakan_restorasi', 'R1');

        $query = $data->get();
        $dataR1 = $query->getResultArray();
        $chartDataR1 = [
            'series' => [],
            'labels' => [],
        ];

        foreach ($dataR1 as $row) {
            $subTindakan = $row['nama_sub_tindakan_restorasi'];
            $chartDataR1['series'][] = [
                'name' => $subTindakan,
                'data' => [$row['countalokasi']],
            ];

            if (!in_array($row['tahun'], $chartDataR1['labels'])) {
                $chartDataR1['labels'][] = $row['tahun'];
            }
        }
        $R1JSON = json_encode($chartDataR1);
        // data R2
        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_rencana.tahun, tb_tindakan_restorasi.kode_tindakan_restorasi, tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi, tb_sub_tindakan_restorasi.nama_sub_tindakan_restorasi, SUM(tb_alokasi.volume) as countalokasi');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg  = tb_khg.kode_khg');
        $data->join('tb_hru', 'tb_hru.kode_sub_khg  = tb_sub_khg.kode_sub_khg');
        $data->join('tb_alokasi', 'tb_alokasi.kode_hru  = tb_hru.kode_hru');
        $data->join('tb_rencana_kegiatan', 'tb_rencana_kegiatan.kode_rencana_kegiatan  = tb_alokasi.kode_rencana_kegiatan');
        $data->join('tb_rencana', 'tb_rencana.kode_rencana  = tb_rencana_kegiatan.kode_rencana');
        $data->join('tb_sub_tindakan_restorasi', 'tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi  = tb_rencana_kegiatan.kode_sub_tindakan_restorasi');
        $data->join('tb_tindakan_restorasi', 'tb_tindakan_restorasi.kode_tindakan_restorasi  = tb_sub_tindakan_restorasi.kode_tindakan_restorasi');
        $data->groupBy('tb_rencana.tahun, tb_tindakan_restorasi.kode_tindakan_restorasi, tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi, tb_sub_tindakan_restorasi.nama_sub_tindakan_restorasi');
        $data->where('tb_khg.id', $idkhg);
        $data->where('tb_tindakan_restorasi.kode_tindakan_restorasi', 'R2');

        $query = $data->get();
        $dataR2 = $query->getResultArray();
        $chartDataR2 = [
            'series' => [],
            'labels' => [],
        ];

        foreach ($dataR2 as $row) {
            $subTindakan = $row['nama_sub_tindakan_restorasi'];
            $chartDataR2['series'][] = [
                'name' => $subTindakan,
                'data' => [$row['countalokasi']],
            ];

            if (!in_array($row['tahun'], $chartDataR2['labels'])) {
                $chartDataR2['labels'][] = $row['tahun'];
            }
        }
        $R2JSON = json_encode($chartDataR2);
        // data R3
        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_rencana.tahun, tb_tindakan_restorasi.kode_tindakan_restorasi, tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi, tb_sub_tindakan_restorasi.nama_sub_tindakan_restorasi, SUM(tb_alokasi.volume) as sumalokasi');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg  = tb_khg.kode_khg');
        $data->join('tb_hru', 'tb_hru.kode_sub_khg  = tb_sub_khg.kode_sub_khg');
        $data->join('tb_alokasi', 'tb_alokasi.kode_hru  = tb_hru.kode_hru');
        $data->join('tb_rencana_kegiatan', 'tb_rencana_kegiatan.kode_rencana_kegiatan  = tb_alokasi.kode_rencana_kegiatan');
        $data->join('tb_rencana', 'tb_rencana.kode_rencana  = tb_rencana_kegiatan.kode_rencana');
        $data->join('tb_sub_tindakan_restorasi', 'tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi  = tb_rencana_kegiatan.kode_sub_tindakan_restorasi');
        $data->join('tb_tindakan_restorasi', 'tb_tindakan_restorasi.kode_tindakan_restorasi  = tb_sub_tindakan_restorasi.kode_tindakan_restorasi');
        $data->groupBy('tb_rencana.tahun, tb_tindakan_restorasi.kode_tindakan_restorasi, tb_sub_tindakan_restorasi.kode_sub_tindakan_restorasi, tb_sub_tindakan_restorasi.nama_sub_tindakan_restorasi');
        $data->where('tb_khg.id', $idkhg);
        $data->where('tb_tindakan_restorasi.kode_tindakan_restorasi', 'R3');

        $query = $data->get();
        $dataR3 = $query->getResultArray();
        $chartDataR3 = [
            'series' => [],
            'labels' => [],
        ];

        foreach ($dataR3 as $row) {
            $subTindakan = $row['nama_sub_tindakan_restorasi'];
            $chartDataR3['series'][] = [
                'name' => $subTindakan,
                'data' => [$row['sumalokasi']],
            ];

            if (!in_array($row['tahun'], $chartDataR3['labels'])) {
                $chartDataR3['labels'][] = $row['tahun'];
            }
        }
        $R3JSON = json_encode($chartDataR3);
        // dataperencanaan
        $db = \Config\Database::connect();
        $data = $db->table('tb_khg');
        $data->select('tb_rencana.tahun, COUNT(tb_alokasi.kode_alokasi) as countalokasi');
        $data->join('tb_sub_khg', 'tb_sub_khg.kode_khg  = tb_khg.kode_khg');
        $data->join('tb_hru', 'tb_hru.kode_sub_khg  = tb_sub_khg.kode_sub_khg');
        $data->join('tb_alokasi', 'tb_alokasi.kode_hru  = tb_hru.kode_hru');
        $data->join('tb_rencana_kegiatan', 'tb_rencana_kegiatan.kode_rencana_kegiatan  = tb_alokasi.kode_rencana_kegiatan');
        $data->join('tb_rencana', 'tb_rencana.kode_rencana  = tb_rencana_kegiatan.kode_rencana');
        $data->groupBy('tb_rencana.tahun');
        $data->where('tb_khg.id', $idkhg);
        $query = $data->get();
        $dataperencanaan = $query->getResultArray();
        $chartperencanaan = [
            'series' => [],
            'labels' => [],
        ];

        foreach ($dataperencanaan as $row) {
            $chartperencanaan['series'][] = [
                'name' => 'Jumlah Data',
                'data' => [$row['countalokasi']],
            ];

            if (!in_array($row['tahun'], $chartperencanaan['labels'])) {
                $chartperencanaan['labels'][] = $row['tahun'];
            }
        }
        $perencanaanJSON = json_encode($chartperencanaan);


        // dd($perencanaanJSON);

        $data = [
            'khg' => $features,
            'allkhg' => $allkhg,
            'countsubkhg' => $countsubkhg,
            'counthru' => $counthru,
            'targetkategori' => array_column($categories, 'tahun'),
            'targetseri' => [
                [
                    'name' => 'Target (Ha)',
                    'data' => $series['tahun'],
                ],
            ],
            'R1data' => $R1JSON,
            'R2data' => $R2JSON,
            'R3data' => $R3JSON,
            'perencanaandata' => $perencanaanJSON,
            'title' => 'SIGAMMA | Peta Interaktif Kawasan',
        ];


        return view('pages/gambut-detail', $data);
        // return $this->response->setJSON($data);
    }
}
