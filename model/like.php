<?php

require('/app/config/database.php');
require('/app/mvc/model.php');

class Like extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function toggleLike($img_id) {
        $id = $this->getUserId($_SESSION['login']);
        $sql = "SELECT * FROM `like` WHERE img_id LIKE '" . $img_id . "' AND user_id LIKE '" . $id . "'";
        $res = self::$bdd->query($sql)->fetchColumn(0);
        if ($res == null) {
            $sql = "INSERT INTO `like`(`img_id`, `user_id`) VALUES ('" . $img_id . "', '" . $id ."')";
            self::$bdd->exec($sql);
            echo json_encode(true);
        } else {
            $sql = "DELETE FROM `like` WHERE `img_id` = '" . $img_id . "' AND `user_id` =  '" . $id ."'";
            self::$bdd->exec($sql);
            echo json_encode(false);
        }
    }
    public function getLike($img_id) {
        $id = $this->getUserId($_SESSION['login']);
        $sql = "SELECT * FROM `like` WHERE img_id LIKE '" . $img_id . "' AND user_id LIKE '" . $id . "'";
        $res = self::$bdd->query($sql)->fetchColumn(0);
        if ($res == null) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }
}
