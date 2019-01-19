<?php

require('/app/config/env.php');
require('/app/mvc/model.php');

class Login extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function log($user) {

        echo "<script> console.log(\"---------\");</script>";

        echo "<script> console.log(\"".$user['login']."\");</script>";
        $sql = "SELECT * FROM `user` WHERE `user_name` LIKE " . $user['login'] . ";";
        $ret = self::$bdd->query($sql);
        $fetch = $ret->fetchAll();

        $tab = print_r($fetch);
        echo "<script> console.log(\"TAB\");</script>";
        echo "<script> console.log(\"".$tab."\");</script>";

        $login = str_replace("'", "", $user['login']);
        $pass = str_replace("'", "", $user['password']);
        $SALTED = DUSEL.$pass.DUSEL;
        $hpassword = hash('md5', $SALTED);
        echo "<script> console.log(\"THERE\");</script>";
        echo "<script> console.log(\"".$hpassword."\");</script>";

        if ($fetch[0]['user_name'] == $login && $fetch[0]['user_password'] == $hpassword){
            $_SESSION['login'] = $login;
            $_SESSION['access_lvl'] = $fetch[0]['access_lvl'];
            $_SESSION['user_id'] = $fetch[0]['user_id'];
            echo 'success';
            return 1;

        } else {
            return -1;
            echo "<script> console.log(\"-1\");</script>";
        }
        echo "<script> console.log(\"HEREE\");</script>";
        return -1;

    }
}
