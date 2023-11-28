<?php

namespace App\Models;

use CodeIgniter\Model;

class GambLemdesModel extends Model
{
    protected $table = 'tb_lemdes';

    public function getGambLemdes($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_desa',
        'kode_lemdes',
        'nama_lemdes',
        'jenis_lemdes',
        'jumlah_anggota',
        'pj',
        'tlpn',
    ];
}
