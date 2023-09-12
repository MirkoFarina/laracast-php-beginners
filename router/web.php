<?php
// $routes = [
//     '/' => 'App/controllers/index.php',
//     '/about' => 'App/controllers/about.php',
//     '/contact' => 'App/controllers/contact.php',
//     '/notes' => 'App/controllers/notes/index.php',
//     '/note/create' => 'App/controllers/notes/create.php',
//     '/note' => 'App/controllers/notes/show.php'
// ];

$router->get('/','App/controllers/index.php');
$router->get('/about','App/controllers/about.php');
$router->get('/contact','App/controllers/contact.php');


$router->get('/notes','App/controllers/notes/index.php');
$router->get('/note','App/controllers/notes/show.php');
$router->delete('/note','App/controllers/notes/destroy.php');
$router->get('/note/create','App/controllers/notes/create.php');
$router->post('/notes','App/controllers/notes/store.php');
$router->delete('/note','App/controllers/notes/destroy.php');