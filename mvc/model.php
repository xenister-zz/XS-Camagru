<?php

require('/app/config/database.php');

class Model
{
    public static $bdd;

//    public function _e($string) {
//        echo htmlspecialchars($string, ENT_QUOTES, )
//    }

    public function __construct() {
        try {
            self::$bdd = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USER, DB_PASSWD,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $exception) {
            echo "Instance PDO Error!: " . $exception->getMessage() . PHP_EOL;
            return (FALSE);
        }
    }

    public function randomId () {
        return (rand(0, 9999999));
    }

    public function exists($table, $column, $needle)
    {
        $sql = "SELECT * FROM `" . $table . "` WHERE `" . $column . "` LIKE " . $needle . ";";
        $ret = self::$bdd->query($sql);
        if (!$ret->fetchAll()[0]) {
            return false;
        } else {
            return true;
        }
    }

    public function getUserId ($user) {
        $sql = "SELECT user_id FROM `user` WHERE user_name LIKE '" . $user . "'";
        $userId = self::$bdd->query($sql)->fetchColumn(0);
        return $userId;
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

?>
