<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ;


require base_path('router/web.php'); 
routeToController($uri,$routes);