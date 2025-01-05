<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class About extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Halaman About',
            'pengajar' => $this->PengajarModel->findAll(),
            'kontak' => $this->KontakModel->findAll(),
        ];
        echo view('templates/header', $data);
        echo view('user/about', $data);
        echo view('templates/footer', $data);
    }
}
