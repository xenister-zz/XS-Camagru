<?php
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><link rel="stylesheet" href="/css/signpage.css"/>




<div class="register-page">
    <div class="form">
        <h1 class="titleregister"> Register </h1><br/>
        <p class="headmessage"> All fields are mandatory</p><br/>
        <?php if (isset($_GET['msg'])) {
            echo "<div id = \"form-error\" class=\"alert alert-danger\" role = \"alert\" >";
            echo $_GET['msg'];
            echo "</div >";
        }; ?>
        <form method="post" id="register-form" class="register-form">
            <input type="text" placeholder="Login" name="userlogin" required/>
            <input type="password" placeholder="Password" name="password" required/>
            <input type="password" placeholder="Confirm password" name="confirm_password" required/>
            <input type="text" placeholder="Email address" name="usermail" required/>

            <button id="submit_register" type="submit" name="submit">create</button>
            <p class="message">Already registered? <a href="?page=landing">Sign In</a></p>
        </form>
    </div>
</div>
<script src="/js/register.js"></script>

