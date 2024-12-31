<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PertanyaanController extends BaseController
{
    protected $PertanyaanModel;

    public function __construct()
    {
        $this->PertanyaanModel = new \App\Models\PertanyaanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pertanyaan Menu',
            'daftar_pertanyaan' => $this->PertanyaanModel->FindAll(),
        ];
        return view('admin/pages/pertanyaan', $data);
    }

    // POST Method
    public function storePertanyaan()
    {

        $data = [
            'pertanyaan' => esc($this->request->getPost('pertanyaan_pertanyaan')),
            'jawaban' => esc($this->request->getPost('jawaban_pertanyaan')),
        ];
        $this->PertanyaanModel->insert($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    // UPDATE Method
    public function editPertanyaan($id)
    {
        $data = [
            'pertanyaan' => esc($this->request->getPost('pertanyaan_pertanyaan')),
            'jawaban' => esc($this->request->getPost('jawaban_pertanyaan')),
        ];
        $this->PertanyaanModel->update($id, $data);

        return redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    // DELETE Method
    public function deletePertanyaan($id)
    {
        $this->PertanyaanModel->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}
