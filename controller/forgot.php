<?php

require('/app/model/forgot.php');
require(__ROOT__ . 'view/forgot.php');




if (isset($_POST['submit'])) {

    $forgot = new Forgot();

    $mail = $_POST['mail'];

    if (!$ret = $forgot->mailCheck($mail)) {
        ob_clean();
        $message = "Invalid Mail";
        header("Location: /?page=forgot&msg=".$message);
        exit;
    }
    else {
        ob_clean();
        header('Location: /?page=home');
        exit;
    }

}

?>