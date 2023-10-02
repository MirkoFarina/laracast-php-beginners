<?php

use Core\Authenticator;
use App\Http\Forms\LoginForm;
use Core\Session;

$form = new LoginForm();
$auth = new Authenticator();

if ($form->validate($_POST['email'], $_POST['password'])) {

    if ($auth->attempt($_POST['email'], $_POST['password'])) {
        redirect('/');
    };

    $form->error('email','Email o password errati, riprova');
};

Session::flash('errors',$form->errors());
Session::flash('old_attributes', [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);
return redirect('/login');

