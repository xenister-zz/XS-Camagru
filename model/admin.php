<?php

require(__ROOT__ . 'mvc/model.php');

class admin extends Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function createTables($filename = __ROOT__.'/config/bdd.sql') {
        $tables = file_get_contents($filename);
        try {
            self::$bdd->exec($tables);
        } catch (PDOException $exception) {
            echo "Create tables Error:" . $exception->getMessage();
        }
    }
}