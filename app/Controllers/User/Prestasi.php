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
        ];
        $data['prestasi'] = $this->PrestasiModel->paginate(3);
        $data['pager'] = $this->PrestasiModel->pager;
        echo view('templates/header', $data);
        echo view('user/prestasi', $data);
        echo view('templates/footer');
    }

    public function get_prestasi($id)
    {
        // Fetch the article from the database by ID
        $prestasi = $this->PrestasiModel->find($id);

        // Check if the article exists
        if (!$prestasi) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Artikel not found']);
        }

        // Return article as JSON response
        return $this->response->setJSON($prestasi);
    }
}
