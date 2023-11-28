<?php

namespace App\Models;

use CodeIgniter\Model;

class GambPelaksanaModel extends Model
{
    protected $table = 'tb_pelaksana';

    public function getGambPelaksana($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_pelaksana',
        'jenis',
        'nama',
        'pj',
        'tlpn',
        'alamat',
        'kode_prov',
    ];
}
