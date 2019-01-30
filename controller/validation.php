<?php

require('/app/model/register.php');

if (isset($_GET['user'])){
    $value = array();
    $validation = new Register();


    $value['user'] = $_GET['user'];
    $value['token'] = $_GET['token'];

    if ($validation->checkValidation($value)) {
        $message = "Your account has been activated";
        require(__ROOT__ . 'view/validation.php');
    } else {
        $message = "Your validation link is invalid or has already been activated !";
        require(__ROOT__ . 'view/validation.php');
    }
}
?>


