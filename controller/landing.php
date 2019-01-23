<?php
/**
 * User: abbenham
 * Date: 17/01/2019
 * Time: 12:35
 */


if ($_GET['action'] == 'register') {
    require(__ROOT__ . 'controller/register.php');
} else {
    require(__ROOT__ . 'controller/login.php');
}
