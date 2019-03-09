<?php

require('/app/model/login.php');
require(__ROOT__ . 'view/landing.php');

if (isset($_POST['submit'])) {

    $login= new Login();
    $ret;

    $user['login'] = "'" . $_POST['login'] . "'";
    $user['password'] = "'" . $_POST['password'] . "'";

    $ret = $login->log($user);

    ob_clean();
    if ($ret == -1) {
        $message = "User name or password invalid";
        header("Location: /?page=landing&msg=".$message);
        exit;
    }
    else if ($ret == -2) {
        $message = "Activate your account !";
        header("Location: /?page=landing&msg=".$message);
        exit;
    }
    else {
        header('Location: /?page=home');
        exit;
    }

}
?>
