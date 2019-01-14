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

    function getImages () {
        $sql = "SELECT * FROM `image` ORDER BY com_timestamp DESC";
        $ret = self::$bdd->query($sql);
        echo json_encode($ret->fetchAll());
    }
}
