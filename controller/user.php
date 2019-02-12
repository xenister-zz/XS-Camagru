<?php
/**
 * User: abbenham
 * Date: 13/01/2019
 * Time: 14:14
 */

if (isset($_SESSION['login']) && ($_SESSION['access_lvl'] >= 1)) {

    require(__ROOT__ . 'view/user.php');

}


?>


