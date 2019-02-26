<?php

require('/app/mvc/model.php');

class NewCom extends Model {
    function add ($img_id, $com_content) {
        $sql = "INSERT INTO `comment` (`com_img_id`, `com_usr_id`, `com_timestamp`, `com_content`) VALUES ('".$img_id."', '".$_SESSION['user_id']."', CURRENT_TIMESTAMP, '".$com_content."')";
        echo $sql;
        self::$bdd->exec($sql);
    }
}