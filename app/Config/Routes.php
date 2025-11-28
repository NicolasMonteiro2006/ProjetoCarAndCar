<?php

namespace Config;

$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true); 

$routes->get('/', 'Home::index');                    
$routes->get('carro/(:num)', 'Home::detalhes/$1');   


$routes->get('login', 'Login::index');

$routes->get('consertar', 'Login::consertarSenha');

$routes->post('login/autenticar', 'Login::autenticar');

$routes->get('cadastro', 'Cadastro::index');

$routes->post('cadastro/salvar', 'Cadastro::salvar');

$routes->get('logout', 'Login::logout');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');

    $routes->get('veiculos', 'Admin\Veiculos::index');             
    $routes->get('veiculos/novo', 'Admin\Veiculos::novo');         
    $routes->post('veiculos/salvar', 'Admin\Veiculos::salvar');    
    $routes->get('veiculos/excluir/(:num)', 'Admin\Veiculos::excluir/$1');

    $routes->get('anuncios', 'Admin\Anuncios::index');
    $routes->get('anuncios/novo', 'Admin\Anuncios::novo');
    $routes->post('anuncios/salvar', 'Admin\Anuncios::salvar');

});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}