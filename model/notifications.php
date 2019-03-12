<?php

require('/app/config/database.php');
require('/app/mvc/model.php');

class Notifications extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($user) {
        $sql = "SELECT user_id FROM `user` WHERE user_name LIKE '" . $user . "'";
        $userId = self::$bdd->query($sql)->fetchColumn(0);
        $sql = "SELECT * FROM `notifications` WHERE user_id LIKE '" . $userId . "'";
        $notifs = self::$bdd->query($sql)->fetchAll();
        header('Content-Type: application/json');
        echo json_encode($notifs);
    }
    public function addNotification($message, $target_type, $target_id) {
        $sql = "INSERT INTO `notifications`(`message`, `user_id`, `target_type`, `target_id`) VALUES ('" . $message . "', '" . $user_id . "', '" . $target_type . "', '" . $target_id . "')";
        echo $sql;
        self::$bdd->exec($sql);
    }
    public function delete ($id) {
        $sql = "DELETE FROM `notifications` WHERE `notifications`.`ntf_id` = " . $id;
        echo $sql;
        self::$bdd->exec($sql);
    }
}
