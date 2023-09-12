<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentUserId = 3;
$note = $db->query(
    'Select * from notes where id = :id',
    ['id' => $_GET['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);


$db->query('delete from notes where id = :id', [
    'id' => $_POST['id']
]);

//reload to
header('location: /notes');
exit();

