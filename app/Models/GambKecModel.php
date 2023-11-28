<?php

namespace App\Models;

use CodeIgniter\Model;

class GambKecModel extends Model
{
    protected $table      = 'tb_kec';

    public function getGambKec($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_kec',
        'nama_kec',
        'kode_kabkot',
        'kode_prov',
    ];
}
