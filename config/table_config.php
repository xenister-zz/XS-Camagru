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

        public function __construct()
        {
            if (!$this->dbh) {
                $this->dbh = new Database();
                $this->dbh = $this->dbh->connect_Db();
            }
        }

        public function __destruct()
        {
            // TODO: Implement __destruct() method.
            if ($this->dbh)
            {
                $this->dbh->close_Connexion();
            }
        }

        public function create_User_Table()
        {
            $sql = 'CREATE TABLE IF NOT EXISTS user(
                    user_id INT NOT NULL PRIMARY KEY,
                    user_name VARCHAR,
                    user_surname VARCHAR,
                    user_mail VARCHAR,
                    user_password VARCHAR,
                    user_timestamp TIMESTAMP,
                    access_lvl INT NOT NULL,
                    user_bio TEXT)';

            $this->dbh = new Database();
            $this->dbh = $this->dbh->connect_Db();
            $this->dbh->query($sql);

        }

        public function create_Image_Table()
        {
            $sql = 'CREATE TABLE IF NOT EXISTS user(
                    img_id INT NOT NULL PRIMARY KEY,
                    user_id INT NOT NULL,
                    like_num INT,
                    com_num INT,
                    com_timestamp TIMESTAMP)';

        }

        public function create_comment_Table()
        {
            $sql = 'CREATE TABLE IF NOT EXISTS user(
                    com_id INT NOT NULL PRIMARY KEY,
                    com_img_id INT NOT NULL,
                    com_usr_id INT NOT NULL,
                    com_timestamp TIMESTAMP)';

        }
    }