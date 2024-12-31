<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class KontakController extends BaseController
{
    protected $KontakModel;

    public function __construct()
    {
        $this->KontakModel = new \App\Models\KontakModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Hubungi Kami',
            'kontak' => $this->KontakModel->first(), // Load the first (and only) row
        ];
        return view('admin/pages/kontak', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id'); // Hidden field for ID

        if (!$id) {
            return redirect()->to('admin/kontak')->with('error', 'ID tidak ditemukan!');
        }

        // Only update fields that are provided
        $data = array_filter([
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('phone'),
            'jam_buka' => $this->request->getPost('jam'),
            'link_maps' => $this->request->getPost('map'),
            'link_wa' => $this->request->getPost('wa'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        if (!empty($data)) {
            $this->KontakModel->update($id, $data);
            return redirect()->to('admin/kontak')->with('success', 'Data berhasil diperbarui!');
        } else {
            return redirect()->to('admin/kontak')->with('error', 'Tidak ada perubahan data!');
        }
    }
}
