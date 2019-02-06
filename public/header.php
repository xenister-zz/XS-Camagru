<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <link rel="stylesheet" href="/css/header.css"/>
    <meta charset="UTF-8">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #b2f0fd;">
    <a class="navbar-brand" href="#">Camagru</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="editorLink" href="#">Editor</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if(isset($_SESSION['login']) && ($_SESSION['access_lvl'] == 1))
                        echo $_SESSION['login'];
                    else
                        echo "User";
                        ?></a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
<!--            <li class="nav-item">-->
<!--                --><?php //if(isset($_SESSION['login']) && ($_SESSION['access_lvl'] == 1)) {
//                    echo("<a href=\"?page=logout\" class=\"nav-btn btn btn-danger btn-sm logout\" role=\"button\" aria-pressed=\"true\">Logout</a>");
//                } else {
//                    echo ("<a href=\"?page=landing\" class=\"nav-btn btn btn-primary btn-sm login\" role=\"button\" aria-pressed=\"true\">Login</a>");
//                } ?>
<!--            </li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
                <?php if(isset($_SESSION['login']) && ($_SESSION['access_lvl'] == 1)) {
                    echo("<a href=\"?page=logout\" class=\"btn btn-danger btn-sm\" role=\"button\" aria-pressed=\"true\">Log Out</a>");
                } else {
                    echo ("<a href=\"?page=landing\" class=\"btn btn-primary btn-sm\" role=\"button\" aria-pressed=\"true\">Log In</a>");
                } ?>
            </li>
        </ul>
    </div>
</nav>
<script src="/js/header.js"></script>
<!--<div class="fixed">-->
<!--<div class="topnav" id="topnav">-->
<!--    <a class="active" href="/">Camagru</a>-->
<!--    --><?php //if(isset($_SESSION['login']) && ($_SESSION['access_lvl'] == 1)) {
//        echo "<a href=\"?page=editor\">Add</a>";
//        echo "<div class=\"dropdown\">";
//            echo "<a class=\"dropdown-toggle\" href=\"#\" role=\"button\" id=\"dropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">".$_SESSION['login']."</a>";
//                echo "<div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuLink\">";
//                    echo "<a class=\"dropdown-item\" href=\"#\">Profil</a>";
//                    echo "<a class=\"dropdown-item\" href=\"#\">Setting</a>";
//                    echo "<a class=\"dropdown-item\" href=\"#\">Something else here</a>";
//                echo "</div>";
//        echo "</div>";
//    } ?>
<!--    <a href="?page=editor">Add</a>-->
<!--    <a href="?page=user">Profil</a>-->
<!--    <div class="icons">-->
<!--        <a href="javascript:void(0);" class="unroll" onclick="unroll()" ><i class="fa fa-bars"></i></a>-->
<!--        <a href="?page=logout" class="logout"><i class="fa fa-sign-out"></i></a>-->
<!--        --><?php //if(isset($_SESSION['login']) && ($_SESSION['access_lvl'] == 1)) {
//            echo("<a href=\"?page=logout\" class=\"logout\">Logout <i class=\"fa fa-sign-out\"></i></a>");
//        } else {
//            echo ("<a href=\"?page=landing\" class=\"login\">Login <i class=\"fa fa-sign-in\"></i></a>");
//        } ?>
<!--    </div>-->
<!--</div>-->
<!--</div>-->

