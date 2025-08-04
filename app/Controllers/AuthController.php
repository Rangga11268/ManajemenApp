<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        // cek request dari form login
        if ($this->request->getMethod() === 'POST') {
            // ambil kiriman form 
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $modelUser = new UserModel();
            $user = $modelUser->where('username', $username)->first();

            if ($user && password_verify($password, $user->password)) {
                session()->set([
                    'login' => true,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email' => $user->email,
                ]);

                return redirect('/');
            }
            session()->setFlashdata('error', 'Username atau Password anda salah');
            return redirect()->back();
        }

        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect('login');
    }
}
