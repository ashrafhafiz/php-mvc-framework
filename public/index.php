<?php

/**
 * Front controller
 *
 * PHP version 5.4
 */

// Require the Posts controller class
// require '../App/Controllers/Posts.php';

/**
 * Routing
 */
// require '../Core/Router.php';
// phpinfo();
require_once dirname(__DIR__) . '\vendor\autoload.php';

/**
 * Autoloader, replaced by composer.json autoload section
 */
// spl_autoload_register(function ($class) {
//     $root = dirname(__DIR__);       // get the parent directory
//     $file = $root . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
//     if (is_readable($file)) {
//         require $file;
//     }
// });



/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('home', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
// $router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->add('{controller}/{action}');
// $router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);


// Display the routing table
//echo '<pre>';
//var_dump($router->getRoutes());
//echo '</pre>';


// Match the requested route
// $url = $_SERVER['QUERY_STRING'];

// if ($router->match($url)) {
//     echo '<pre>';

//     var_dump($router->getParams());
//     echo '<hr>';

//     echo '</pre>';
// } else {
//     echo "404 - No route found for URL '$url'";
// }

// display the routing table
// echo '<pre>';
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// echo '<hr>';
// // Match the requested route
// $url = $_SERVER['QUERY_STRING'];

// if ($router->match($url)) {
//     echo '<pre>';
//     var_dump($router->getParams());
//     echo '</pre>';
// } else {
//     echo "No route found for URL '$url'";
// }

// echo '</pre>';

// echo '<pre>';
$router->dispatch($_SERVER['QUERY_STRING']);
// echo '</pre>';
