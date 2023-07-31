<?php 
$config = require('../App/Config.php');
$db = new Database($config['database']);

$note = $db->query('Select * from notes where id = :id',['id' => $_GET['id']])->fetch();

$heading = 'Note';


require '../views/note.view.php';