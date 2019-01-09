<?php
/**
 * User: abbenham
 * Date: 12/12/2018
 * Time: 18:05
 */

require(__ROOT__ . 'model/admin.php');

$model = new admin();

if ($_GET['action'] == 'create_tables') {
    $model->createTables();
} else {
    require(__ROOT__ . 'view/admin.php');
}

?>