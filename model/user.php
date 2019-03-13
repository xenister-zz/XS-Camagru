<?php

    require('/app/config/database.php');
    require('/app/mvc/model.php');

    class User extends Model {

        public static $error = 0;

        public function __construct()
        {
            parent::__construct();
        }

        public function checkEditProfil($value) {

            if ($this->checkMasterPass($value['master_pass'])) {
                if (!empty($value['username']) && !$this->updateUsername($value['username']))
                    return self::$error;
                if (!empty($value['password']) && !$this->updatePassword($value['password'], $value['confirmpassword']))
                    return self::$error;
                if (!empty($value['email']) && !$this->updateEmail($value['email']))
                    return self::$error;
            }
            return self::$error;
        }

        public function mailNotif() {

            if ($_SESSION['mail_notif'] == 1) {
                $sql = "UPDATE user SET mail_notif = 0 WHERE user_name = "."'".$_SESSION['login']."'". ";";
                self::$bdd->query($sql);
                $_SESSION['mail_notif'] = 0;
            } else {
                $sql = "UPDATE user SET mail_notif = 1 WHERE user_name = "."'".$_SESSION['login']."'". ";";
                self::$bdd->query($sql);
                $_SESSION['mail_notif'] = 1;
            }
        }

        private function checkMasterPass($value) {

            if (empty($value) | (strlen($value) < 8 | strlen($value) > 25)) {
                self::$error = 7;
                return false;
            }

            $sql = "SELECT * FROM `user` WHERE `user_name` LIKE " . "'".$_SESSION['login']."'" . ";";
            $ret = self::$bdd->query($sql);
            $fetch = $ret->fetchAll();

            $SALTED = DUSEL.$value.DUSEL;
            $hpassword = hash('md5', $SALTED);

            if ($fetch[0]['user_password'] == $hpassword) {
                return true;
            }
            return false;
        }

        private function updateUsername($username) {

            if (strlen($username) < 5 | strlen($username) > 25) {
                self::$error = 4;
                return false;
            }

            if ($this->exists('user', 'user_name' , "'".$username."'")) {
                self::$error = 5;
                return false;
            }

            $oldusername = $_SESSION['login'];

            $sql = "UPDATE user SET user_name = "."'".$username."'"." WHERE user_name = "."'".$_SESSION['login']."'". ";";
            self::$bdd->query($sql);

            $_SESSION['login'] = $username;

            $subject = "User name modification";
            $message = "
            
            Hello ".$_SESSION['login'].",
            you have successfully updated your User name.
            
            
            -----------------------------
            Username: ".$_SESSION['login']."
            Former User name: ".$oldusername."
            -----------------------------
            
            ";

            $this->sendInfoMail($_SESSION['user_mail'], $subject, $message);
        }

        private function updatePassword($password, $confirm_pass) {

            if (strlen($password) < 8 | strlen($password) > 25) {
                self::$error = 2;
                return false;
            }

            if ($password != $confirm_pass) {
                self::$error = 3;
                return false;
            }

//            $sql = "SELECT * FROM `user` WHERE `user_name` LIKE " . "'".$_SESSION['login']."'" . ";";


            $SALTED = DUSEL.$password.DUSEL;
            $hpassword = hash('md5', $SALTED);

            $sql = "UPDATE user SET user_password = "."'".$hpassword."'"." WHERE user_name = "."'".$_SESSION['login']."'". ";";
            self::$bdd->query($sql);

        }

        private function updateEmail($mail) {

            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
                self::$error = 4;
                return false;
            }

            if ($this->exists('user', 'user_mail' , "'".$mail."'")){
                self::$error = 6;
                return false;
            }

            $oldmail = $_SESSION['user_mail'];

            $sql = "UPDATE user SET user_mail = "."'".$mail."'"." WHERE user_name = "."'".$_SESSION['login']."'". ";";
            self::$bdd->query($sql);
            $_SESSION['user_mail'] = $mail;

            $sql = "UPDATE user SET access_lvl = 0 WHERE user_name = "."'".$_SESSION['login']."'". ";";
            self::$bdd->query($sql);

            $_SESSION['access_lvl'] = 0;

            $mail_token = md5(rand(0,1000));
            $sql = "UPDATE user SET verif_token = "."'".$mail_token."'"." WHERE user_name = "."'".$_SESSION['login']."'". ";";
            self::$bdd->query($sql);

            $subject = "Mail modification";
            $message = "
            
            Hello ".$_SESSION['login'].",
            you have successfully updated your mail address.
            
            
            -----------------------------
            Username: ".$_SESSION['login']."
            Former Mail Address: ".$oldmail."
            -----------------------------
    
            Please click this link to activate your account:
            http://localhost/?page=validation&user=".$_SESSION['login']."&token=".$mail_token."
            
            ";

            $this->sendInfoMail($mail, $subject, $message);
        }

        private function sendInfoMail($to, $subject, $message) {

            $headers = 'From:Noreply.camagru@gmail.com' . "\r\n"; // Set from headers

            echo "Before mail send ";
            if (mail($to, $subject, $message, $headers))
                echo " + + mail send";// Send our email;
            else
                echo " - - mail not send";
        }

    }

?>