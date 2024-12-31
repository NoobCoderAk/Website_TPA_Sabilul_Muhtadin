<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Account extends BaseController
{
    public function edit()
    {
        $userModel = new UserModel();
        $user = $userModel->where('username', session()->get('username'))->first();

        return view('admin/pages/edit_account', [
            'user' => $user,
            'title' => 'Edit'
        ]);
    }

    public function update()
    {
        $userModel = new UserModel();

        // Prepare updated data
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // Update the user's record using the primary key
        $userModel->update(session()->get('id'), $data);

        return redirect()->to('/dashboard')->with('success', 'Account updated successfully.');
    }
}
