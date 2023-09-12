<?php

$_SESSION['name'] = 'Mirko';
view('index.view.php',[
    'heading' => 'Home',
    'message' => 'Welcome to the home page'
]);
