<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();
// $session = Services::session();
// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Route::index');
// $routes->get('inicio', 'Route::index');
//Rutas del sistema
$routes->add('usuarios', 'Route::usuarios');
$routes->add('tablas', 'Route::tablas');
$routes->add('reportes', 'Route::reportes');
$routes->add('novedades', 'Route::novedades');
$routes->add('graficas', 'Route::graficas');
$routes->add('pruebapdf', 'Pdf::pruebapdf');
$routes->add('pruebasinternas', 'RegistroTabla::calculosPrueba');
// $routes->add('buscador/(:any)', 'Route::buscador');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
