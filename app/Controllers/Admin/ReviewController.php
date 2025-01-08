<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ReviewController extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Review Menu',
            'daftar_review' => $this->ReviewModel->FindAll(),
        ];
        return view('admin/pages/review', $data);
    }

    // POST Method
    public function storeReview()
    {

        $data = [
            'nama' => esc($this->request->getPost('nama_review')),
            'deskripsi' => esc($this->request->getPost('deskripsi_review')),
            'angkatan' => esc($this->request->getPost('angkatan_review')),
        ];
        $this->ReviewModel->insert($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    // UPDATE Method
    public function editReview($id)
    {
        $data = [
            'nama' => esc($this->request->getPost('nama_review')),
            'deskripsi' => esc($this->request->getPost('deskripsi_review')),
            'angkatan' => esc($this->request->getPost('angkatan_review')),
        ];
        $this->ReviewModel->update($id, $data);

        return redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    // DELETE Method
    public function deleteReview($id)
    {
        $this->ReviewModel->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}
