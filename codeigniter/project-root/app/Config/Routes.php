<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('contato', 'Home::contato');
//$routes->get('/', 'Auth::registro');
$routes->get('entre-cadastre-se', 'Auth::index');
$routes->post('login/salvar', 'Auth::salvar');
$routes->post('login/logar', 'Auth::logar');
$routes->get('login/sair', 'Auth::sair');
$routes->get('cadastre-se', 'Auth::registro');
$routes->get('animais-adocao', 'Animais::listaAnimais');
$routes->get('clinicas', 'Clinicas::listaClinicas');
$routes->get('/email', 'EnviaEmail::index');
$routes->post('/envia-emailteste', 'EnviaEmail::enviaEmailTeste');
$routes->post('/salva-contato', 'Mensagens::salvar');
$routes->post('agendamento/salvar', 'Agendamento::salvar');

//Rotas protegidas por login
$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {

    //Animais
    $routes->post('animais/salvar', 'Animais::salvar');
    $routes->post('animais/marcar-adotado', 'Animais::marcarAdotado');
    $routes->post('animais/excluir', 'Animais::excluirAnimal');

    //Dashboard
    $routes->get('dashboard/contatos-adocao', 'Dash::contatosAdocao');
    $routes->get('dashboard/servicos', 'Dash::servicos');
    $routes->get('dashboard', 'Dash::index');
    $routes->get('dashboard/agendamentos', 'Dash::agendamentos');

    //Mensagens
    $routes->post('mensagens/marcar-respondida', 'Mensagens::marcarRespondida');
    $routes->post('mensagens/excluir', 'Mensagens::excluirMensagem');

    //Servicos
    $routes->post('servicos/salvar', 'Servicos::salvar');
    $routes->post('servicos/excluir', 'Servicos::excluirServico');

    //Agendamento
    $routes->post('agendamento/marcar-respondido', 'Agendamento::marcarRespondida');
    $routes->post('agendamento/excluir', 'Agendamento::excluirAg');
});

$routes->get('recuperar-senha', 'Auth::recuperarSenha');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
