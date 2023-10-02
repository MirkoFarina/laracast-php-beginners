<?php
$router->get('/','index.php');
$router->get('/about','about.php');
$router->get('/contact','contact.php');

/// ****** note
// index,show, delete
$router->get('/notes','notes/index.php')->only('auth');
$router->get('/note','notes/show.php');
$router->delete('/note','notes/destroy.php');
// create
$router->get('/note/create','notes/create.php')->only('auth');
$router->post('/notes','notes/store.php');
// edit
$router->get('/note/edit','notes/edit.php');
$router->patch('/note','notes/update.php');

/// ****** user
$router->get('/register','registration/create.php')->only('guest');
$router->post('/register','registration/store.php');


$router->get('/login','sessions/create.php')->only('guest');
$router->post('/sessions','sessions/store.php')->only('guest');

$router->delete('/sessions','sessions/destroy.php')->only('auth');

