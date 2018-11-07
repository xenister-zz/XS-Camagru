<?php
/**
 * Created by PhpStorm.
 * User: phenicien
 * Date: 24/10/2018
 * Time: 12:09
 */

require_once('database_config.php');

class select extends Database
{
    public function __construct()
    {
        echo "A new select class instancied" . PHP_EOL;
    }

    public function From($needle, $table) {
        $selected = $this->dbh->query("SELECT ". $needle . " FROM " . $table . ";");
        print_r($selected);
    }
    public function Doo() {
        echo "Doooo = ";
        echo $this->host;
    }
}