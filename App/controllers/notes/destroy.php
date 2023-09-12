<?php

use Core\Database;

$config = require base_path('App/Config.php');
$db = new Database($config['database']);

$currentUserId = 1;
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

