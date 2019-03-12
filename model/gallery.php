<?php
/**
 * User: abbenham
 * Date: 14/01/2019
 * Time: 14:46
 */

require('/app/mvc/model.php');

class Gallery extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getImages () {
        $sql = "SELECT * FROM `image` ORDER BY com_timestamp DESC";
        $ret = self::$bdd->query($sql);
        echo json_encode($ret->fetchAll());
    }
    public function getUserPage () {
        $sql = "SELECT * FROM `image` WHERE user_id LIKE " . $_SESSION['user_id'] . " ORDER BY com_timestamp DESC";
//        echo $sql;
        $ret = self::$bdd->query($sql);
        echo json_encode($ret->fetchAll());
    }
    public function getUserName ($id) {
        $sql = "SELECT user_name FROM `user` WHERE user_id LIKE " . $id;
        $ret = self::$bdd->query($sql);
        print_r($ret->fetchAll()[0]['user_name']);
    }
}
