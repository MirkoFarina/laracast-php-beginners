<?php

function dd($el)
{
    echo "<pre>";
    print_r($el);
    echo "</pre>";

    die();
}

/**
 * set active for current route
 */
function active($value) {
    echo $_SERVER['REQUEST_URI'] === $value ? 'bg-gray-900 text-white' :  '';
}

/**
 * router to views
 */
function routeToController($uri,$routes) {
    // if uri exist return controller, exctracted from routes
    if(array_key_exists($uri,$routes)) {
        require $routes[$uri];
    } else {
        abort(404);
    }
}

/**
 * function for get error response
 */
function abort($code = 404) {
    http_response_code($code);
    $heading = 'Error 404';
    require 'views/404.php';

    die();
}