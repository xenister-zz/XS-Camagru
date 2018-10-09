<?php
/**
 * Created by PhpStorm.
 * User: susivagn
 * Date: 10/9/18
 * Time: 3:42 PM
 */

    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__.'/env.php');

    $host = 'mysql:host='.DB_HOST;
    $user = DB_USER;
    $pass = DB_PASSWD;
    $db_name = DB_NAME;

    echo $host."<br/>";
    echo $user."<br/>";
    echo $pass."<br/>";
//    echo $db_name."<br/>";


try {

        echo "START"."<br/>";

        $dbh = new PDO($host, $user, $pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "MID"."<br/>";

        $dbh->exec("DROP DATABASE IF EXISTS ".DB_NAME);

//        echo "first EXEC done"."<br/>";
//
//        $dbh->exec("use ".DB_NAME);

        echo "DONE!";

//        or die(print_r($dbh->errorInfo(), true));
//        foreach($dbh->query('SELECT * from FOO') as $row) {
//            print_r($row);
//        }
        $dbh = null;
    }   catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }


//$host = 'localhost';
//$username = 'root';
//$password = 'secret';
//try
//{
//    $conn = new PDO("mysql:host=$host", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "CREATE DATABASE IF NOT EXISTS teacher";
//    $conn->exec($sql);
//    $sql = "use teacher";
//    $conn->exec($sql);
//}
//catch(PDOException $e)
//{
//    echo "Error".$e->getMessage();
//}

?>