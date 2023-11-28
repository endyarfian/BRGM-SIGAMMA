<?php

namespace App\Models;

use CodeIgniter\Model;

class GambAlokasiModel extends Model
{
    protected $table      = 'tb_alokasi';

    public function getGambAlokasi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'kode_alokasi',
        'jenis_alokasi',
        'kode_rencana_kegiatan',
        'kode_pelaksana',
        'kode_desa',
        'kode_hru',
        'kode_lemdes',
        'produk',
        'satuan',
        'volume',
        'pj',
        'deskripsi',
    ];
}
