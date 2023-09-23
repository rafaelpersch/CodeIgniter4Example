<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('usuarios', 'UsuarioController::index');
$routes->get('usuarios/create', 'UsuarioController::create');
$routes->post('usuarios/store', 'UsuarioController::store');
$routes->get('usuarios/edit/(:num)', 'UsuarioController::edit/$1');
//$routes->post('usuarios/update/(:num)', 'UsuarioController::update/$1');
$routes->get('usuarios/delete/(:num)', 'UsuarioController::delete/$1');