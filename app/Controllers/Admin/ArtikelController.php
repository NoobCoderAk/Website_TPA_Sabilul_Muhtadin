<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ArtikelController extends BaseController
{
    protected $ArtikelModel;

    public function __construct()
    {
        $this->ArtikelModel = new \App\Models\ArtikelModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Artikel Menu',
            'daftar_artikel' => $this->ArtikelModel->FindAll(),
        ];
        return view('admin/pages/artikel', $data);
    }

    // POST Method
    public function storeArtikel()
    {
        $gambar = $this->request->getFile('gambar_artikel');
        $namaGambar = $gambar->getRandomName();
        $gambar->move(WRITEPATH . '../public/Assets/Images/Artikel/', $namaGambar);

        $data = [
            'judul' => esc($this->request->getPost('judul_artikel')),
            'deskripsi' => esc($this->request->getPost('deskripsi_artikel')),
            'author' => esc($this->request->getPost('author_artikel')),
            'gambar' => $namaGambar,
        ];
        $this->ArtikelModel->insert($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    // UPDATE Method
    public function editArtikel($id)
    {
        $gambar = $this->request->getFile('gambar_artikel');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move(WRITEPATH . '../public/Assets/Images/Artikel/', $namaGambar);

            // Delete old image
            $artikel = $this->ArtikelModel->find($id);
            if ($artikel && file_exists(WRITEPATH . '../public/Assets/Images/Artikel/' . $artikel->gambar)) {
                unlink(WRITEPATH . '../public/Assets/Images/Artikel/' . $artikel->gambar);
            }
        } else {
            $namaGambar = $this->ArtikelModel->find($id)->gambar;
        }

        $data = [
            'judul' => esc($this->request->getPost('judul_artikel')),
            'deskripsi' => esc($this->request->getPost('deskripsi_artikel')),
            'author' => esc($this->request->getPost('author_artikel')),
            'gambar' => $namaGambar,
        ];
        $this->ArtikelModel->update($id, $data);

        return redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    // DELETE Method
    public function deleteArtikel($id)
    {
        $this->ArtikelModel->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}
