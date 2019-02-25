<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="application-name" content="&nbsp;"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/header.css">
</head>
<body>
<nav class="navbar is-info" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <strong>Camagru</strong>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
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
            <div class='navbar-item has-dropdown is-hoverable'>
                <a class='navbar-link'><i id='ntf-button' class='fas fa-bell'></i></a>
                <div id='notifications' class='navbar-dropdown is-right'>
                </div>
            </div>
            <div class="navbar-item">
                <div class="buttons">
                    <?php if(isset($_SESSION['login']) && ($_SESSION['access_lvl'] == 1)) {
                        echo("<a href=\"?page=logout\" class=\"button is-danger\"><i class='fas fa-sign-out-alt'></i></a>");
                    } else {
                        echo ("<a href=\"?page=landing\" class=\"button is-success\"><strong>Log in</strong></a>");
                    } ?>
                </div>
            </div>
            <div class="navbar-item">
                <button onclick="createNotification('Ceci est un test', 'Comment', 243523);">Test: add notifs</button>
            </div>
        </div>
    </div>
</nav>

<script src="/js/header.js"></script>
<script src="/js/notifications.js"></script>
