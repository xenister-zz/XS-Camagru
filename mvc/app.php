<?php
/**
 * User: abbenham
 * Date: 13/12/2018
 * Time: 15:41
 */

class app {
    public function run() {
        if (!empty($_GET['page']) && file_exists( __ROOT__.'controller/'.$_GET['page'].'.php')) {
            include __ROOT__.'controller/'.$_GET['page'].'.php';
        } else {
            include __ROOT__.'controller/home.php';
        }
    }
}
