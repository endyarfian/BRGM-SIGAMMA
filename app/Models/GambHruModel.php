<?php

namespace App\Models;

use CodeIgniter\Model;

class GambHruModel extends Model
{
    protected $table      = 'tb_hru';

    public function getGambHru($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_sub_khg',
        'kode_hru',
        'nama_hru',
        'luas',
        'satuan',
    ];
}
