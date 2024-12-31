<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Pertanyaan extends BaseController
{
    protected $PertanyaanModel;

    public function index()
    {
        $data = [
            'title' => 'Halaman Pertanyaan',
        ];
        $data['pertanyaan'] = $this->PertanyaanModel->paginate(9);
        $data['pager'] = $this->PertanyaanModel->pager;
        echo view('templates/header', $data);
        echo view('user/pertanyaan', $data);
        echo view('templates/footer');
    }
}
