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

$routes->get('/', 'BaseController::index');

$routes->get('error/404', function ()
{
    return view('error/html/error_404');
});

$routes->group('admin', function ($routes){

    $routes->get('','Admin\AdminController::index');
    $routes->post('login','Admin\AdminController::login');
    $routes->get('logout','Admin\AdminController::logout');
    $routes->get('home','Admin\HomeController::index');

    // $routes->group('home',function($routes){
        // $routes->get('adminadd','Admin\HomeController::adminadd');
        // $routes->get('adminchange','Admin\HomeController::adminchange');
        // $routes->get('adminshow','Admin\HomeController::adminshow');
        // $routes->get('productadd','Admin\HomeController::productadd');
        // $routes->get('productlist','Admin\HomeController::productlist');
        // $routes->get('productdel','Admin\HomeController::productdel');
        // $routes->get('memberadd','Admin\HomeController::memberadd');
        // $routes->get('memberlist','Admin\HomeController::memberlist');
        // $routes->get('memberdel','Admin\HomeController::memberdel');
        // $routes->get('appointmentadd','Admin\HomeController::appointmentadd');
        // $routes->get('appointmentlist','Admin\HomeController::appointmentlist');
        // $routes->get('appointmentdel','Admin\HomeController::appointmentdel');
        // $routes->get('doctorlist','Admin\HomeController::doctorlist');
        // $routes->get('doctordel','Admin\HomeController::doctordel');
        // $routes->get('doctoradd','Admin\HomeController::doctoradd');
        // $routes->get('departmentlist','Admin\HomeController::departmentlist');
        // $routes->get('departmentdel','Admin\HomeController::departmentdel');
        // $routes->get('departmentadd','Admin\HomeController::departmentadd');
        // $routes->get('adminrole','Admin\HomeController::adminrole');
        // $routes->get('adminpermission','Admin\HomeController::adminpermission');
        // $routes->get('adminlist','Admin\HomeController::adminlist');
        // $routes->get('welcome','Admin\HomeController::welcome');
    // });
    $routes->group('admin',function($routes){
        $routes->get('list','Admin\Admin\AdminController::list');
        $routes->get('add','Admin\Admin\AdminController::add');
        $routes->post('create','Admin\Admin\AdminController::create');
        $routes->get('edit/(:num)','Admin\Admin\AdminController::edit/$1');
        $routes->post('update/(:num)','Admin\Admin\AdminController::update/$1');
        $routes->get('delete/(:num)','Admin\Admin\AdminController::delete/$1');
    });
    $routes->group('doctor',function($routes){
        $routes->get('list','Admin\Doctor\DoctorController::list');
        $routes->get('add','Admin\Doctor\DoctorController::add');
        $routes->post('create','Admin\Doctor\DoctorController::create');
        $routes->get('edit/(:num)','Admin\Doctor\DoctorController::edit/$1');
        $routes->post('update/(:num)','Admin\Doctor\DoctorController::update/$1');
        $routes->get('delete/(:num)','Admin\Doctor\DoctorController::delete/$1');
        // $routes->get('loginview','Admin\Doctor\DoctorController::loginview');
        // $routes->post('login','Admin\Doctor\DoctorController::login');
    });
    $routes->group('user',function($routes){
        $routes->get('list','Admin\User\UserController::list');
        $routes->get('add','Admin\User\UserController::add');
        $routes->post('create','Admin\User\UserController::create');
        $routes->get('edit/(:num)','Admin\User\UserController::edit/$1');
        $routes->post('update/(:num)','Admin\User\UserController::update/$1');
        $routes->get('delete/(:num)','Admin\User\UserController::delete/$1');
    });
    $routes->group('product',function($routes){
        $routes->get('list','Admin\Product\ProductController::list');
        $routes->get('add','Admin\Product\ProductController::add');
        $routes->post('create','Admin\Product\ProductController::create');
        $routes->get('edit/(:num)','Admin\Product\ProductController::edit/$1');
        $routes->post('update/(:num)','Admin\Product\ProductController::update/$1');
        $routes->get('delete/(:num)','Admin\Product\ProductController::delete/$1');
    });
    $routes->group('department',function($routes){
        $routes->get('list','Admin\Department\DepartmentController::list');
        // $routes->get('add','Admin\Department\DepartmentController::add');
        // $routes->post('create','Admin\Department\DepartmentController::create');
        // $routes->get('edit/(:any)','Admin\Department\DepartmentController::edit/$1');
        // $routes->post('update/(:any)','Admin\Department\DepartmentController::update/$1');
        // $routes->get('delete/(:any)','Admin\Department\DepartmentController::delete/$1');
    });
    $routes->group('appointment',function($routes){
        $routes->get('list','Admin\Appointment\AppointmentController::list');
        $routes->get('add','Admin\Appointment\AppointmentController::add');
        $routes->post('create','Admin\Appointment\AppointmentController::create');
        $routes->get('edit/(:num)','Admin\Appointment\AppointmentController::edit/$1');
        $routes->post('update/(:num)','Admin\Appointment\AppointmentController::update/$1');
        $routes->get('delete/(:num)','Admin\Appointment\AppointmentController::delete/$1');
    });
});

$routes->group('user', function ($routes){
    $routes->get('','User\UserController::index');
    $routes->post('login','User\UserController::login');
    $routes->get('logout','User\UserController::logout');
    $routes->get('productlist','User\UserController::productlist');
    $routes->get('appointmentlist','User\UserController::appointmentlist');
    $routes->get('add/(:num)','User\UserController::add/$1');
    $routes->post('create/(:num)','User\UserController::create/$1');
    $routes->get('deleteAppointment/(:num)','User\UserController::deleteAppointment/$1');

    $routes->get('edit/(:num)','User\UserController::edit/$1');
    $routes->post('update/(:num)','User\UserController::update/$1');
});

$routes->group('doctor', function ($routes){
    $routes->get('','Doctor\DoctorController::index');
    $routes->post('login','Doctor\DoctorController::login');
    $routes->get('logout','Doctor\DoctorController::logout');
    $routes->get('list','Doctor\DoctorController::list');
    $routes->get('check/(:num)','Doctor\DoctorController::check/$1');
    $routes->get('uncheck/(:num)','Doctor\DoctorController::uncheck/$1');
    $routes->get('add/(:num)','Doctor\DoctorController::add/$1');
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
