<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('admin/pages/login');
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('logged_in', true);
            session()->set('username', $user['username']);
            return redirect()->to('admin/dashboard');
        }

        return redirect()->back()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }
}
