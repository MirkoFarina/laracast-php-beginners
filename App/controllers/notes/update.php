<?php

use Core\App;
use Core\Validator;
use Core\Database;


$db = App::resolve(Database::class);

$currentUserId = 1;
$note = $db->query(
    'Select * from notes where id = :id',
    ['id' => $_POST['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);
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

if (count($errors)) {
    return view('/notes/edit.view.php', [
        'heading' =>  'Create Note',
        'message' => 'This is the page of notes',
        'note' => $note,
        'errors' => $errors
    ]);
}

$db->query('update notes set body = :body where id = :id',[
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);


header('location: /notes');
die();
