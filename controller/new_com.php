<?php
/**
 * User: abbenham
 * Date: 15/01/2019
 * Time: 13:53
 */

if (isset($_SESSION['login']) && ($_SESSION['access_lvl'] >= 1)) {

    require('/app/model/new_com.php');

    $newCom = new NewCom();

    $newCom->add($_POST['img_id'], $_POST['com_content']);
}
