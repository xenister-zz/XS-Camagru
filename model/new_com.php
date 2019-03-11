<?php

require('/app/mvc/model.php');

class NewCom extends Model {
    private function getUser ($imgId) {
        $sql = "SELECT user_id FROM `image` WHERE img_id LIKE '" . $imgId . "'";
        $userId = self::$bdd->query($sql)->fetchColumn(0);
        return $userId;
    }
    private function addNotification($user_id, $imgId) {
        $sql = "INSERT INTO `notifications`(`message`, `user_id`, `target_type`, `target_id`) VALUES ('" . "Vous avez recu un nouveau commentaire" . "', '" . $user_id . "', 'comment', '" . $imgId . "')";
        self::$bdd->exec($sql);
    }
    public function add ($img_id, $com_content) {
        $sql = "INSERT INTO `comment` (`com_img_id`, `com_usr_id`, `com_timestamp`, `com_content`) VALUES ('".$img_id."', '".$_SESSION['user_id']."', CURRENT_TIMESTAMP, '".$com_content."')";
        self::$bdd->exec($sql);
        $userId  = $this->getUser($img_id);
        $this->addNotification($userId, $img_id);
    }
}