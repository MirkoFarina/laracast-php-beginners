<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query(
    'Select * from notes where id = :id',
    ['id' => $_GET['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('/notes/edit.view.php', [
    'heading' =>  'Create Note',
    'message' => 'This is the page of notes',
    'note' => $note,
    'errors' => []
]);
