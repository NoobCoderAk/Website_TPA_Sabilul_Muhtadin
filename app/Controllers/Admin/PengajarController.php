<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PengajarController extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'Tenaga Pengajar Menu',
            'daftar_pengajar' => $this->PengajarModel->FindAll(),
        ];
        return view('admin/pages/pengajar', $data);
    }

    // POST Method
    public function storePengajar()
    {
        $gambar = $this->request->getFile('gambar_pengajar');
        $namaGambar = $gambar->getRandomName();
        $gambar->move(WRITEPATH . '../public/Assets/Images/Pengajar/', $namaGambar);

        $data = [
            'nama' => esc($this->request->getPost('nama_pengajar')),
            'jabatan' => esc($this->request->getPost('jabatan_pengajar')),
            'pengalaman' => esc($this->request->getPost('pengalaman_pengajar')),
            'gambar' => $namaGambar,
        ];
        $this->PengajarModel->insert($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }

    // UPDATE Method
    public function editPengajar($id)
    {
        $gambar = $this->request->getFile('gambar_pengajar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move(WRITEPATH . '../public/Assets/Images/Pengajar/', $namaGambar);

            // Delete old image
            $pengajar = $this->PengajarModel->find($id);
            if ($pengajar && file_exists(WRITEPATH . '../public/Assets/Images/Pengajar/' . $pengajar->gambar)) {
                unlink(WRITEPATH . '../public/Assets/Images/Pengajar/' . $pengajar->gambar);
            }
        } else {
            $namaGambar = $this->PengajarModel->find($id)->gambar;
        }

        $data = [
            'nama' => esc($this->request->getPost('nama_pengajar')),
            'jabatan' => esc($this->request->getPost('jabatan_pengajar')),
            'pengalaman' => esc($this->request->getPost('pengalaman_pengajar')),
            'gambar' => $namaGambar,
        ];
        $this->PengajarModel->update($id, $data);

        return redirect()->back()->with('success', 'Data berhasil diedit!');
    }

    // DELETE Method
    public function deletePengajar($id)
    {
        $this->PengajarModel->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus !');
    }
}
