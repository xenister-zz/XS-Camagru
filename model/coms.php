<?php

require('/app/mvc/model.php');

class GetComs extends Model {
    function __construct()
    {
        parent::__construct();
    }

    public function getCom($img_id) {

        $sql = "SELECT * FROM `comment` WHERE `com_img_id` = " . $img_id . " ORDER BY `com_timestamp` DESC";
        $ret = self::$bdd->query($sql)->fetchAll();
        echo json_encode($ret);

    }

    private function addCom($img_id, $com_content) {
        $id = parent::randomId();
        while (parent::exists('comment', 'com_id', $id)) {
            $id = parent::randomId();
        }
        $sql = "SELECT `user_id` FROM `user` WHERE `user_name` LIKE '".$_SESSION['login']."'";
        $user_id = self::$bdd->query($sql)->fetchAll()[0]['user_id'];

        $sql = "INSERT INTO `comment` (`com_id`, `com_img_id`, `com_usr_id`, `com_timestamp`, `com_content`) VALUES ('". $id ."', '".$img_id."', '".$user_id."', CURRENT_TIMESTAMP, '".$com_content."');";
        self::$bdd->exec($sql);
    }
}

?>