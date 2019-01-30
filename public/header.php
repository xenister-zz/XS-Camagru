<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="mstile-310x310.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/signpage.css"/>
    <link rel="stylesheet" href="/css/screen.css"/>
    <link rel="stylesheet" href="/css/header.css"/>
    <meta charset="UTF-8">
</head>
<body>
<div class="fixed">
<div class="topnav" id="topnav">
    <a class="active" href="/">Camagru</a>
    <?php if(isset($_SESSION['login'])) {
        echo "<a href=\"?page=editor\">Add</a>";
        echo "<a href=\"?page=user\">".$_SESSION['login']."</a>";
    } ?>
<!--    <a href="?page=editor">Add</a>-->
<!--    <a href="?page=user">Profil</a>-->
    <div class="icons">
<!--        <a href="javascript:void(0);" class="unroll" onclick="unroll()" ><i class="fa fa-bars"></i></a>-->
<!--        <a href="?page=logout" class="logout"><i class="fa fa-sign-out"></i></a>-->
        <?php if(isset($_SESSION['login']) && ($_SESSION['access_lvl'] == 1)) {
            echo("<a href=\"?page=logout\" class=\"logout\">Logout <i class=\"fa fa-sign-out\"></i></a>");
        } else {
            echo ("<a href=\"?page=landing\" class=\"login\">Login <i class=\"fa fa-sign-in\"></i></a>");
        } ?>
    </div>
</div>
</div>

<script>
    function unroll() {
        let menu = document.getElementById('topnav');
        if (menu.className === 'topnav') {
            menu.className += ' responsive';
        } else {
            menu.className = 'topnav';
        }

    }
</script>
