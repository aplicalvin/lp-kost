<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoomModel;
use App\Models\TestimonialModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $roomModel = new RoomModel();
        $testimonialModel = new TestimonialModel();

        $data = [
            'title' => 'Admin Panel - Alpha Kost',
            'rooms' => $roomModel->findAll(),
            'testimonials' => $testimonialModel->findAll(),
        ];

        return view('admin/dashboard', $data);
    }

    public function updateRoom($id)
    {
        $roomModel = new RoomModel();
        
        $roomModel->update($id, [
            'price'       => $this->request->getPost('price'),
            'wa_template' => $this->request->getPost('wa_template')
        ]);

        return redirect()->to('/admin')->with('success', 'Data kamar berhasil diperbarui!');
    }

    // Update Info Kost (Alamat/Kontak)
public function updateSettings() {
    $db = \Config\Database::connect();
    foreach ($this->request->getPost('settings') as $key => $value) {
        $db->table('settings')->where('key', $key)->update(['value' => $value]);
    }
    return redirect()->back()->with('success', 'Profil kost diperbarui!');
}

// Update Password Admin
public function updatePassword() {
    $model = new \App\Models\UserModel();
    $newPass = $this->request->getPost('new_password');
    $model->where('username', session()->get('username'))
          ->set(['password' => password_hash($newPass, PASSWORD_DEFAULT)])
          ->update();
    return redirect()->back()->with('success', 'Password berhasil diubah!');
}
}