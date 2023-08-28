<?php
$config = require('../App/Config.php');
$db = new Database($config['database']);
$currentUserId = 1;
$note = $db->query(
    'Select * from notes where id = :id',
    ['id' => $_GET['id']]
)->findOrFail();

authorize($note['user_id'] === $currentUserId);

$heading = 'Note';


require '../views/note.view.php';
