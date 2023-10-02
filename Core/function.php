<?php

use Core\Response;
use Core\Session;

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
        require base_path($routes[$uri]);
    } else {
        abort(404);
    }
}

/**
 * function for get error response
 */
function abort($code = Response::NOT_FOUND) {
    http_response_code($code);
    $heading = "Error $code";
    require base_path("views/$code.php");

    die();
}

/**
 * if the field is different from value get error
 * @param $status is default on 403 error
 */
function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}


function base_path($path)
{
    return BASE_PATH . $path;
}
function view(string $path, array $attributes = []): void
{
    extract($attributes);
    require base_path('views/' . $path);
}

function redirect($url)
{
    header("location: ${url}");

    exit();
}

function old($key, $default = '')
{
    return Session::get('old_attributes')[$key] ?? $default;
}