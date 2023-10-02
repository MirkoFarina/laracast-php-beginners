<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);
$errors = [];

// validation element
if (Validator::required($_POST['email'])) {
    $errors['email'] = 'A email is required';
}
if (!Validator::email($_POST['email'])) {
    $errors['email'] = 'Please provide an email address';
}
if (Validator::string($_POST['password'], 7, 255)) {
    $errors['password'] = 'A password can have minimum 7 characaters and  maximum 255 characaters';
}

if (count($errors)) {
    return view('/registration/create.view.php', [
        'heading' => 'Create Note',
        'message' => 'This is the page of notes',
        'errors' => $errors
    ]);
}

$user_exist = $db->query('select * from users where email = :email', [
    'email' => $_POST['email']
])->find();


if ($user_exist) {
    redirect('/');
}

$db->query('INSERT INTO users(email, password) VALUES(:email,:password)', [
    'email' => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
]);

login($user_exist);

redirect('/');

die();
