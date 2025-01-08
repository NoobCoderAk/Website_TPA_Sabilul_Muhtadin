<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Prestasi extends BaseController
{
    protected $PrestasiModel;

    public function index()
    {
        $data = [
            'title' => 'Halaman Prestasi',
            'kontak' => $this->KontakModel->findAll(),
        ];
        $data['prestasi'] = $this->PrestasiModel->paginate(3);
        $data['pager'] = $this->PrestasiModel->pager;
        echo view('templates/header', $data);
        echo view('user/prestasi', $data);
        echo view('templates/footer', $data);
    }

    public function get_prestasi($id)
    {
        // Fetch artikel by id
        $prestasi = $this->PrestasiModel->find($id);

        // cek artikel ada atau tidak
        if (!$prestasi) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Artikel not found']);
        }

        // return JSON 
        return $this->response->setJSON($prestasi);
    }
}
