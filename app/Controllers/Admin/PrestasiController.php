<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PrestasiController extends BaseController
{
    protected $PrestasiModel;

    public function __construct()
    {
        $this->PrestasiModel = new \App\Models\PrestasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Prestasi Menu',
            'daftar_prestasi' => $this->PrestasiModel->FindAll(),
        ];
        return view('admin/pages/prestasi', $data);
    }

    // POST Method
    public function storePrestasi()
    {
        $gambar = $this->request->getFile('gambar_prestasi');
        $namaGambar = $gambar->getRandomName();
        $gambar->move(WRITEPATH . '../public/Assets/Images/Prestasi/', $namaGambar);

        $data = [
            'judul' => esc($this->request->getPost('judul_prestasi')),
            'deskripsi' => esc($this->request->getPost('deskripsi_prestasi')),
            'author' => esc($this->request->getPost('author_prestasi')),
            'gambar' => $namaGambar,
        ];
        $this->PrestasiModel->insert($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    // UPDATE Method
    public function editPrestasi($id)
    {
        $gambar = $this->request->getFile('gambar_prestasi');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move(WRITEPATH . '../public/Assets/Images/Prestasi/', $namaGambar);

            // Delete old image
            $prestasi = $this->PrestasiModel->find($id);
            if ($prestasi && file_exists(WRITEPATH . '../public/Assets/Images/Prestasi/' . $prestasi->gambar)) {
                unlink(WRITEPATH . '../public/Assets/Images/Prestasi/' . $prestasi->gambar);
            }
        } else {
            $namaGambar = $this->PrestasiModel->find($id)->gambar;
        }

        $data = [
            'judul' => esc($this->request->getPost('judul_prestasi')),
            'deskripsi' => esc($this->request->getPost('deskripsi_prestasi')),
            'author' => esc($this->request->getPost('author_prestasi')),
            'gambar' => $namaGambar,
        ];
        $this->PrestasiModel->update($id, $data);

        return redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    // DELETE Method
    public function deletePrestasi($id)
    {
        $this->PrestasiModel->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}
