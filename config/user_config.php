<?php
/**
 * Created by PhpStorm.
 * User: susivagn
 * Date: 10/12/18
 * Time: 3:13 PM
 */

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/env.php');
require_once(__ROOT__.'/config/database_config.php');
require_once(__ROOT__.'/config/user_config.php');
require_once(__ROOT__.'/config/table_config.php');

class User
{
    public $filling_error = "Siouplai fill all blank space in the form !";

    public function register($data = array())
    {
        if (!$data || !$data->username || !$data->usermail || !$data->userpass)
            return ($this->filling_error);

    }

    public function get_User($user_id = '', $user_name = '', $user_mail = '')
    {
        if (!$user_id && !$user_name && !$user_mail)
            return (FALSE);



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


    public function login($user_name_mail, $password, $keep_log)
    {

        if (!$user_name_mail)
            return ($this->user_name_email_fail);
        if (!$password)
            return ($this->password_fail);
        if ($keep_log)
            null;




    }

    public function logout()
    {

    }
}

?>