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
            echo "START DB CONNECT" . "<br/>";

            try {
                $this->dbh = new PDO($this->host, DB_USER, DB_PASSWD);
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur !: " . $e->getMessage() . "<br/>";
                return (FALSE);
            }
            echo "END DB CONNECT" . "<br/>";
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
                print "Erreur !: " . $e->getMessage() . "<br/>";
                $this->close_Connexion();
                return (FALSE);
            }
            echo "END DB CREATE" . "<br/>";
            $this->close_Connexion();
            return (TRUE);
        }

        public function drop_Db()
        {
            echo "IN DB DROP" . "<br/>";

            if (!$this->dbh && $this->connect_Db() == FALSE)
                return (FALSE);

            echo "IN DB DROP 22222" . "<br/>";

            try {
                $this->dbh->exec("DROP DATABASE IF EXISTS ".DB_NAME);
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                $this->close_Connexion();
                return (FALSE);
            }

            $this->close_Connexion();
            return (TRUE);
        }
    }

?>
