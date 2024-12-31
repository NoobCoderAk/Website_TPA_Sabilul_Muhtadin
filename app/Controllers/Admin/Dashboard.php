<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $UserModel;


    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('admin/pages/dashboard', $data);
    }
}
