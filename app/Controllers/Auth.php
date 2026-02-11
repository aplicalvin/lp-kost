<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
        //
    }

    public function login()
    {
        $session = session();
        $model = new \App\Models\UserModel(); // Pastikan buat UserModel
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $user = $model->where('username', $username)->first();
        if ($user && password_verify($password, $user['password'])) {
            $session->set(['isLoggedIn' => true, 'username' => $user['username']]);
            return redirect()->to('/admin');
        }
        return redirect()->back()->with('error', 'Username atau Password salah!');
    }
}
