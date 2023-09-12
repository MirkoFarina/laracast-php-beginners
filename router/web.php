<?php
$router->get('/','App/controllers/index.php');
$router->get('/about','App/controllers/about.php');
$router->get('/contact','App/controllers/contact.php');

/// ****** note
// index,show, delete
$router->get('/notes','App/controllers/notes/index.php')->only('auth');
$router->get('/note','App/controllers/notes/show.php');
$router->delete('/note','App/controllers/notes/destroy.php');
// create
$router->get('/note/create','App/controllers/notes/create.php');
$router->post('/notes','App/controllers/notes/store.php');
// edit
$router->get('/note/edit','App/controllers/notes/edit.php');
$router->patch('/note','App/controllers/notes/update.php');

/// ****** user
$router->get('/register','App/controllers/registration/create.php')->only('guest');
$router->post('/register','App/controllers/registration/store.php');
