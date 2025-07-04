<?php

use App\Controllers\AuthController;
use CodeIgniter\Commands\Utilities\Routes;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MenuController::home');
$routes->get('/hello', 'Home::hello');

$routes->get('/home', 'MenuController::home');
$routes->get('/data_siswa', 'MenuController::data_siswa');
$routes->get('/info_kegiatan', 'MenuController::info_kegiatan');
$routes->get('/registrasi', 'AuthController::registrasi');
$routes->post('/registrasi/simpan-registrasi', 'AuthController::simpanRegistrasi');
$routes->get('/login', 'AuthController::login');
$routes->post('/login/proses-login', 'AuthController::prosesLogin');
$routes->get('/logout', 'AuthController::logout');
