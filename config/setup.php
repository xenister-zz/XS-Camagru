<?php

require('/database.php');

try {
    $bdd = new PDO('mysql:host=localhost;dbname=' . DB_NAME, DB_USER, DB_PASSWD,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $bdd->exec(file_get_contents('/bdd.sql', true));

} catch (PDOException $exception) {
    echo "Instance PDO Error!: " . $exception->getMessage() . PHP_EOL;
    return (FALSE);
}

