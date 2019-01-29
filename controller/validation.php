<?php

require('/app/model/register.php');

if (isset($_GET['user'])){
    $value = array();
    $validation = new Register();


    $value['user'] = $_GET['user'];
    $value['token'] = $_GET['token'];

    if ($validation->checkValidation($value)) {
        require(__ROOT__ . 'view/validation.php');
    } else
        require(__ROOT__ . 'view/validationerror.php');

}






?>


