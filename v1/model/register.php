<?php


require('/app/v1/mvc/model.php');

class Register extends Model {

    private function randomId () {
      //  return (random_int(0, 99999999));
    }

    public function addUser ($values) {
        echo 'ffffffff';
    //    $values['id'] = $this->randomId();
       // self::$bdd->exec("INSERT INTO `user` ('user_id', 'user_name', 'user_mail', 'user_password')
//VALUES (" . $values['id'] . ", "  . $values['name'] . ", "  . $values['mail'] . ", "  . $values['password'] . ");");
    }
}

?>