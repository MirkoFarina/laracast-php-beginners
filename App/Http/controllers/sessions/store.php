<?php

use Core\App;
use Core\Database;
use App\Http\Forms\LoginForm;

$db = App::resolve(Database::class);
$form = new LoginForm();
if (!$form->validate($_POST['email'], $_POST['password'])) {
    return view('/sessions/create.view.php', [
        'heading' => 'Log In',
        'message' => 'This is the page of notes',
        'errors' => $form->errors()
    ]);

};
$user = $db->query('select * from users where email = :email', [
    'email' => $_POST['email']
])->find();

if ($user) {
    if (password_verify($_POST['password'], $user['password'])) {
        login($user);
        header('location: /');

        exit();
    }

    return view('sessions/create.view.php', [
        'errors' => [
            'email' => 'Email o password errati, riprova'
        ]
    ]);

}
