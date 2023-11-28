<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthAksesModel extends Model
{
    protected $table      = 'auth_groups_users';

    public function getAuthAksesModel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    protected $allowedFields = [
        'user_id',
        'group_id',
    ];

    public function getAkses()
    {
        return $this->select('auth_groups_users.id aksesid, user_id, email, group_id, auth_groups.name group')
            ->join('users', 'auth_groups_users.user_id=users.id')
            ->join('auth_groups', 'auth_groups_users.group_id=auth_groups.id')
            ->findAll();
    }
}
