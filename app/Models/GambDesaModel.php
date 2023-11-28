<?php

namespace App\Models;

use CodeIgniter\Model;

class GambDesaModel extends Model
{
    protected $table      = 'tb_desa';

    public function getGambDesa($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_desa',
        'nama_desa',
        'kode_kec',
        'kode_kabkot',
        'kode_prov',
    ];
}
