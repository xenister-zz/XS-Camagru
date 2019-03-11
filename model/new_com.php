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

        $message = "
        
        Hello ".$_SESSION['login'].",
        you got a new comment.
        
        ";

        $sql = "INSERT INTO `comment` (`com_img_id`, `com_usr_id`, `com_timestamp`, `com_content`) VALUES ('".$img_id."', '".$_SESSION['user_id']."', CURRENT_TIMESTAMP, '".$com_content."')";
        self::$bdd->exec($sql);
        $userId  = $this->getUser($img_id);
        $this->addNotification($userId, $img_id);
        $this->sendNotifMail($_SESSION['user_mail'], "New Comment", $message);
    }

    private function sendNotifMail($to, $subject, $message) {

        $headers = 'From:Noreply.camagru@gmail.com' . "\r\n"; // Set from headers

        echo "Before mail send ";
        if (mail($to, $subject, $message, $headers))
            echo " + + mail send";// Send our email;
        else
            echo " - - mail not send";
    }
}
?>