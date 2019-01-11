<?php
session_start();

 // User: abbenham
 // Date: 12/12/2018
 // Time: 14:16


define('__ROOT__',dirname(__FILE__) . '/v1/');
define('NL', '</br>');

require_once(__ROOT__ . 'config/env.php');
require_once(__ROOT__ . 'public/header.html');
require_once(__ROOT__ . '../vendor/autoload.php');

$app = new \Camagru\Mvc\app();

$app->run('good');

require_once(__ROOT__ . 'public/footer.html');

?>