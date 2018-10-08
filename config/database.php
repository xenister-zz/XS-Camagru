<!-- all database access and init will be in this file -->

<?php

    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__.'/env.php');

    echo DB_HOST . "\n";

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME, 8080);
    if ($mysqli->connect_errno)
    {
        echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo $mysqli->host_info . "\n";

    if (!$mysqli->query("DROP TABLE IF EXISTS account") ||
        !$mysqli->query("CREATE TABLE account(user_id INT NOT NULL PRIMARY KEY,
                                                     user_name VARCHAR(".ACCOUNTS_MAX_SIZE_NAME."),
                                                     user_surname VARCHAR(".ACCOUNTS_MAX_SIZE_SURNAME."),
                                                     user_email VARCHAR(".ACCOUNTS_MAX_SIZE_EMAIL."),
                                                     user_password VARCHAR(".ACCOUNTS_MAX_SIZE_PASSWD."),
                                                     user_timestamp TIMESTAMP,
                                                     access_lvl INT,
                                                     user_bio TEXT)"))
    {
        echo "Echec lors de la création de la table account: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if (!$mysqli->query("DROP TABLE IF EXISTS imgpost") ||
        !$mysqli->query("CREATE TABLE imgpost(img_id INT NOT NULL PRIMARY KEY,
                                                     img_user_id INT NOT NULL,
                                                     like_num INT NOT NULL,
                                                     com_num INT NOT NULL,
                                                     img_timestamp TIMESTAMP)"))
    {
        echo "Echec lors de la création de la table image: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    if(!$mysqli->query("DROP TABLE IF EXISTS compost") ||
       !$mysqli->query("CREATE TABLE compost(com_id INT NOT NULL PRIMARY KEY,
                                                    com_img_id INT NOT NULL,
                                                    com_user_id INT NOT NULL,
                                                    img_timestamp TIMESTAMP)"))
    {
        echo "Echec lors de la création de la table comment: (" . $mysqli->errno . ") " . $mysqli->error;
    }

    echo "ALL DONE";

    $mysqli->close();

?>
