<?php
/**
 * User: abbenham
 * Date: 13/12/2018
 * Time: 15:41
 */

namespace Camagru\Mvc;

class app {
    private $set = array();

    private function getRoute () {
        if (!empty($_GET['page']) && file_exists( __ROOT__.'controller/'.$_GET['page'].'.php')) {
            return __ROOT__.'controller/'.$_GET['page'].'.php';
        } else {
            return __ROOT__.'controller/home.php';
        }
    }

    public function run($s) {
        include($this->getRoute());
    }
}
