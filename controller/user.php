<?php

if (isset($_SESSION['login']) && ($_SESSION['access_lvl'] >= 1)) {

    require_once(__ROOT__ . 'view/user.php');
}

$errors = 10;

if (isset($_POST['submit'])) {

    require('/app/model/user.php');

    $user['username'] = $_POST['username'];
    $user['password'] = $_POST['password'];
    $user['confirmpassword'] = $_POST['confirm_password'];
    $user['email'] = $_POST['usermail'];
    $user['master_pass'] = $_POST['master_pass'];

    print_r($user);

    $register = new User();


    $errors = $register->checkEditProfil($user);
    ob_clean();

    if ($errors == 1){
        $message = 'Username must be between 5 to 25 character !';
        header("Location: /?page=user&action=update&info=username&msg=".$message);
        exit;
    }
    if ($errors == 2){
        $message = 'Password must be between 8 to 25 caracters';
        header("Location: /?page=user&action=update&info=password&msg=".$message);
        exit;
    }
    if ($errors == 3){
        $message = 'Password confirmation must match your password';
        header("Location: /?page=user&action=update&info=password&msg=".$message);
        exit;
    }
    if ($errors == 4){
        $message = 'Invalid email';
        header("Location: /?page=user&action=update&info=mail&msg=".$message);
        exit;
    }
    if ($errors == 5){
        $message = 'User name already exist';
        header("Location: /?page=user&action=update&info=username&msg=".$message);
        exit;
    }
    if ($errors == 6){
        $message = 'User mail already exist';
        header("Location: /?page=user&action=update&info=mail&msg=".$message);
        exit;
    }
    if ($errors == 7){
        $message = 'Current password incorrect';
        header("Location: /?page=user&action=update&info=current_pass&msg=".$message);
        exit;
    }

    header("Location: /?page=user");
}

?>


