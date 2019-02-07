<?php
/**
 * User: abbenham
 * Date: 17/01/2019
 * Time: 12:36
 */
?>
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">-->

<link rel="stylesheet" href="/css/signpage.css"/>

<div class="login-page">
    <div class="form">
        <h1 class="titlelogin"> Login </h1><br/>
        <?php if (isset($_GET['msg'])) {
            echo "<div id = \"form-error\" class=\"alert alert-primary\" role = \"alert\" >";
            echo $_GET['msg'];
            echo "</div >";
         }; ?>
        <form id="login-form" class="login-form" method="post">
            <input type="text" placeholder="Username" name="login"required />
            <input type="password" placeholder="Password" name="password" required/>
            <button type="submit" name="submit">login</button>

            <p class="message">Not registered? <a href="?page=landing&action=register">Create an account</a></p>
            <p class="passforgot"><a href="?page=forgot">Forgot Password ?</a></p>
        </form>
    </div>
</div>
<script src="/js/login.js"></script>
