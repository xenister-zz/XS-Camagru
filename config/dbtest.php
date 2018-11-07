<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/env.php');
require_once(__ROOT__.'/config/database_config.php');
require_once(__ROOT__.'/config/user_config.php');
require_once(__ROOT__.'/config/table_config.php');
require_once(__ROOT__.'/config/insertTo.class.php');
require_once(__ROOT__.'/config/selectFrom.class.php');

echo "STARTING" . PHP_EOL . PHP_EOL;

$DB = new Database();

echo "NEW DB OK" . PHP_EOL . PHP_EOL;

//if ($DB->drop_Db() == FALSE)
if (0 == 1)
    echo "drop_DB Error !" . PHP_EOL;
else
    echo "drop_DB OK !" . PHP_EOL;

echo "AFTER DROP" . PHP_EOL . PHP_EOL;

if ($DB->create_Db() == FALSE)
    echo "create_DB Error !" . PHP_EOL;
else {
    echo "create_DB OK !" . PHP_EOL;

    try {
        $table = new Tablebase();
    } catch (Exception $e) {
        echo 'Error' . $e->getMessage() . PHP_EOL;
    }

    echo 'New User Tablebase Created' . PHP_EOL;
    try {
        $table->create_Tables();
    } catch (Exception $e) {
        echo 'Error : ' . $e->getMessage() . PHP_EOL;
    }

}

echo "====================" . PHP_EOL;
$select = new select();
$select->Doo();

?>