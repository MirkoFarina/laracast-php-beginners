<?php

use Core\Database;
use Core\Validator;

$config = require base_path('App/Config.php');
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    // validation element
    if (Validator::required($_POST['body'])) {
        $errors['body'] = 'A body is required';
    }
    if (Validator::max($_POST['body'], 1000)) {
        $errors['body'] = 'A body can have maximum 1000 characaters';
    }
    if (Validator::min($_POST['body'], 3)) {
        $errors['body'] = 'A body can have min 3 characaters';
    }

    if (!count($errors)) {
        $db->query('INSERT INTO notes(body,user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);

        $success = 'Element saved whit success';
    }
}


view('/notes/create.view.php', [
    'heading' =>  'Create Note',
    'message' => 'This is the page of notes',
    'errors' => $errors ?? null,
    'success' => $success ?? null
]);
