<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class TestController extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        if (! $this->request->is('post')) {
            return view('user/testform');
        }

        $rules = [
            // @TODO
            'username' => 'required|max_length[30]',
            'password' => 'required|max_length[255]|min_length[10]',
            'passconf' => 'required|max_length[255]|matches[password]',
            'email'    => 'required|max_length[254]|valid_email',
        ];

        $data = $this->request->getPost(array_keys($rules));

        if (! $this->validateData($data, $rules)) {
            return view('user/testform');
        }

        // If you want to get the validated data.
        $validData = $this->validator->getValidated();

        return view('user/successform');
    }
}
