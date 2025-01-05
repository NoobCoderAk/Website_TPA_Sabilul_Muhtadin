<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Kontak extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Kontak',
            'kontak' => $this->KontakModel->findAll(),
        ];
        echo view('templates/header', $data);
        echo view('user/kontak', $data);
        echo view('templates/footer', $data);
    }
}
