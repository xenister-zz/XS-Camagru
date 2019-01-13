<?php


require('/app/mvc/model.php');

class Register extends Model {
    public function __construct()
    {
        parent::__construct();
    }


    public function addUser ($values) {
        $values['access_lvl'] = 0;
        $values['id'] = $this->randomId();
        while ($this->exists('user', 'user_id' ,$values['id'])) {
            $values['id'] = $this->randomId();
        }
        if ($this->exists('user', 'user_name' ,$values['name']) ||
            $this->exists('user', 'user_mail' ,$values['mail'])) {
            echo 'User or email already exists';
        } else {
            $sql = "INSERT INTO `user` (user_id, user_name, user_mail, user_password, access_lvl) VALUES (" . $values['id'] . ", "  . $values['name'] . ", "  . $values['mail'] . ", "  . $values['password']  . ", "  . $values['access_lvl'] . ");";
            self::$bdd->exec($sql);
        }
    }
}

?>