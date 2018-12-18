<?php
/**
 * User: abbenham
 * Date: 12/12/2018
 * Time: 14:16
 */

class Model
{
    private static $bdd;

    public function __construct() {

        try {
            self::$bdd = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USER, DB_PASSWD,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $exception) {
            echo "Instance PDO Error!: " . $exception->getMessage() . PHP_EOL;
            return (FALSE);
        }
    }

    public function createTables($filename = __ROOT__.'/config/bdd.sql') {
        $tables = file_get_contents($filename);
        try {
            $qr = self::$bdd->exec($tables);
        } catch (PDOException $exception) {
            echo "Create tables Error:" . $exception->getMessage();
        }
    }
}
