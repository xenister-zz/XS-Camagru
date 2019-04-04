<?php
ob_start();
session_start();

define('__ROOT__', '/app/');
define('NL', '</br>');

require_once(__ROOT__ . 'config/database.php');
//require_once(__ROOT__ . 'public/header.php');
require_once(__ROOT__ . 'mvc/app.php');

$app = new app();
$app->run();


?>