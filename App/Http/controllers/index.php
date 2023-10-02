<?php

view('index.view.php',[
    'heading' => 'Home',
    'message' =>  $_SESSION['user']['email'] ?? false ? 'Welcome to the home page ' . $_SESSION['user']['email'] : 'Log in'
]);
