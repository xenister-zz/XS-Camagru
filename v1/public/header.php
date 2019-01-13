<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/v1/css/screen.css"/>
    <meta charset="UTF-8">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Camagru</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <button class="btn" type="submit" onclick="location.assign('?page=editor')">Add</button>
            </li>
            <li class="nav-item">
                <button class="btn" type="submit" onclick="logWhat('<?php
                if (!isset($_SESSION['login'])) {echo '?page=login_form';} else {echo '?page=logout';}
                ?>')"><?php
                if (!isset($_SESSION['login'])) {echo 'Login';} else {echo 'Logout';}
                ?></button>
            </li>
            <li>
                <p><?php echo $_SESSION['login'];?></p>
            </li>
        </ul>
    </div>
</nav>

<script>
    function logWhat (val) {
        location.assign(val);
    }
</script>
