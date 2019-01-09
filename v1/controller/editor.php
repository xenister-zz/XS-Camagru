<?php

require(__ROOT__ . 'model/editor.php');

if ($_GET['action'] == 'save') {
} else {
    $q = $_REQUEST['q'];
    echo $q.NL;
    require(__ROOT__ . 'view/editor.php');
}
