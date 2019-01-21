<?php

require('/app/config/env.php');
require('/app/mvc/model.php');

class Register extends Model {



    public function __construct()
    {
        parent::__construct();
    }

    public function registerUser ($value) {

        if (empty($value['username']) | (strlen($value['username']) < 5 | strlen($value['username']) > 25))
            return 1;
        if (empty($value['password']) | (strlen($value['password']) < 8 | strlen($value['password']) > 25))
            return 2;
        if ($value['password'] != $value['confirmpassword'])
            return 3;
        if (empty($value['email']) | !filter_var($value['email'], FILTER_VALIDATE_EMAIL))
            return 4;

        $errors = $this->addUser($value);
        return ($errors);
    }

    public function addUser ($values) {

        $user_name = "'".$values['username']."'";
        $user_mail = "'".$values['email']."'";
        $SALTED = DUSEL.$values['password'].DUSEL;
        $hpassword = "'".hash('md5', $SALTED)."'";
        echo $hpassword;
        $values['access_lvl'] = 0;
        $values['id'] = $this->randomId();
        if ($this->exists('user', 'user_name' ,$user_name)) {
            echo "<script>console.log(\"tatata888tatat\")</script>>";
            return 5;
        }
        if ($this->exists('user', 'user_mail' ,$user_mail))
            return 6;
        else {
            $sql = "INSERT INTO `user` (user_id, user_name, user_mail, user_password, access_lvl) VALUES (" . $values['id'] . ", ".$user_name.", ".$user_mail.", ".$hpassword.", " . $values['access_lvl'] . ");";
            echo $sql;
            self::$bdd->exec($sql);
        }
    }

    private function verifMail ($info) {

    }
}

?>