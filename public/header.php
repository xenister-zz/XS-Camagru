<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <meta name="application-name" content="&nbsp;"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<body>
<nav class="navbar is-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <strong>Camagru</strong>
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/">
                Home
            </a>
            <?php if(isset($_SESSION['login']) && ($_SESSION['access_lvl'] >= 1)) {
                echo "<a class=\"navbar-item\" href=\"/?page=editor\">Add</a>";
                echo "<div class=\"navbar-item has-dropdown is-hoverable\">
                <a class=\"navbar-link\">" . $_SESSION['login'] . "</a>";
                echo "<div class=\"navbar-dropdown\">
                    <a class=\"navbar-item\" href=\"/?page=user\">
                        Profil
                    </a>
                    <a class=\"navbar-item\" href=\"/?page=setting\">
                        Setting
                    </a>
                    <hr class=\"navbar-divider\">
                    <a class=\"navbar-item\">
                        Report an issue
                    </a>
                </div>
            </div>";
            } ?>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <?php if(isset($_SESSION['login']) && ($_SESSION['access_lvl'] == 1)) {
                        echo("<a href=\"?page=logout\" class=\"button is-danger\"><strong>Log out</strong></a>");
                    } else {
                        echo ("<a href=\"?page=landing\" class=\"button is-success\"><strong>Log in</strong></a>");
                    } ?>
                </div>
            </div>
        </div>
    </div>
</nav>