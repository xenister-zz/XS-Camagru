<?php

require('/app/model/login.php');
require(__ROOT__ . 'view/landing.php');

if (isset($_POST['submit'])) {

    $login= new Login();
    $ret;

    $user['login'] = "'" . $_POST['login'] . "'";
    $user['password'] = "'" . $_POST['password'] . "'";

    $ret = $login->log($user);

//    echo "<script>console.log('".$ret."')</script>";

    if ($ret == -1) {
        $message = "User name or Email invalid";
//        echo "<script>console.log('".$message."')</script>";
//        header("Location: /?page=landing&msg=".$message);
        header('Location: http://google.fr');
        exit;
    }
    else if ($ret == -2) {
        $message = "Activate your account !";
//        echo "<script>console.log('".$message."')</script>";
        header("Location: /?page=landing&msg=".$message);
        exit;
    }
    else {
        header('Location: /?page=home');
        exit;
    }

}
?>
