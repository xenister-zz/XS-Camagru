<?php
/**
 * Created by PhpStorm.
 * User: phenicien
 * Date: 15/01/2019
 * Time: 13:54
 */

require('/app/mvc/model.php');

class NewCom extends Model {
    function add ($img_id, $com_content) {
        $id = parent::randomId();
        while (parent::exists('comment', 'com_id', $id)) {
            $id = parent::randomId();
        }
        $sql = "SELECT `user_id` FROM `user` WHERE `user_name` LIKE '".$_SESSION['login']."'";
        $user_id = self::$bdd->query($sql)->fetchAll()[0]['user_id'];

        $sql = "INSERT INTO `comment` (`com_id`, `com_img_id`, `com_usr_id`, `com_timestamp`, `com_content`)
VALUES ('". $id ."', '".$img_id."', '".$user_id."', CURRENT_TIMESTAMP, '".$com_content."');";
        self::$bdd->exec($sql);
    }

}