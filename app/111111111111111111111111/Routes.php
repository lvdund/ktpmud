<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
// $routes->setDefaultController('Home');
// $routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

$routes->get('/', 'Homepage::index');
$routes->get('home', 'Homepage::index');
$routes->get('error/404', function ()
{
    return view('error/html/error_404');
});

// $routes->group('admin', function ($routes){
//     $routes->get('home', 'Admin\HomeController::index');
//     $routes->group('user',function($routes){
//         $routes->get('list','Admin\UserController::list');
//         $routes->get('add','Admin\UserController::add');
//         $routes->post('create','Admin\UserController::create');
//         $routes->get('edit/(:num)','Admin\UserController::edit/$1');
//         $routes->post('update','Admin\UserController::update');
//         $routes->get('delete/(:num)','Admin\UserController::delete/$1');
//     });
// });

$routes->group('user', function ($routes){
    $routes->get('/','User\UserController::index');
    $routes->group('',function($routes){
        $routes->get('register','User\UserController::registerView');
        $routes->get('signup','User\UserController::signupView');
    });
});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
