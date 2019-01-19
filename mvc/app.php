<?php
/**
 * User: abbenham
 * Date: 13/12/2018
 * Time: 15:41
 */
require_once(__ROOT__ . 'config/env.php');

class app {

    private function route() {
        if (!empty($_GET['page']) && file_exists( __ROOT__.'controller/'.$_GET['page'].'.php')) {
            include __ROOT__.'controller/'.$_GET['page'].'.php';
        } else {
            include __ROOT__.'controller/home.php';
        }

    }
    public function run() {
        if (isset($_SESSION['login']) && $_SESSION['login'] != '') {
            require_once(__ROOT__ . 'public/header.php');
            $this->route();
//            require_once(__ROOT__ . 'public/footer.html');
        } else {
            include __ROOT__.'controller/landing.php';
        }
    }
}
