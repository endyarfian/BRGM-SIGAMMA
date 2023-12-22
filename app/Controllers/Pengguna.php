<?php

namespace App\Controllers;

use \App\Controllers\BaseController;
use \App\Models\AuthUserModel;
use \App\Models\AuthRoleModel;
use \App\Models\AuthAksesModel;
use \App\Models\AuthLoginModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class Pengguna extends BaseController
{
    private $AuthUserModel;
    private $AuthRoleModel;
    private $AuthAksesModel;
    private $AuthLoginModel;
    public function __construct()
    {
        $this->AuthUserModel = new AuthUserModel();
        $this->AuthRoleModel = new AuthRoleModel();
        $this->AuthAksesModel = new AuthAksesModel();
        $this->AuthLoginModel = new AuthLoginModel();
    }
    public function index()
    {
        $pengguna = $this->AuthUserModel->getUsers();
        $role = $this->AuthRoleModel->findAll();
        $akses = $this->AuthAksesModel->getAkses();
        $login = $this->AuthLoginModel->orderBy('id', 'DESC')->findAll();
        $data = [
            'login' => $login,
            'pengguna' => $pengguna,
            'role' => $role,
            'akses' => $akses,
            'title' => 'SIGAMMA | Data Pengguna',
            'validation' => \Config\Services::validation(),
        ];
        return view('user-control/pengguna', $data);
    }

    public function simpan_pengguna()
    {
        if (!$this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Masukkan format email yang benar!.',
                    'is_unique' => 'Email sudah terdaftar.'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah tercatat dalam database.'
                ]
            ],
            'fullname' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.',
                ]
            ],
        ])) {
            $validation = $this->validator->getErrors();
            return redirect()->to('admin/pengguna')->withInput()->with('validation', $validation);
        }
        $myth = new UserModel();
        $myth->withGroup($this->request->getVar('role'))->save([
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'active' => $this->request->getVar('status'),
            'password_hash' => Password::hash("brgm2023"),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Pengguna berhasil ditambahkan.']);
        return redirect()->to('admin/pengguna');
    }
    public function edit_pengguna($id)
    {
        $this->AuthUserModel->save([
            'id' => $id,
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'fullname' => $this->request->getVar('fullname'),
            'active' => $this->request->getVar('status'),
            'password_hash' => Password::hash("brgm2023"),
        ]);
        session()->setFlashdata(['info' => 'success', 'judul' => 'MANTAP KAWAN!👍', 'pesan' => 'Data pengguna berhasil diperbaharui dan password berhasil diatur ulang.']);
        return redirect()->to('admin/pengguna');
    }

    public function hapus_pengguna($id)
    {
        $this->AuthUserModel->delete($id);
        session()->setFlashdata(['info' => 'error', 'judul' => 'SAYANG SEKALI 😞', 'pesan' => 'Pengguna sudah terhapus.']);
        return redirect()->to('admin/pengguna');
    }
}
