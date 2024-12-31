<?php

// app/Controllers/Admin/Registration.php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Registration extends BaseController
{
    public function index()
    {
        return view('admin/pages/registration_form');
    }

    public function register()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        // Validation rules
        $rules = [
            'username' => 'required|min_length[3]|max_length[100]|is_unique[users.username]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('registration')->withInput()->with('error', 'Please fix the errors in the form.');
        }

        // Hash the password before saving to database
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $userModel = new UserModel(); // Correctly instantiate the model here
        if ($userModel->createUser($data)) {
            return redirect()->to('login')->with('success', 'Registration successful! Please login.');
        }

        return redirect()->to('registration')->with('error', 'Registration failed. Please try again.');
    }
}
