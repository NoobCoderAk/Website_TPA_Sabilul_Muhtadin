<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;

class Artikel extends BaseController
{
    protected $ArtikelModel;

    public function index()
    {
        $data = [
            'title' => 'Halaman Artikel',
            'artikel' => $this->ArtikelModel->paginate(9),
            'pager' => $this->ArtikelModel->pager,

        ];
        echo view('templates/header', $data);
        echo view('user/artikel', $data);
        echo view('templates/footer');
    }

    // public function get_artikel($id)
    // {
    //     $data['artikel'] = $this->ArtikelModel->find($id);
    //     return $data;
    // }

    public function get_artikel($id)
    {
        // Fetch the article from the database by ID
        $artikel = $this->ArtikelModel->find($id);

        // Check if the article exists
        if (!$artikel) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Artikel not found']);
        }

        // Return article as JSON response
        return $this->response->setJSON($artikel);
    }

    // public function get_detail_artikel($id)
    // {
    //     $data['artikel'] = $this->ArtikelModel->find($id);
    //     return view('user/detail_artikel', $data);
    // }

    // public function update($id)
    // {
    //     $this->ArtikelModel->update($id, [
    //         'judul' => $this->request->getPost('judul'),
    //         'descrip' => $this->request->getPost('descrip'),
    //     ]);
    //     return redirect()->to('/user');
    // }
}
