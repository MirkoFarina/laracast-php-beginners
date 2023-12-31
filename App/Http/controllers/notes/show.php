<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUserId = 15;
$note = $db->query(
    'Select * from notes where id = :id',
    ['id' => $_GET['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);


view('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note
]);
