<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Accueil::index');
$routes->get('register', 'Register::index');
$routes->post('register/submit', 'Register::submit');
$routes->get('login', 'Login::index');
$routes->post('login/auth', 'Login::auth');
$routes->get('logout', 'Login::logout');
$routes->get('compte', 'Compte::index');
$routes->get('reservation', 'Reservation::index');
$routes->post('reservation/submit', 'Reservation::submit');
$routes->get('reservation/delete/(:num)', 'Reservation::delete/$1');
$routes->get('reservation/edit/(:num)', 'Reservation::edit/$1');
$routes->post('reservation/update/(:num)', 'Reservation::update/$1');
$routes->post('admin/delete', 'Admin::delete');
$routes->post('admin/delete_all', 'Admin::deleteAll');
$routes->get('logements', 'Logements::index');
$routes->get('api/logements', 'Logements::getJson');
$routes->get('/', 'Accueil::index');

