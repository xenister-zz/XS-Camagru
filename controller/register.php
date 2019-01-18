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

    $register = new Register();

    $errors = $register->registerUser($user);
    if ($errors == 1)
        echo"<script>alert('Login must be between 5 to 25 character !')</script>";
    if ($errors == 2)
        echo"<script>alert('Password must must be between 8 to 25 caracters')</script>";
    if ($errors == 3)
        echo"<script>alert('Password confirmation must match your password')</script>";
    if ($errors == 4)
        echo"<script>alert('Invalid email')</script>";
    if ($errors == 5)
        echo"<script>alert('User name already exist')</script>";
    if ($errors == 6)
        echo"<script>alert('User mail already exist')</script>";
}
/*
*/
