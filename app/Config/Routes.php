<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);;

#Autentikasi
$routes->get('/login', 'Autentikasi::login');
$routes->post('/valid_login', 'Autentikasi::valid_login');
$routes->get('/logout', 'Autentikasi::logout', ['filter' => 'auth']);

#Pengguna
$routes->get('/pengguna', 'Pengguna::index',['filter' => 'auth']);
$routes->post('/pengguna/post', 'Pengguna::post',['filter' => 'auth']);
$routes->get('/pengguna/edit/(:any)', 'Pengguna::edit/$1',['filter' => 'auth']);
$routes->post('/pengguna/update/(:any)', 'Pengguna::update/$1',['filter' => 'auth']);
$routes->post('/pengguna/update_password/(:any)', 'Pengguna::update_password/$1',['filter' => 'auth']);
$routes->get('/pengguna/delete/(:any)', 'Pengguna::delete/$1',['filter' => 'auth']);
$routes->get('/pengguna/profil', 'Pengguna::profil',['filter' => 'auth']);
$routes->post('/pengguna/profil/update_password', 'Pengguna::update_password_byprofil',['filter' => 'auth']);

#Task
$routes->get('/tiket_reguler', 'TiketReguler::index', ['filter' => 'auth']);
$routes->post('/tiket_reguler/post', 'TiketReguler::post', ['filter' => 'auth']);
$routes->get('/tiket_reguler/edit/(:any)', 'TiketReguler::edit/$1', ['filter' => 'auth']);
$routes->post('/tiket_reguler/update/(:any)', 'TiketReguler::update/$1', ['filter' => 'auth']);
$routes->get('/tiket_reguler/delete/(:any)', 'TiketReguler::delete/$1', ['filter' => 'auth']);

#My Task
$routes->get('/mytask_tiket_reguler', 'MyTask::list_reguler', ['filter' => 'auth']);
$routes->get('/mytask_tiket_reguler/update/(:any)', 'MyTask::update_reguler/$1', ['filter' => 'auth']);

#Closed Task
$routes->get('/closed_tiket_reguler', 'ClosedTask::input', ['filter' => 'auth']);
$routes->post('/closed_tiket_reguler/getServiceDetails', 'ClosedTask::getServiceDetails', ['filter' => 'auth']);
$routes->post('/closed_tiket_reguler/post', 'ClosedTask::post', ['filter' => 'auth']);
$routes->get('/closed_tiket_reguler/generate_pdf/(:any)', 'ClosedTask::generate_pdf/$1', ['filter' => 'auth']);

$routes->get('uploads/(:any)', 'ImageController::show/$1');
