<?php
/**
 * Created by PhpStorm.
 * User: susivagn
 * Date: 10/17/18
 * Time: 4:03 PM
 */

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/env.php');
require_once(__ROOT__.'/config/database_config.php');
require_once(__ROOT__.'/config/user_config.php');

    class Tablebase
    {
        private $dbh;
        private $tables = [
            "user" => "CREATE TABLE IF NOT EXISTS user(
                    user_id INT NOT NULL PRIMARY KEY,
                    user_name VARCHAR(" . ACCOUNTS_MAX_SIZE_NAME . "),
                    user_surname VARCHAR(" . ACCOUNTS_MAX_SIZE_SURNAME . "),
                    user_mail VARCHAR(" . ACCOUNTS_MAX_SIZE_EMAIL . "),
                    user_password VARCHAR(". ACCOUNTS_MAX_SIZE_PASSWD . "),
                    user_timestamp TIMESTAMP,
                    access_lvl INT NOT NULL,
                    user_bio VARCHAR(256))",

            "image" => "CREATE TABLE IF NOT EXISTS image(
                    img_id INT NOT NULL PRIMARY KEY,
                    user_id INT NOT NULL,
                    like_num INT,
                    com_num INT,
                    com_timestamp TIMESTAMP)",

            "comment" => "CREATE TABLE IF NOT EXISTS comment(
                    com_id INT NOT NULL PRIMARY KEY,
                    com_img_id INT NOT NULL,
                    com_usr_id INT NOT NULL,
                    com_timestamp TIMESTAMP)"
        ];

        public function __construct()
        {
            $sql = 'USE '.DB_NAME;

            if (!$this->dbh) {
                $this->dbh = new Database();
                $this->dbh = $this->dbh->connect_Db();
            }

            try {
                $this->dbh->query($sql);
            } catch (PDOException $e) {
                throw new Exception('Tablebase \'__construct\' Exception : '. $e->getMessage() . '<br/>');
            }
        }

        public function __destruct()
        {
            if ($this->dbh)
            {
                $this->dbh->close_Connexion();
            }
        }

        public  function create_Tables() {
            foreach ($this->tables as $key => $value) {
                // echo "key ===>" . $key . ' ' . $value .  "<br/>";
                $this->create($value, $key);
            }

        }

        private function create($sql, $key)
        {
            try {
                $this->dbh->query($sql);
            } catch (PDOException $e) {
                throw new Exception('Tablebase \'create_Table\' Exception in ' . $key . ' : '. $e->getMessage() . '<br/>');
                return (FALSE);
            }
            return (TRUE);
        }

    }