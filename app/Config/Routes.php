<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'LoginController::index');
$routes->post('login/process', 'LoginController::process');
$routes->get('logout', 'LoginController::logout');

$routes->get('user', 'UserController::index');
$routes->get('user/create', 'UserController::create');
$routes->post('user/store', 'UserController::store');
$routes->get('user/edit/(:num)', 'UserController::edit/$1');
$routes->post('user/update/(:num)', 'UserController::update/$1');
$routes->get('user/delete/(:num)', 'UserController::delete/$1');

$routes->get('employee', 'EmployeeController::index');
$routes->get('employee/create', 'EmployeeController::create');
$routes->post('employee/store', 'EmployeeController::store');
$routes->get('employee/edit/(:num)', 'EmployeeController::edit/$1');
$routes->post('employee/update/(:num)', 'EmployeeController::update/$1');
$routes->get('employee/delete/(:num)', 'EmployeeController::delete/$1');
