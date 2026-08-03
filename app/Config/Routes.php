<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->get('/login/register', 'Login::register');
$routes->post('/login/registerStore', 'Login::registerStore');
$routes->post('/login/authenticate', 'Login::authenticate');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/logout', 'Login::logout', ['filter' => 'auth']);

$routes->get('/kost/kategori', 'KategoriKost::index', ['filter' => 'admin']);
$routes->get('/kost/kategori/create', 'KategoriKost::create', ['filter' => 'admin']);
$routes->post('/kost/kategori/store', 'KategoriKost::store', ['filter' => 'admin']);
$routes->get('/kost/kategori/edit/(:num)', 'KategoriKost::edit/$1', ['filter' => 'admin']);
$routes->post('/kost/kategori/update', 'KategoriKost::update', ['filter' => 'admin']);
$routes->get('/kost/kategori/delete/(:num)', 'KategoriKost::delete/$1', ['filter' => 'admin']);

$routes->get('/kost/kamar', 'Kost::index', ['filter' => 'auth']);
$routes->get('/kost/kamar/create', 'Kost::create', ['filter' => 'admin']);
$routes->post('/kost/kamar/store', 'Kost::store', ['filter' => 'admin']);
$routes->get('/kost/kamar/edit/(:num)', 'Kost::edit/$1', ['filter' => 'admin']);
$routes->post('/kost/kamar/update', 'Kost::update', ['filter' => 'admin']);
$routes->get('/kost/kamar/delete/(:num)', 'Kost::delete/$1', ['filter' => 'admin']);

$routes->get('/kriteria', 'Kriteria::index', ['filter' => 'admin']);
$routes->get('/kriteria/create', 'Kriteria::create', ['filter' => 'admin']);
$routes->post('/kriteria/store', 'Kriteria::store', ['filter' => 'admin']);
$routes->get('/kriteria/edit/(:num)', 'Kriteria::edit/$1', ['filter' => 'admin']);
$routes->post('/kriteria/update', 'Kriteria::update', ['filter' => 'admin']);
$routes->get('/kriteria/delete/(:num)', 'Kriteria::delete/$1', ['filter' => 'admin']);

$routes->get('/rekomendasi', 'Rekomendasi::index', ['filter' => 'auth']);
$routes->post('/rekomendasi/proses', 'Rekomendasi::proses', ['filter' => 'auth']);

$routes->get('/rekomendasi/hasil/(:num)', 'Rekomendasi::hasil/$1', ['filter' => 'auth']);