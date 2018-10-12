<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/env.php');
require_once(__ROOT__.'/config/database_config.php');
require_once(__ROOT__.'/config/user_config.php');

echo "STARTING" . "<br/>";

$DB = new Database();

echo "NEW DB OK" . "<br/>";

if ($DB->drop_Db() == FALSE)
    echo "drop_DB Error !" . "<br/>";
else
    echo "drop_DB OK !" . "<br/>";

echo "AFTER DROP" . "<br/>";

if ($DB->create_Db() == FALSE)
    echo "create_DB Error !" . "<br/>";
else
    echo "create_DB OK !" . "<br/>";

echo "RE DROP AFTER CREATE" . "<br/>";

if ($DB->drop_Db() == FALSE)
    echo "drop_DB Error !" . "<br/>";
else
    echo "drop_DB OK !" . "<br/>";
?>