<?php
/**
 * User: abbenham
 * Date: 17/01/2019
 * Time: 12:36
 */
?>

<link rel="stylesheet" href="/css/signpage.css"/>

<div class="login-page">
    <div class="form">
        <p class="titlelogin"> Login </p><br/>
        <form id="login-form" class="login-form" method="post">
            <input type="text" placeholder="Username" name="login"/>
            <input type="password" placeholder="Password" name="password"/>
            <button type="submit" name="submitlogin">login</button>
            <p class="message">Not registered? <a href="?page=landing&action=register">Create an account</a></p>
            <p class="passforgot"><a href="?page=forgot">Forgot Password ?</a></p>
        </form>
    </div>
</div>
<script src="/js/login.js"></script>
