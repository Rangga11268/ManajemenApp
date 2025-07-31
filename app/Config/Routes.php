<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// route untuk jabatan
$routes->get('/jabatan', 'JabatanController::index');
$routes->get('/jabatan/show/(:num)', 'JabatanController::show/$1');
$routes->get('/jabatan/create', 'JabatanController::create');
$routes->post('/jabatan/store', 'JabatanController::store');
$routes->get('/jabatan/edit/(:num)', 'JabatanController::edit/$1');
$routes->post('/jabatan/update/(:num)', 'JabatanController::update/$1');
$routes->post('/jabatan/delete/(:num)', 'JabatanController::delete/$1');
