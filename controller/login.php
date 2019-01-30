<?php

require('/app/model/login.php');
require(__ROOT__ . 'view/landing.php');

if (isset($_POST['submit'])) {

    $login= new Login();

    $user['login'] = "'" . $_POST['login'] . "'";
    $user['password'] = "'" . $_POST['password'] . "'";

    if ($login->log($user) == -1) {
        header('Location: /?page=landing');
    }
    else {
        header('Location: /');
    }

}
