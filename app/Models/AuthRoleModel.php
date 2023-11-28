<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthRoleModel extends Model
{
    protected $table      = 'auth_groups';

    public function getAuthRoleModel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'id',
        'name',
        'description',
    ];
}
