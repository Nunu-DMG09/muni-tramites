<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/doLogin', 'Auth::doLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/saveRegister', 'Auth::saveRegister');
$routes->get('/logout', 'Auth::logout');

$routes->get('/tramites', 'Tramite::index');
$routes->get('/tramites/create', 'Tramite::create');
$routes->post('/tramites/store', 'Tramite::store');
$routes->get('/tramites/edit/(:num)', 'Tramite::edit/$1');
$routes->post('/tramites/update/(:num)', 'Tramite::update/$1');
$routes->get('/tramites/delete/(:num)', 'Tramite::delete/$1');
