<?php

require('/app/mvc/model.php');

class GetComs extends Model {
    function __construct()
    {
        parent::__construct();
    }

    function ret ($com_img_id) {
        $sql = "SELECT `comment`.`com_id`, `user`.`user_name`, `comment`.`com_content`, `comment`.`com_id` FROM `comment` RIGHT JOIN `user` ON `comment`.`com_usr_id`=`user`.`user_id` WHERE comment.com_img_id = ". $com_img_id ." ORDER BY `comment`.`com_timestamp` DESC";
        $ret = self::$bdd->query($sql)->fetchAll();
        echo json_encode($ret);
    }
}