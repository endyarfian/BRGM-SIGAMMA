<?php

namespace App\Models;

use CodeIgniter\Model;

class GambKabkotModel extends Model
{
    protected $table      = 'tb_kabkot';

    public function getGambKabkot($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_kabkot',
        'nama_kabkot',
        'kode_prov',
    ];
}
