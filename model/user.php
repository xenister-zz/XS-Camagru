<?php

    require('/app/config/env.php');
    require('/app/mvc/model.php');

    class User extends Model {

        public static $error = 0;

        public function __construct()
        {
            parent::__construct();
        }

        public function checkEditProfil($value) {

            if ($this->checkMasterPass($value['master_pass'])) {
                if (!empty($value['username']) && $this->updateUsername($value['username']))
                    return self::$error;
                if (!empty($value['password']))
                    return $this->updatePassword($value['password'], $value['confirmpassword']);
                if (empty($value['email']) | !filter_var($value['email'], FILTER_VALIDATE_EMAIL))
                    return 4;
            }
        }

        private function checkMasterPass($value) {

            if (empty($value) | (strlen($value) < 8 | strlen($value) > 25)) {
                self::$error = 7;
                return self::$error;
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
                return self::$error;
            }

            if ($this->exists('user', 'user_name' , "'".$username."'")) {
                self::$error = 5;
                return self::$error;
            }

            $sql = "SELECT * FROM `user` WHERE `user_name` LIKE " . "'".$_SESSION['login']."'" . ";";
            $ret = self::$bdd->query($sql);
            $fetch = $ret->fetchAll();

            $pass = $value['master_pass'];
            $SALTED = DUSEL.$pass.DUSEL;
            $hpassword = hash('md5', $SALTED);


        }

        private function updatePassword($password, $confirm_pass) {

            if (strlen($password) < 8 | strlen($password) > 25) {
                self::$error = 2;
                return self::$error;
            }

            if ($password != $confirm_pass) {
                self::$error = 3;
                return self::$error;
            }

            $sql = "SELECT * FROM `user` WHERE `user_name` LIKE " . "'".$_SESSION['login']."'" . ";";
            $ret = self::$bdd->query($sql);
            $fetch = $ret->fetchAll();

            $SALTED = DUSEL.$password.DUSEL;
            $hpassword = hash('md5', $SALTED);


        }

        private function updateEmail($mail) {

            if (strlen($mail) < 5 | strlen($mail) > 25)
                return false;

            if ($this->exists('user', 'user_mail' , "'".$mail."'"))
                return 6;

            $sql = "SELECT * FROM `user` WHERE `user_name` LIKE " . "'".$_SESSION['login']."'" . ";";
            $ret = self::$bdd->query($sql);
            $fetch = $ret->fetchAll();

            $pass = $value['master_pass'];
            $SALTED = DUSEL.$pass.DUSEL;
            $hpassword = hash('md5', $SALTED);


        }

    }

?>