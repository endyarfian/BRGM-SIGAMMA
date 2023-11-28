<?php

namespace App\Models;

use CodeIgniter\Model;

class GambSubTindakanModel extends Model
{
    protected $table      = 'tb_sub_tindakan_restorasi';

    public function getGambSubTindakanRestorasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        // 'id',
        'kode_tindakan_restorasi',
        'kode_sub_tindakan_restorasi',
        'nama_sub_tindakan_restorasi',
        'deskripsi',
    ];
}
