<?php

require('/app/v1/model/register.php');

$register = new Register();

print_r($_POST);
$user['name'] = "'".$_POST['login']."'";
$user['password'] = "'".$_POST['password']."'";
$user['mail'] = "'".$_POST['email']."'";

$register->addUser($user);

