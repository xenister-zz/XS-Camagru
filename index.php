<?php
session_start();

 // User: abbenham
 // Date: 12/12/2018
 // Time: 14:16


define('__ROOT__', '/app/');
define('NL', '</br>');
require_once(__ROOT__ . 'mvc/app.php');

$app = new app();
$app->run();


?>