<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class FasilitasController extends BaseController
{
    protected $FasilitasModel;

    public function __construct()
    {
        $this->FasilitasModel = new \App\Models\FasilitasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Fasilitas Menu',
            'daftar_fasilitas' => $this->FasilitasModel->FindAll(),
        ];
        return view('admin/pages/fasilitas', $data);
    }

    // POST Method
    public function storeFasilitas()
    {
        $gambar = $this->request->getFile('gambar_fasilitas');
        $namaGambar = $gambar->getRandomName();
        $gambar->move(WRITEPATH . '../public/Assets/Images/Fasilitas/', $namaGambar);

        $data = [
            'judul' => esc($this->request->getPost('judul_fasilitas')),
            'gambar' => $namaGambar,
        ];
        $this->FasilitasModel->insert($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    // UPDATE Method
    public function editFasilitas($id)
    {
        $gambar = $this->request->getFile('gambar_fasilitas');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move(WRITEPATH . '../public/Assets/Images/Fasilitas/', $namaGambar);

            // Delete old image
            $fasilitas = $this->FasilitasModel->find($id);
            if ($fasilitas && file_exists(WRITEPATH . '../public/Assets/Images/Fasilitas/' . $fasilitas->gambar)) {
                unlink(WRITEPATH . '../public/Assets/Images/Fasilitas/' . $fasilitas->gambar);
            }
        } else {
            $namaGambar = $this->FasilitasModel->find($id)->gambar;
        }

        $data = [
            'judul' => esc($this->request->getPost('judul_fasilitas')),
            'gambar' => $namaGambar,
        ];
        $this->FasilitasModel->update($id, $data);

        return redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    // DELETE Method
    public function deleteFasilitas($id)
    {
        $this->FasilitasModel->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}



 // POST Method
    // public function storeFasilitas()
    // {
    //     $gambar = $this->request->getFile('gambar_fasilitas');
    //     $namaGambar = $gambar->getRandomName();
    //     $gambar->move(WRITEPATH . '../public/Assets/Images/Gambar/', $namaGambar);
    //     $data = [
    //         'judul' => esc($this->request->getPost('judul_fasilitas')),
    //         'gambar' => $namaGambar,
    //     ];
    //     $this->FasilitasModel->insert($data);

    //     return redirect()->back()->with('success', 'Data berhasil ditambahkan !');
    // }


    // UPDATE Method
    // public function editFasilitas($id)
    // {
    //     $gambar = $this->request->getFile('gambar_fasilitas');
    //     var_dump($gambar);
    //     $namaGambar = $gambar->getRandomName();
    //     $gambar->move(WRITEPATH . '../public/Assets/Images/Gambar/', $namaGambar);
    //     // $filepath->move(WRITEPATH . '../public/Assets/Images/', $gambar);

    //     // dd($_POST);
    //     $data = [
    //         'judul' => esc($this->request->getPost('judul_fasilitas')),
    //         'gambar' => $namaGambar,
    //     ];
    //     $this->FasilitasModel->update($id, $data);

    //     return redirect()->back()->with('success', 'Data berhasil diedit !');
    // }