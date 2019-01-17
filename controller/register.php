<?php

require('/app/model/register.php');

$register = new Register();

$user['username'] = "'".$_POST['userlogin']."'";
$user['password'] = "'".$_POST['password']."'";
$user['confirmpassword'] = "'".$_POST['confirm_password']."'";
$user['email'] = "'".$_POST['usermail']."'";

$ret = $register->registerUser($user);

if ($ret['errors'] == 1){
    foreach ($ret as $error){
        if ($error != 1) {
            echo $error;
        }
    }
}


/*
*/
