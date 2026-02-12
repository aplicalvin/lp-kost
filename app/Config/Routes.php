<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- RUTE PUBLIK ---
$routes->get('/', 'LandingPage::index');

// Rute Autentikasi
$routes->get('login', 'Auth::index');           // Menampilkan halaman login
$routes->post('login/process', 'Auth::login');  // Proses verifikasi login
$routes->get('logout', 'Auth::logout');         // Keluar dari sistem

// --- RUTE ADMIN (TERPROTEKSI) ---
// Menambahkan array ['filter' => 'adminAuth'] agar semua rute di dalam grup ini dicek login-nya
$routes->group('admin', ['filter' => 'adminAuth'], function($routes) {
    
    $routes->get('/', 'Admin\Dashboard::index');
    
    // Kelola Profil Kost & Akun (Berdasarkan data Alpha Kost)
    $routes->post('storeRoom', 'Admin\Dashboard::storeRoom'); // Tambahkan ini
    $routes->post('updateRoom/(:num)', 'Admin\Dashboard::updateRoom/$1');
    $routes->get('deleteRoom/(:num)', 'Admin\Dashboard::deleteRoom/$1');
    $routes->post('updateSettings', 'Admin\Dashboard::updateSettings');
    $routes->post('updatePassword', 'Admin\Dashboard::updatePassword');
    $routes->post('storeGallery', 'Admin\Dashboard::storeGallery');
    $routes->get('deleteGallery/(:num)', 'Admin\Dashboard::deleteGallery/$1');

    $routes->post('storeTestimonial', 'Admin\Dashboard::storeTestimonial');
    $routes->get('deleteTestimonial/(:num)', 'Admin\Dashboard::deleteTestimonial/$1');


   
});