<?php


require('/app/mvc/model.php');

class Register extends Model {



    public function __construct()
    {
        parent::__construct();
    }

    public function registerUser ($value) {

        $errors = array();

        if (empty($value['userlogin']))
            array_push($errors, "User name is required");
        if (empty($value['password']))
            array_push($errors, "Password is required");
        if (empty($value['confirm_password']))
            array_push($errors, "Password confirmation is required");
        if (empty($value['usermail']))
            array_push($errors, "Email is required");
        if ($value['password'] != $value['confirm_password'])
            array_push($value, "The password confirmation must match your password");

        if (count($errors) == 0)
            $errors = $this->addUser($value);
        else {
            $errors['errors'] = 1;
        }
        return ($errors);
    }

    public function addUser ($values) {

        print_r($values);
        $errors = array();
        $hpassword = "'".md5($values['password'])."'";
        $values['access_lvl'] = 0;
        $values['id'] = $this->randomId();
        if ($this->exists('user', 'user_name' ,$values['username']))
            array_push($errors, "User name already exists");
        if ($this->exists('user', 'user_mail' ,$values['email']))
            array_push($errors, "Email already exists");
        else {
            $sql = "INSERT INTO `user` (user_id, user_name, user_mail, user_password, access_lvl) VALUES (" . $values['id'] . ", " . $values['username'] . ", " . $values['email'] . ", " . $hpassword . ", " . $values['access_lvl'] . ");";
            echo $sql;
            self::$bdd->exec($sql);
        }
    }

    private function verifMail ($info) {

    }
}

?>