<?php

require('/app/model/coms.php');

if ($_GET['page'] == 'home' | $_GET['page'] == 'user') {

    if ($_POST['action'] == 'addCom') {

        if (isset($_SESSION['login']) && ($_SESSION['access_lvl'] >= 1)) {

            $com = new Comment();

            $img_id = $_POST['img_id'];
            $content = $_SESSION['login'] . " : " . $_POST['content'];

            $com->addCom($img_id, $content);
        }
        else {
            ob_clean();
            $message = "You need to be login to post comment !";
            header("Location: /?page=validation&info=needlog&msg=".$message);
        }

    }

    if ($_POST['action'] == 'getCom') {

        $com = new Comment();

        $img_id = $_POST['img_id'];

        $com->getCom($img_id);
    }

}

?>