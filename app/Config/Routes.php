<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/auth/login', 'AuthController::login');
$routes->post('/auth/loginUser', 'AuthController::loginUser');

$routes->get('/auth/register', 'AuthController::register');
$routes->post('/auth/registerUser', 'AuthController::registerUser');

$routes->get('/auth/logout', 'AuthController::logout');

$routes->get('/movies/homepage', 'MovieController::index');

$routes->get('reviews/index/(:num)', 'ReviewController::index/$1'); // Display reviews for a movie
$routes->post('reviews/submit', 'ReviewController::submit'); // Submit a review

