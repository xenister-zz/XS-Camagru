<?php

require('/app/v1/model/register.php');

$register = new Register();

$user['name'] = "'".$_POST['login']."'";
$user['password'] = "'".$_POST['password']."'";
$user['mail'] = "'".$_POST['email']."'";
$register->addUser($user);

/*
*/
