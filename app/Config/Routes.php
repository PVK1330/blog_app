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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'admin\Login::login');
$routes->get('signup', 'admin\Login::signup');
$routes->post('/login_action', 'admin\Login::login_action');
$routes->post('/insert', 'admin\Login::insert');
$routes->get('/forget_password', 'admin\Login::forget');
$routes->get('/admin', 'admin\Admin::index');



// Blog
$routes->get('/admin/create', 'admin\Admin::create');
$routes->get('/admin/dashboard', 'admin\Admin::index');
$routes->get('admin/logout', 'admin\Login::logout');
$routes->get('admin/addCategory', 'admin\Admin::addCategory');
$routes->get('admin/blogs', 'admin\Admin::blogs');
$routes->post('admin/store-category', 'admin\Admin::storeCategory');
$routes->post('admin/store', 'admin\Admin::store');
$routes->delete('admin/delete/(:num)', 'admin\Admin::delete/$1');
$routes->get('admin/edit/(:num)', 'admin\Admin::edit/$1');
$routes->post('admin/update', 'admin\Admin::update');
$routes->get('admin/category', 'admin\Admin::categories');
$routes->delete('admin/category/delete/(:num)', 'admin\Admin::deleteCategory/$1');
$routes->post('admin/category/update', 'admin\Admin::updateCategory');



$routes->get('/home', 'frontend\Home::index');
$routes->get('blog/view/(:num)', 'frontend\Home::view/$1');
