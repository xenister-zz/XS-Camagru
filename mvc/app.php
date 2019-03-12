<?php

require_once(__ROOT__ . 'config/database.php');

class app {

    private function route() {
        $pages = array('landing', 'home');

//        if (!in_array($_GET['page'], $pages)) {
//            echo "bad";
//            exit;
//        }

        if (!empty($_GET['page']) && file_exists( __ROOT__.'controller/'.$_GET['page'].'.php')) {
            include __ROOT__.'controller/'.$_GET['page'].'.php';
        } else {
            include __ROOT__.'controller/home.php';
        }
    }
    public function run() {
        if (isset($_SESSION['login']) | !isset($_SESSION['login'])) {
            require_once(__ROOT__ . 'public/header.php');
            $this->route();
//            require_once(__ROOT__ . 'public/footer.html');
        } else {
//            include __ROOT__.'controller/landing.php';
        }
    }
}

