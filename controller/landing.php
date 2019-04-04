<?php


if ($_GET['action'] == 'register') {
    require(__ROOT__ . 'controller/register.php');
} else {
    require(__ROOT__ . 'controller/login.php');
}
