<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthLoginModel extends Model
{
    protected $table      = 'auth_logins';

    public function getAuthLoginModel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'id',
        'ip_address',
        'email',
        'user_id',
        'date',
        'success',
    ];
}
