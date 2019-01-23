<?php

require('/app/model/register.php');
require(__ROOT__ . 'view/register_form.php');

echo "<script>console.log('Login to 25 dgdgdfdfd !')</script>";

if (isset($_POST['submit'])) {

    //print_r("TONTON");
    //print_r($_POST);
    echo "<script>console.log('Login to 25 character !')</script>";

    $user['username'] = $_POST['userlogin'];
    $user['password'] = $_POST['password'];
    $user['confirmpassword'] = $_POST['confirm_password'];
    $user['email'] = $_POST['usermail'];
//
//    echo $_POST['userlogin'];

//echo"<script>console.log(\"";
//echo $user['username']."\")</script>";

    $register = new Register();

//    $errors = $register->registerUser($user);
//    if ($errors == 1)
//        echo"<script>alert('Login must be between 5 to 25 character !')</script>";
//    if ($errors == 2)
//        echo"<script>alert('Password must be between 8 to 25 caracters')</script>";
//    if ($errors == 3)
//        echo"<script>alert('Password confirmation must match your password')</script>";
//    if ($errors == 4)
//        echo"<script>alert('Invalid email')</script>";
//    if ($errors == 5)
//        echo"<script>alert('User name already exist')</script>";
//    if ($errors == 6)
//        echo"<script>alert('User mail already exist')</script>";


    $errors = $register->registerUser($user);
    if ($errors < 5){
        echo "0";
    }
    if ($errors == 5) {
        echo "1";
        //echo"<script>console.log('Login must be between 5 to 25 character !')</script>";
    }
    if ($errors == 6){
        echo "25555";
        //echo"<script>console.log('Login must be between 5 to 25 character !')</script>";
    }

}
?>