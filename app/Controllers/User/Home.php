<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $ArtikelModel;
    protected $ReviewModel;
    protected $PrestasiModel;
    protected $FasilitasModel;

    public function index()
    {
        $data = [
            'title' => 'TPA Sabilul Muhtadin',
        ];
        $data['artikel'] = $this->ArtikelModel->findAll();
        $data['fasilitas'] = $this->FasilitasModel->findAll();
        $data['review'] = $this->ReviewModel->findAll();
        $data['prestasi'] = $this->PrestasiModel->findAll();
        echo view('templates/header', $data);
        echo view('user/home', $data);
        echo view('templates/footer');
    }
}
