<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'TPA Sabilul Muhtadin',
            'kontak' => $this->KontakModel->findAll(),
        ];
        $data['artikel'] = $this->ArtikelModel->findAll();
        $data['fasilitas'] = $this->FasilitasModel->findAll();
        $data['review'] = $this->ReviewModel->findAll();
        $data['prestasi'] = $this->PrestasiModel->findAll();
        echo view('templates/header', $data);
        echo view('user/home', $data);
        echo view('templates/footer', $data);
    }
}
