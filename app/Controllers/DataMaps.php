<?php

namespace App\Controllers;

class DataMaps extends BaseController
{
    public function mapsdata()
    {

        $model = new \App\Models\GambProvModel();

        $file = file_get_contents("./dashboard/mapdata/provgambut.geojson");
        $file = json_decode($file);

        $features = $file->features;

        foreach ($features as $index => $feature) {
            $kodeprov = $feature->properties->KODE;
            $data = $model->where('kode_prov', $kodeprov)->first();

            if ($data) {
                $features[$index]->properties->id = $data['id'];
                // $features[$index]->properties->luas = $data['luas'];
                // $features[$index]->properties->luasht = $data['luas_ht'];
                // $features[$index]->properties->persentase = $data['persentase'];
            }
        }

        $data = [
            'kodeprov' => $features,
        ];
        return $this->response->setJSON($data);
    }
}
