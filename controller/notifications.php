<?php
/**
 * User: abbenham
 * Date: 12/12/2018
 * Time: 18:05
 */

require('/app/model/notifications.php');

$notifs = new Notifications();

if ($_GET['action'] == 'delete') {
    $notifs->delete($_GET['id']);
} else {
    $notifs->get($_SESSION['login']);
}

?>
