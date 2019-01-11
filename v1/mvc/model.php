<?php

 // User: abbenham
 // Date: 12/12/2018
 // Time: 14:16
require('/app/v1/config/env.php');

class Model
{
    public static $bdd;

    public function __construct() {
        try {
            self::$bdd = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USER, DB_PASSWD,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $exception) {
            echo "Instance PDO Error!: " . $exception->getMessage() . PHP_EOL;
            return (FALSE);
        }
    }
}

?>
