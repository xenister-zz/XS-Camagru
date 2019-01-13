<?php
/**
 * User: abbenham
 * Date: 13/01/2019
 * Time: 13:50
 */
require('/app/v1/model/login.php');

$login= new Login();

$user['login'] = "'".$_POST['login']."'";
$user['password'] = "'".$_POST['password']."'";
$login->log($user);
