<?php

namespace App\Models;

use CodeIgniter\Model;

class GambKhgModel extends Model
{
    protected $table      = 'tb_khg';

    public function getGambKhg($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_khg',
        'nama',
        'kode_prov',
        'luas',
        'satuan',
    ];
}
