<?php

namespace App\Models;

use CodeIgniter\Model;

class GambSubKhgModel extends Model
{
    protected $table      = 'tb_sub_khg';

    public function getGambSubKhg($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_khg',
        'kode_sub_khg',
        'nama_sub_khg',
        'luas',
        'satuan',
    ];
}
