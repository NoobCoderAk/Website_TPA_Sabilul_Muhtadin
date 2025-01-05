<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Jadwal extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Jadwal',
            'kontak' => $this->KontakModel->findAll(),

            'mapel_iqro' => $this->MapelIqroModel->findAll(),
            'mapel_quran' => $this->MapelQuranModel->findAll(),
            'jadwal_iqro' => $this->JadwalIqroModel->findAll(),
            'pengajar' => $this->PengajarModel->findAll(),


            'hari_senin_iqro' => $this->JadwalIqroModel->get_jadwal_by_day('Senin'),
            'hari_selasa_iqro' => $this->JadwalIqroModel->get_jadwal_by_day('Selasa'),
            'hari_rabu_iqro' => $this->JadwalIqroModel->get_jadwal_by_day('Rabu'),
            'hari_kamis_iqro' => $this->JadwalIqroModel->get_jadwal_by_day('Kamis'),
            'hari_sabtu_iqro' => $this->JadwalIqroModel->get_jadwal_by_day('Sabtu'),
            'hari_minggu_iqro' => $this->JadwalIqroModel->get_jadwal_by_day('Minggu'),


            'hari_senin_quran' => $this->JadwalQuranModel->get_jadwal_by_day('Senin'),
            'hari_selasa_quran' => $this->JadwalQuranModel->get_jadwal_by_day('Selasa'),
            'hari_rabu_quran' => $this->JadwalQuranModel->get_jadwal_by_day('Rabu'),
            'hari_kamis_quran' => $this->JadwalQuranModel->get_jadwal_by_day('Kamis'),
            'hari_sabtu_quran' => $this->JadwalQuranModel->get_jadwal_by_day('Sabtu'),
            'hari_minggu_quran' => $this->JadwalQuranModel->get_jadwal_by_day('Minggu'),

        ];
        echo view('templates/header', $data);
        echo view('user/jadwal', $data);
        echo view('templates/footer', $data);
    }
}
