<?php

use Core\Authenticator;
use App\Http\Forms\LoginForm;


$auth = new Authenticator();
$form = LoginForm::validate($attributes = ['email' => $_POST['email'], 'password' => $_POST['password']]);

$singedIn = (new Authenticator())->attempt($attributes['email'], $attributes['password']);
if (!$singedIn) $form->error('email', 'No matching found whit this values, try again')->throw();

redirect('/');

