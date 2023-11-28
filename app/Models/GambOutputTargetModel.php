<?php

namespace App\Models;

use CodeIgniter\Model;

class GambOutputTargetModel extends Model
{
    protected $table      = 'tb_output_target';

    public function getGambOutputTarget($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_target',
        'kode_output_target',
        'kode_hru',
        'satuan',
        'volume',
    ];
}
