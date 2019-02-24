<?php

require('/app/model/notifications.php');

$notifs = new Notifications();

if ($_GET['action'] == 'delete') {
    $notifs->delete($_GET['id']);
}else if ($_POST['action'] == 'add') {
    $notifs->add($_POST['message'], $_SESSION['login'], $_POST['target_type'], $_POST['target_id']);
} else if ($_GET['action'] == 'get') {
    $notifs->get($_SESSION['login']);
}

?>
