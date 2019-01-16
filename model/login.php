<?php

/**
 * User: abbenham
 * Date: 13/01/2019
 * Time: 13:50
 */
require('/app/config/env.php');
require('/app/mvc/model.php');

class Login extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function log($user) {
        $sql = "SELECT * FROM `user` WHERE `user_name` LIKE " . $user['login'] . ";";
        $ret = self::$bdd->query($sql);
        $fetch = $ret->fetchAll();

        $login = str_replace("'", "", $user['login']);
        $SALTED = DUSEL.$user['password'].DUSEL;
        $hpassword = hash('md5', $SALTED);

        if ($fetch[0]['user_name'] == $login && $fetch[0]['user_password'] == $hpassword){
            $_SESSION['login'] = $login;
            $_SESSION['access_lvl'] = $fetch[0]['access_lvl'];
            $_SESSION['user_id'] = $fetch[0]['user_id'];
            echo 'success';
        } else {
            echo (-1);
        }
    }
}
