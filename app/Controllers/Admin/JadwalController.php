<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class JadwalController extends BaseController
{
    public function __construct()
    {
        $this->MapelIqroModel = new \App\Models\MapelIqroModel();
        $this->MapelQuranModel = new \App\Models\MapelQuranModel();
        $this->PengajarModel = new \App\Models\PengajarModel();
        $this->JadwalIqroModel = new \App\Models\JadwalIqroModel();
        $this->JadwalQuranModel = new \App\Models\JadwalQuranModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jadwal Menu',
            'daftar_mapel_iqro' => $this->MapelIqroModel->FindAll(),
            'daftar_mapel_quran' => $this->MapelQuranModel->FindAll(),
            'daftar_jadwal_iqro' => $this->JadwalIqroModel->findAll(), // updated to use findAll
            'daftar_jadwal_quran' => $this->JadwalQuranModel->findAll(), // updated to use findAll
            'daftar_pengajar' => $this->PengajarModel->findAll(), // updated to use findAll
        ];
        return view('admin/pages/jadwal', $data);
    }

    // ===================================== jadwal iqro =============================

    // POST Method
    public function storeJadwalIqro()
    {
        $data = [
            'hari' => esc($this->request->getPost('hari')),
            'tenaga_pengajar_id' => esc($this->request->getPost('pengajar')),  // Ensure this is valid
            'mata_pelajaran_id' => esc($this->request->getPost('mapel_iqro')), // Ensure this is valid
            'periode' => esc($this->request->getPost('tahun')),
            'jam' => esc($this->request->getPost('waktu')),
        ];
        $this->JadwalIqroModel->insert($data);

        return redirect()->back()->with('success-jadwal-iqro', 'Data berhasil ditambahkan!');
    }

    // UPDATE Method
    public function editJadwalIqro($id)
    {
        $data = [
            'hari' => esc($this->request->getPost('hari')),
            'tenaga_pengajar_id' => esc($this->request->getPost('pengajar')), // updated to foreign key field
            'mata_pelajaran_id' => esc($this->request->getPost('mapel_iqro')), // updated to foreign key field
            'periode' => esc($this->request->getPost('tahun')),
            'jam' => esc($this->request->getPost('waktu')),
        ];
        $this->JadwalIqroModel->update($id, $data);

        return redirect()->back()->with('success-jadwal-iqro', 'Data berhasil diedit!');
    }

    // DELETE Method
    public function deleteJadwalIqro($id)
    {
        $this->JadwalIqroModel->where('id', $id)->delete();

        return redirect()->back()->with('success-jadwal-iqro', 'Data berhasil dihapus!');
    }

    // ===================================== jadwal quran =============================

    // POST Method
    public function storeJadwalQuran()
    {
        $data = [
            'hari' => esc($this->request->getPost('hari')),
            'tenaga_pengajar_id' => esc($this->request->getPost('pengajar')), // updated to foreign key field
            'mata_pelajaran_id' => esc($this->request->getPost('mapel_quran')), // updated to foreign key field
            'periode' => esc($this->request->getPost('tahun')),
            'jam' => esc($this->request->getPost('waktu')),
        ];
        $this->JadwalQuranModel->insert($data);

        return redirect()->back()->with('success-jadwal-quran', 'Data berhasil ditambahkan!');
    }

    // UPDATE Method
    public function editJadwalQuran($id)
    {
        $data = [
            'hari' => esc($this->request->getPost('hari')),
            'tenaga_pengajar_id' => esc($this->request->getPost('pengajar')), // updated to foreign key field
            'mata_pelajaran_id' => esc($this->request->getPost('mapel_quran')), // updated to foreign key field
            'periode' => esc($this->request->getPost('tahun')),
            'jam' => esc($this->request->getPost('waktu')),
        ];
        $this->JadwalQuranModel->update($id, $data);

        return redirect()->back()->with('success-jadwal-quran', 'Data berhasil diedit!');
    }

    // DELETE Method
    public function deleteJadwalQuran($id)
    {
        $this->JadwalQuranModel->where('id', $id)->delete();

        return redirect()->back()->with('success-jadwal-quran', 'Data berhasil dihapus!');
    }

    // ===================================== mapel iqro =============================

    // POST Method
    public function storeMapelIqro()
    {
        $data = [
            'nama_mata_pelajaran' => esc($this->request->getPost('nama_mapel_iqro')),
        ];
        $this->MapelIqroModel->insert($data);

        return redirect()->back()->with('success-mapel-iqro', 'Data berhasil ditambahkan!');
    }

    // UPDATE Method
    public function editMapelIqro($id)
    {
        $data = [
            'nama_mata_pelajaran' => esc($this->request->getPost('nama_mapel_iqro')),
        ];
        $this->MapelIqroModel->update($id, $data);

        return redirect()->back()->with('success-mapel-iqro', 'Data berhasil diedit!');
    }

    // DELETE Method
    public function deleteMapelIqro($id)
    {
        $this->MapelIqroModel->where('id', $id)->delete();

        return redirect()->back()->with('success-mapel-iqro', 'Data berhasil dihapus!');
    }

    // ===================================== mapel quran =============================

    // POST Method
    public function storeMapelQuran()
    {
        $data = [
            'nama_mata_pelajaran' => esc($this->request->getPost('nama_mapel_quran')),
        ];
        $this->MapelQuranModel->insert($data);

        return redirect()->back()->with('success-mapel-quran', 'Data berhasil ditambahkan!');
    }

    // UPDATE Method
    public function editMapelQuran($id)
    {
        $data = [
            'nama_mata_pelajaran' => esc($this->request->getPost('nama_mapel_quran')),
        ];
        $this->MapelQuranModel->update($id, $data);

        return redirect()->back()->with('success-mapel-quran', 'Data berhasil diedit!');
    }

    // DELETE Method
    public function deleteMapelQuran($id)
    {
        $this->MapelQuranModel->where('id', $id)->delete();

        return redirect()->back()->with('success-mapel-quran', 'Data berhasil dihapus!');
    }
}
