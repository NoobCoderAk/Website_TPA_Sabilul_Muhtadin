<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{


    public function index()
    {
        $tablePengajarLength = $this->PengajarModel->getTablePengajarLength();
        $tableArtikelLength = $this->ArtikelModel->getTableArtikelLength();
        $tableFasilitasLength = $this->FasilitasModel->getTableFasilitasLength();

        $data = [
            'title' => 'Dashboard',
            'countPengajar' => $tablePengajarLength,
            'countArtikel' => $tableArtikelLength,
            'countFasilitas' => $tableFasilitasLength,
        ];
        return view('admin/pages/dashboard', $data);
    }
}
