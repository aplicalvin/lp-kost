<?php

namespace App\Controllers;

use App\Models\RoomModel; // Pastikan Anda sudah membuat model sederhana untuk tabel rooms
use App\Models\TestimonialModel;

class LandingPage extends BaseController
{
    protected $helpers = ['url', 'number', 'form', 'text'];
    public function index()
    {
        $roomModel = new \App\Models\RoomModel();
        $testimonialModel = new \App\Models\TestimonialModel();

        $data = [
            'title' => 'Alpha Kost - Hunian Nyaman di Semarang',
            'rooms' => $roomModel->findAll(),
            'testimonials' => $testimonialModel->findAll(),
            'contact' => [
                'nama' => 'Alpha Kost', 
                'owner' => 'Pak Raji', 
                'phone' => '6287738350820', 
                'address' => 'Jl. Simongan Jl. Pamularsih Buntu No.41, Semarang'
            ]
        ];

        return view('landing_page', $data);
    }
}