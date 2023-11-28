<?php

namespace App\Models;

use CodeIgniter\Model;

class GambTindakanModel extends Model
{
    protected $table      = 'tb_tindakan_restorasi';

    public function getGambTindakanRestorasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_tindakan_restorasi',
        'nama_tindakan_restorasi',
        'deskripsi',
    ];
}
