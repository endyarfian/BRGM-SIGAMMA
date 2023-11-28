<?php

namespace App\Models;

use CodeIgniter\Model;

class GambProvModel extends Model
{
    protected $table = 'tb_prov';

    public function getGambProv($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_prov',
        'nama_prov'
    ];
}
