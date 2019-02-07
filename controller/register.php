<?php
require('/app/model/register.php');
require(__ROOT__ . 'view/register_form.php');

 $errors = 10;

if (isset($_POST['submit'])) {

    $user['username'] = $_POST['userlogin'];
    $user['password'] = $_POST['password'];
    $user['confirmpassword'] = $_POST['confirm_password'];
    $user['email'] = $_POST['usermail'];

    $register = new Register();


    $errors = $register->registerUser($user);
    ob_clean();

    if ($errors == 1){
        $message = 'Login must be between 5 to 25 character !';
        header("Location: /?page=landing&action=register&msg=".$message);
        exit;
    }
    if ($errors == 2){
        $message = 'Password must be between 8 to 25 caracters';
        header("Location: /?page=landing&action=register&msg=".$message);
        exit;
    }
    if ($errors == 3){
        $message = 'Password confirmation must match your password';
        header("Location: /?page=landing&action=register&msg=".$message);
        exit;
    }
    if ($errors == 4){
        $message = 'Invalid email';
        header("Location: /?page=landing&action=register&msg=".$message);
        exit;
    }
    if ($errors == 5){
        $message = 'User name already exist';
        header("Location: /?page=landing&action=register&msg=".$message);
        exit;
    }
    if ($errors == 6){
        $message = 'User mail already exist';
        header("Location: /?page=landing&action=register&msg=".$message);
        exit;
    }
}

?>