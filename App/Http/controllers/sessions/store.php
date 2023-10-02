<?php

use Core\Authenticator;
use App\Http\Forms\LoginForm;

$form = new LoginForm();
$auth = new Authenticator();

if ($form->validate($_POST['email'], $_POST['password'])) {

    if ($auth->attempt($_POST['email'], $_POST['password'])) {
        redirect('/');
    };

    $form->error('email','Email o password errati, riprova');
};

return view('/sessions/create.view.php', [
    'errors' => $form->errors()
]);
