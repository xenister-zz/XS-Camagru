<?php


require('/app/v1/mvc/model.php');

class Register extends Model {
    public function __construct()
    {
        parent::__construct();
    }

    private function randomId () {
        return (rand(0, 9999999));
    }

    public function addUser ($values) {
        $values['id'] = $this->randomId();
        $values['access_lvl'] = 0;
        $sql = "INSERT INTO `user` (user_id, user_name, user_mail, user_password, access_lvl) VALUES (" . $values['id'] . ", "  . $values['name'] . ", "  . $values['mail'] . ", "  . $values['password']  . ", "  . $values['access_lvl'] . ");";
        print_r(self::$bdd->exec($sql));
    }
}

?>