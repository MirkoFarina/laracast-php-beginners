<?php 

view("about.view.php", [
    "heading" => 'Hello ' . ($_SESSION['name'] ?? 'Guest'),
    'message' => 'this is the page about me'
]);