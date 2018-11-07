<!-- all database access and init will be in this file -->

<?php

    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__.'/env.php');

    class Database
    {
        private $host = 'mysql:host='.DB_HOST;
        private $dbh;

        public function connect_Db()
        {
            echo "START DB CONNECT" . PHP_EOL;

            try {
                $this->dbh = new PDO($this->host, DB_USER, DB_PASSWD);
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur !: " . $e->getMessage() . PHP_EOL;
                return (FALSE);
            }
            echo "END DB CONNECT" . "PHP_EOL";
            return ($this->dbh);
        }

        public function close_Connexion()
        {
            $this->dbh = NULL;
        }

        public function create_Db()
        {
            if (!$this->dbh && $this->connect_Db() == FALSE)
                return (FALSE);
            try {
                $this->dbh->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . PHP_EOL;
                $this->close_Connexion();
                return (FALSE);
            }
            echo "END DB CREATE" . PHP_EOL;
            $this->close_Connexion();
            return (TRUE);
        }

        public function drop_Db()
        {
            echo "IN DB DROP" . PHP_EOL;

            if (!$this->dbh && $this->connect_Db() == FALSE)
                return (FALSE);

            echo "IN DB DROP" . PHP_EOL;

            try {
                $this->dbh->exec("DROP DATABASE IF EXISTS ".DB_NAME);
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . PHP_EOL;
                $this->close_Connexion();
                return (FALSE);
            }

            $this->close_Connexion();
            return (TRUE);
        }
    }

?>
