<?php


require('/app/mvc/model.php');
require('/app/config/env.php');


class Register extends Model {



    public function __construct()
    {
        parent::__construct();
    }

    public function registerUser ($value) {

        $errors = array();

        if (empty($value['username']) | (strlen($value['username']) < 5 | strlen($value['username']) > 15))
            array_push($errors, "User name is Mandatory and must be beetween 5 to 15 caracters");
        if (empty($value['password']) | (strlen($value['password']) < 8 | strlen($value['password']) > 40))
            array_push($errors, "Password is Mandatory and must be beetween 8 to 40 caracters");
        if ($value['password'] != $value['confirmpassword'])
            array_push($errors, "Password confirmation is required and must match your password");
        if (filter_var($value['email'], FILTER_VALIDATE_EMAIL))
            array_push($errors, "Email is required in a valid format");

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
        $SALTED = DUSEL.$values['password'].DUSEL;
        $hpassword = "'".hash('md5', $SALTED)."'";
        echo $hpassword;
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