<?php

require('/app/model/register.php');
require(__ROOT__ . 'view/register_form.php');

if (isset($_POST['submit'])) {

    //print_r("TONTON");
    //print_r($_POST);

    $user['username'] = $_POST['userlogin'];
    $user['password'] = $_POST['password'];
    $user['confirmpassword'] = $_POST['confirm_password'];
    $user['email'] = $_POST['usermail'];

    echo strlen($user['username']).PHP_EOL;
    echo strlen($user['password']).PHP_EOL;
    echo strlen($user['confirmpassword']).PHP_EOL;
    echo ($user['email']).PHP_EOL;

    //echo "EMIL".filter_var($user['email'], FILTER_VALIDATE_EMAIL);

    $register = new Register();

    //print_r($user);

    $errors = $register->registerUser($user);
    print_r($errors);
}
/*
*/
