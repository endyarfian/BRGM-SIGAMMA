<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function gambutdashboard(): string
    {
        $data = [
            'title' => 'SIGAMMA | Dashboard Gambut'
        ];
        return view('pages/gamb-dashboard', $data);
    }
    public function mangrovedashboard(): string
    {
        $data = [
            'title' => 'SIGAMMA | Dashboard Mangrove'
        ];
        return view('pages/mang-dashboard', $data);
    }
}
