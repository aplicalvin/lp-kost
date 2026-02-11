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
}