<?php
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><link rel="stylesheet" href="/css/signpage.css"/>

<!--<div class="register-page">-->
<!--    <div class="form">-->
<!--        <h1 class="titleregister"> Register </h1><br/>-->
<!--        <p class="headmessage"> All fields are mandatory</p><br/>-->
<!--        --><?php //if (isset($_GET['msg'])) {
//            echo "<div id = \"form-error\" class=\"alert alert-danger\" role = \"alert\" >";
//            echo $_GET['msg'];
//            echo "</div >";
//        }; ?>
<!--        <form method="post" id="register-form" class="register-form">-->
<!--            <input type="text" placeholder="Login" name="userlogin" required/>-->
<!--            <input type="password" placeholder="Password" name="password" required/>-->
<!--            <input type="password" placeholder="Confirm password" name="confirm_password" required/>-->
<!--            <input type="text" placeholder="Email address" name="usermail" required/>-->
<!---->
<!--            <button id="submit_register" type="submit" name="submit">create</button>-->
<!--            <p class="message">Already registered? <a href="?page=landing">Sign In</a></p>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->

<div class="card-content form">

    <h1 class="titlelogin"> Register </h1>

    <form id="login-form" class="login-form" method="post">
        <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="5 to 25 caracters" name="login"required>
                <span class="icon is-small is-left">
          <i class="fas fa-user"></i>
        </span>
                <span class="icon is-small is-right">
          <i class="fas fa-check"></i>
        </span>
            </div>
            <p class="help is-danger"><?php if (isset($_GET['info']) && ($_GET['info'] == "username")) { echo $_GET['msg'];}?></p>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <p class="control has-icons-left">
                <input class="input" type="password" placeholder="8 to 25 caracters">
                <span class="icon is-small is-left">
          <i class="fas fa-lock"></i>
        </span>
            </p>
        </div>

        <div class="field">
            <p class="control has-icons-left">
                <input class="input" type="password" placeholder="Confirm Password">
                <span class="icon is-small is-left">
          <i class="fas fa-lock"></i>
        </span>
            </p>
            <p class="help is-danger"><?php if (isset($_GET['info']) && ($_GET['info'] == "password")) { echo $_GET['msg'];}?></p>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-danger" type="email" placeholder="Enter a valid Email">
                <span class="icon is-small is-left">
          <i class="fas fa-envelope"></i>
        </span>
                <span class="icon is-small is-right">
          <i class="fas fa-exclamation-triangle"></i>
        </span>
            </div>
            <p class="help is-danger"><?php if (isset($_GET['info']) && ($_GET['info'] == "mail")) { echo $_GET['msg'];}?></p>
        </div>

        <div class="field">
            <div class="control has-text-centered">
                <button type="submit" name="submit" class="button is-link">Submit</button>
            </div>
        </div>

        <p class="help is-info">Not registered? <a href="?page=landing&action=register">Create an account</a></p>
        <p class="passforgot"><a href="?page=forgot">Forgot Password ?</a></p>
    </form>

</div>
<script src="/js/register.js"></script>

