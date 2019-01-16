<?php
/**
 * User: abbenham
 * Date: 15/01/2019
 * Time: 16:48
 */

require('/app/mvc/model.php');

class GetComs extends Model {
    function __construct()
    {
        parent::__construct();
    }

    function ret ($com_img_id) {
        $sql = "SELECT * FROM `comment` WHERE `com_img_id` = " . $com_img_id . " ORDER BY `comment`.`com_timestamp` DESC";
        $ret = self::$bdd->query($sql)->fetchAll();
        echo json_encode($ret);

    }
}