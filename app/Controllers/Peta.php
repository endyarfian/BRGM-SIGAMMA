<?php

namespace App\Controllers;

class Peta extends BaseController
{
    public function index()
    {


        // $db = \Config\Database::connect();
        // $builder = $db->table('umt_anakpetak');
        // $builder->select('umt_anakpetak.kode_anak_petak as kodeanakpetak, umt_cucupetak.kode_cucu_petak as kodecupet, umt_cupet_tnm.kode_cupet_tnm as kodecupettnm, inventarisasi_umt.kode_inven_umt as kodeinvenumt, kode_inven_pu, luas_pu, bentuk_pu, ndvi, msavi, c, d, n, jenis_tanah, kelerengan, altitude');
        // $builder->join('umt_cucupetak', 'umt_cucupetak.kode_anak_petak = umt_anakpetak.kode_anak_petak');
        // $builder->join('umt_cupet_tnm', 'umt_cupet_tnm.kode_cucu_petak = umt_cucupetak.kode_cucu_petak');
        // $builder->join('inventarisasi_umt', 'inventarisasi_umt.kode_cupet_tnm  = umt_cupet_tnm.kode_cupet_tnm');
        // $builder->join('inventarisasi_pu', 'inventarisasi_pu.kode_inven_umt  = inventarisasi_umt.kode_inven_umt');
        // $query = $builder->get();

        // $model = $query->getResult();
        // $file = file_get_contents("./dashboard/json/khdtk_inven.geojson");
        // $file = json_decode($file);

        // $inven = $file->features;

        // $file = file_get_contents("./dashboard/json/khdtk_point.geojson");
        // $file = json_decode($file);

        // $point = $file->features;

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

        $data = [
            'kodekhg' => $features,
            'title' => 'SIGAMMA | Peta Interaktif Kawasan'
        ];
        return view('pages/peta', $data);
    }
}
