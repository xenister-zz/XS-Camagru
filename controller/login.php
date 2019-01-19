<?php

require('/app/model/login.php');
require(__ROOT__ . 'view/landing.php');

if (isset($_POST['submit'])) {

    $login= new Login();
    $patate = "patate";

    $user['login'] = "'" . $_POST['login'] . "'";
    $user['password'] = "'" . $_POST['password'] . "'";

    echo "<script> console.log(\"".$_POST['login']."\");</script>";
    echo "<script> console.log(\"".$_POST['password']."\");</script>";

    if ($login->log($user) == -1) {
        echo "<script> console.log(\"papapapapapaap\");</script>";
    }
    else {
        echo "success";
        echo "<script> location.assign('?page=user');</script>";
    }

}
