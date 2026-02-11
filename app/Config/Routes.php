<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Rute untuk Pengunjung (Landing Page)
$routes->get('/', 'LandingPage::index');

// Rute untuk Admin Panel (Perlu Login/Auth di masa depan)
$routes->group('admin', function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    
    // Kelola Kamar
    $routes->get('rooms', 'Admin\Room::index');
    $routes->post('rooms/update/(:num)', 'Admin\Room::update/$1');
    
    // Kelola Testimoni
    $routes->get('testimonials', 'Admin\Testimonial::index');
    $routes->post('testimonials/store', 'Admin\Testimonial::store');
    $routes->get('testimonials/delete/(:num)', 'Admin\Testimonial::delete/$1');
});

$routes->group('admin', function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->post('updateRoom/(:num)', 'Admin\Dashboard::updateRoom/$1');
});