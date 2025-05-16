<?php

namespace App\Controllers\Admin;

use App\Models\AdminModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Login extends BaseController
{
    public function login()
    {
        helper(['form']);
        return view('layout/admin/signin');
    }

    public function login_action()
    {
        $session = session();
        $model = new AdminModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $user = $model->where('email', $email)->first();

        if ($user) {
            $pass = $user['password'];
            $authpassword = password_verify($password, $pass);
            if ($authpassword) {
                $session_data = [
                    'id' => $user['id'],
                    'fname' => $user['fname'],
                    'lname' => $user['lname'],
                    'email' => $user['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($session_data);
                return redirect()->to('/admin');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to('/');
        }
    }

    public function signup()
    {
        return view('layout/admin/signup');
    }

    public function insert()
    {
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        $rules = [
            'fname' => 'required|min_length[2]|max_length[50]',
            'lname' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|valid_email|is_unique[admin.email]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return view('layout/admin/signup', [
                'validation' => $this->validator
            ]);
        } else {
            $model = new UserModel();

            $data = [
                'fname' => $this->request->getPost('fname'),
                'lname' => $this->request->getPost('lname'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            $model->save($data);
            return redirect()->to('/')->with('success', 'Registration successful. Please login.');
        }
    }

    public function forget()
    {
        return view('layout/admin/forget_password');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
