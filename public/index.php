<?php

require '../function.php';
require '../router/web.php';
require '../App/Database.php';


$config = require('../App/Config.php');

$db = new Database($config['database']);

 // if i get one el i use fatch and don't fatch all, for can access to array dirrectly
$indicators = $db->query("select * from indicators")->fetchAll();


echo "<ul>";
foreach ($indicators as $indicator) {
    echo "<li>" .  $indicator['name'] . "</li>";
}
echo "</ul>";
