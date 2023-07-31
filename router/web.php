<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ;

$routes = [
    '/' => '../App/controllers/index.php',
    '/about' => '../App/controllers/about.php',
    '/contact' => '../App/controllers/contact.php',
    '/notes' => '../App/controllers/notes.php',
    '/note' => '../App/controllers/note.php'
];

routeToController($uri,$routes);