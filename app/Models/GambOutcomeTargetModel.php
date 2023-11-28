<?php

namespace App\Models;

use CodeIgniter\Model;

class GambOutcomeTargetModel extends Model
{
    protected $table      = 'tb_outcome_target';

    public function getGambOutcomeTarget($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_output_target',
        'kode_outcome_target',
        'satuan',
        'volume',
    ];
}
