<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthUserModel extends Model
{
    protected $table      = 'users';

    public function getAuthUserModel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'id',
        'email',
        'username',
        'fullname',
        'password_hash',
        'created_at',
        'active'
    ];

    public function getUsers()
    {
        return $this->select('users.id userid, email, username, fullname, created_at, active, gs.group_id, g.name group')
            ->join('auth_groups_users gs', 'users.id=gs.user_id')
            ->join('auth_groups g', 'g.id=gs.group_id')
            ->findAll();
    }
}
