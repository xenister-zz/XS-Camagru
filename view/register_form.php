<?php
?>
<link rel="stylesheet" href="/css/signpage.css"/>


<div class="register-page">
    <div class="form">
        <p class="titleregister"> Register </p><br/>
        <p class="headmessage"> All fields are mandatory</p><br/>
        <form method="post" id="register-form" class="register-form">
            <input type="text" placeholder="Login" name="userlogin"/>
            <input type="password" placeholder="Password" name="password"/>
            <input type="password" placeholder="Confirm password" name="confirm_password"/>
            <input type="text" placeholder="Email address" name="usermail"/>

            <button type="submit" name="submit">create</button>
            <p class="message">Already registered? <a href="?page=login_form">Sign In</a></p>
        </form>
    </div>
</div>
<script src="/js/register.js"></script>

