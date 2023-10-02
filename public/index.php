<?php

use Core\FormException;
use Core\Router;
use Core\Session;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/function.php';


spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path($class . '.php');
});
 
require base_path('App/bootstrap.php');

$router = new Router();

$routes = require base_path('router/web.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ;
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
try {
$router->route($uri, $method);

}catch (FormException $e) {
    Session::flash('errors', $e->errors);
    Session::flash('old_attributes', $e->old);
    // redirect to previous url
    return redirect($router->previousUrl());
}

// reset flash message after change page one times after redirect
Session::unflash();