<?php

if($_SESSION['user'] ?? false) {
    header('location: /');

    die();
}

view('registration/create.view.php',[
    "heading" => 'Welcome to the page for registrations',
    'message' => 'this is the page for registration me'
]);

