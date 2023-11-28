<?php

namespace App\Models;

use CodeIgniter\Model;

class GambKegiatanModel extends Model
{
    protected $table      = 'tb_rencana_kegiatan';

    public function getGambKegiatan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_rencana',
        'kode_sub_tindakan_restorasi',
        'kode_rencana_kegiatan',
    ];
}
