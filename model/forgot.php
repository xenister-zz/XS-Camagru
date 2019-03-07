<?php

require('/app/config/env.php');
require('/app/mvc/model.php');

class Forgot extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mailCheck($mail) {

        if (empty($mail) | !filter_var($mail, FILTER_VALIDATE_EMAIL))
            return false;
        else
            return $this->passReset($mail);

    }

    private function passReset($mail) {


        if (!$this->exists('user', 'user_mail' , "'".$mail."'"))
            return false;


        $newPass = $this->generateRandomString();

        $SALTED = DUSEL.$newPass.DUSEL;
        $hpassword = "'".hash('md5', $SALTED)."'";
        echo $hpassword;

        $sql = "SELECT * FROM `user` WHERE `user_mail` LIKE " . "'".$mail."'" . ";";
        $ret = self::$bdd->query($sql);
        $fetch = $ret->fetchAll();

        echo "titititititi";

        $sql = "UPDATE user SET user_password = ".$hpassword." WHERE user_mail = "."'".$mail."'". ";";
        self::$bdd->query($sql);
        echo "tototototo";


        $subject = "Password reset";
        $message = "
            
            Hello ".$fetch[0]['user_name'].",
            you have successfully reset your password.
            
            
            -------------------------------------------
            Username: ".$fetch[0]['user_name']."
            New password: ".$newPass."
            -------------------------------------------
            
    
            After login to your account with the given new password update it in your profil page.
            
            ";

        $this->sendResetMail($mail, $subject, $message);

        echo "tatatatatata";
        return true;
    }

    private function sendResetMail($to, $subject, $message) {

        $headers = 'From:Noreply.camagru@gmail.com' . "\r\n"; // Set from headers

        echo "Before mail send ";
        if (mail($to, $subject, $message, $headers))
            echo " + + mail send";// Send our email;
        else
            echo " - - mail not send";
    }
}

?>