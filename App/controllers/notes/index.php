<?php 

$config = require('../App/Config.php');
$db = new Database($config['database']);

$heading = 'My Notes';
$message = 'This is the page of notes';

$notes = $db->query('Select * from notes where user_id = 1')->get();

require '../views/notes/index.view.php';