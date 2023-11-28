<?php

namespace App\Controllers;

class AdminHome extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'SIGAMMA | Dashboard Administrator',
        ];
        return view('pages/admin-dashboard', $data);
    }
}
