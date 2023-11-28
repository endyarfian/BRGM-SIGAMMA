<?php

namespace App\Models;

use CodeIgniter\Model;

class GambRencanaModel extends Model
{
    protected $table      = 'tb_rencana';

    public function getGambRencana($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_rencana',
        'tipe_rencana',
        'judul',
        'tahun',
        'tgl_berlaku',
        'tgl_berakhir',
        'pengesah',
        'file',
    ];
}
