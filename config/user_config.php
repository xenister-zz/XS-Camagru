<?php
/**
 * Created by PhpStorm.
 * User: susivagn
 * Date: 10/12/18
 * Time: 3:13 PM
 */

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/env.php');

class User
{

    public function register($data)
    {

    }

    public function get_User($user_id)
    {

    }

    public function remove_User($user_id)
    {

    }

    public function modify_User($user_id)
    {

    }
}

class User_log
{
    public $user_name_email_fail = "Enter a valid User Name or Email !";
    public $password_fail = "Enter a valid password !";


    public function login($user_name, $user_email, $password)
    {

        if (!$user_name || !$user_email)
            return ($this->user_name_email_fail);
        if (!$password)
            return ($this->password_fail);

    }

    public function logout()
    {

    }
}

?>