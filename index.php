<?php
session_start();

 // User: abbenham
 // Date: 12/12/2018
 // Time: 14:16


define('__ROOT__', '/app/');
define('NL', '</br>');
echo "ECHO0".NL;
require_once(__ROOT__ . 'config/env.php');
require_once(__ROOT__ . 'public/header.php');
require_once(__ROOT__ . 'mvc/app.php');

$app = new app();
echo "ECHO1".NL;
$app->run();
echo "ECHO2".NL;

//require_once(__ROOT__ . 'public/footer.html');

?>