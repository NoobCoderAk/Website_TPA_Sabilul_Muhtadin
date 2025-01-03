<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Account extends BaseController
{
    public function edit()
    {
        $data = [
            'title' => 'Edit',
            'user' => $this->UserModel->where('username', session()->get('username'))->first(),
        ];

        return view('admin/pages/edit_account', $data);
    }

    public function update($id)
    {
        // Validate the form input
        if (!$this->validate([
            'username' => 'required|min_length[3]|max_length[20]',
            'password' => 'required|min_length[6]',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Validation failed.');
        }

        // Prepare the data to update
        $data = [
            'username' => esc($this->request->getPost('username')),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // Update the user record
        if ($this->UserModel->update($id, $data)) {
            return redirect()->to('admin/logout')->with('success', 'Account updated successfully.');
        }
        return redirect()->back()->with('error', 'Failed to update account. Please try again.');
    }
}
