<?php

namespace App\Controllers;

use \App\Controllers\BaseController;
use \App\Models\AuthRoleModel;
use \App\Models\AuthAksesModel;

class Peran extends BaseController
{
    private $authuser;
    public function __construct()
    {
        $this->AuthRoleModel = new AuthRoleModel();
        $this->AuthAksesModel = new AuthAksesModel();
    }
    public function index()
    {
        $role = $this->AuthRoleModel->findAll();
        $akses = $this->AuthAksesModel->getAkses();
        $data = [
            'role' => $role,
            'akses' => $akses,
            'title' => 'SIGAMMA | Peran dan Perizinan',
            'validation' => \Config\Services::validation(),
        ];
        return view('user-control/peran', $data);
    }

    public function edit_akses($id)
    {
        $this->AuthAksesModel->save([
            'id' => $id,
            'group_id' => $this->request->getVar('groupid'),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Akses pengguna berhasil diperbaharui.']);
        return redirect()->to('admin/peran');
    }
}
