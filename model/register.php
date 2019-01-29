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

    private function addUser ($values) {

        //echo"<script>console.log('Login must be between 5 to 25 character !')</script>";

        $user_name = "'".$values['username']."'";
        $user_mail = "'".$values['email']."'";
        $SALTED = DUSEL.$values['password'].DUSEL;
        $hpassword = "'".hash('md5', $SALTED)."'";
        //echo $hpassword;
        $values['access_lvl'] = 0;
        $values['id'] = $this->randomId();
        if ($this->exists('user', 'user_name' ,$user_name)) {
            return 5;
        }
        if ($this->exists('user', 'user_mail' ,$user_mail))
            return 6;
        else {
            $values['verif_token'] = "'".md5(rand(0,1000))."'";
            $sql = "INSERT INTO `user` (user_id, user_name, user_mail, user_password, access_lvl, verif_token) VALUES (" . $values['id'] . ", ".$user_name.", ".$user_mail.", ".$hpassword.", " . $values['access_lvl'] . ", " . $values['verif_token'] .");";
            echo $sql;
            self::$bdd->exec($sql);

            $this->sendMail($values);
        }
        return 0;
    }

    private function sendMail ($info) {

        echo $info['email'];
        $to      = "xen.siva@gmail.com"; // Send email to our user
        $subject = 'Signup | Verification'; // Give the email a subject
        $message = "voilavoilaoivdoivdovidoidoifodif";
//        $message = '
//
//        Thanks for signing up!
//        Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
//
//        -----------------------------
//        Username: '.$info['username'].'
//        -----------------------------
//
//        Please click this link to activate your account:
//        http://192.168.99.100/?page=validation&user='.$info['username'].'&token='.$info['verif_token'].'
//
//        '; // Our message above including the link

        //$text = str_replace("\n.", "\n..", $message);
        $headers = 'From:noreply@kxcama.com' . "\r\n"; // Set from headers

        echo "Before mail send ";
        echo (mail($to, $subject, $message, $headers)); // Send our email


    }


}

?>