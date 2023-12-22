<?php

namespace App\Models;

use CodeIgniter\Model;

class GambTargetModel extends Model
{
    protected $table      = 'tb_target';

    public function getGambTarget($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_rencana',
        'kode_target',
        'satuan',
        'volume',
        'kode_khg',
    ];
}
