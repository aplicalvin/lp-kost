<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function index()
    {
        //
        // Jika sudah login, jangan tampilkan form login lagi, langsung lempar ke admin
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $data = [
            'title' => 'Login Admin | Alpha Kost'
        ];

        return view('login_page', $data);
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
    
    // Tambahkan ini di dalam class Auth
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah berhasil keluar.');
    }
}
