<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/env.php');
require_once(__ROOT__.'/config/database_config.php');
require_once(__ROOT__.'/config/user_config.php');
require_once(__ROOT__.'/config/table_config.php');

echo "STARTING" . "<br/><br/>";

$DB = new Database();

echo "NEW DB OK" . "<br/><br/>";

if ($DB->drop_Db() == FALSE)
    echo "drop_DB Error !" . "<br/>";
else
    echo "drop_DB OK !" . "<br/>";

echo "AFTER DROP" . "<br/><br/>";

if ($DB->create_Db() == FALSE)
    echo "create_DB Error !" . "<br/>";
else {
    echo "create_DB OK !" . "<br/>";

    try {
        $table = new Tablebase();
    } catch (Exception $e) {
        echo 'Error' . $e->getMessage() . '<br/>';
    }

    echo 'New User Tablebase Created' . '<br/>';
    try {
        $table->create_Tables();
    } catch (Exception $e) {
        echo 'Error : ' . $e->getMessage() . '<br/>';
    }

}



?>