<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ;

$routes = [
    '/' => '../App/controllers/index.php',
    '/about' => '../App/controllers/about.php',
    '/contact' => '../App/controllers/contact.php',
    '/notes' => '../App/controllers/notes/index.php',
    '/note/create' => '../App/controllers/notes/create.php',
    '/note' => '../App/controllers/notes/show.php'
];

routeToController($uri,$routes);