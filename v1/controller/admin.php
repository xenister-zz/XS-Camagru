<?php
/**
 * User: abbenham
 * Date: 12/12/2018
 * Time: 18:05
 */
session_start();

require(__ROOT__ . 'model/admin.php');

$model = new admin();

if ($_GET['action'] == 'kill_session') {
    session_destroy();
    echo "<h1>Session destroyed</h1>";
} else if ($_GET['action'] == 'create_tables') {
    $model->createTables();
    echo "<h1>Tables created</h1>";
} else {
    require(__ROOT__ . 'view/admin.php');
}

?>