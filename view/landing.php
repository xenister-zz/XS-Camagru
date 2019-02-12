<?php
/**
 * User: abbenham
 * Date: 17/01/2019
 * Time: 12:36
 */
?>
<link rel="stylesheet" href="/css/signpage.css"/>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<!--<div class="login-page">-->
<!--    <div class="form">-->
<!--        <h1 class="titlelogin"> Login </h1><br/>-->
<!--        --><?php //if (isset($_GET['msg'])) {
//            echo "<div id = \"form-error\" class=\"alert alert-primary\" role = \"alert\" >";
//            echo $_GET['msg'];
//            echo "</div >";
//         }; ?>
<!--        <form id="login-form" class="login-form" method="post">-->
<!--            <input type="text" placeholder="Username" name="login"required />-->
<!--            <input type="password" placeholder="Password" name="password" required/>-->
<!--            <button type="submit" name="submit">login</button>-->
<!---->
<!--            <p class="message">Not registered? <a href="?page=landing&action=register">Create an account</a></p>-->
<!--            <p class="passforgot"><a href="?page=forgot">Forgot Password ?</a></p>-->
<!--        </form>-->
<!--    </div>-->
<!--</div>-->
<!--<script src="/js/login.js"></script>-->

<div class="card-content form">

    <form id="login-form" class="login-form" method="post">

        <h1 class="titlelogin"> Login </h1>
        <div class="field">
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="Username" name="login" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </div>
        </div>

        <div class="field">
            <p class="control has-icons-left">
                <input class="input" type="password" placeholder="Password" name="password" required>
                <span class="icon is-small is-left">
          <i class="fas fa-lock"></i>
        </span>
            </p>
        </div>

        <p class="help is-danger"><?php if (isset($_GET['msg'])) { echo $_GET['msg'];}?></p>

        </br>

        <div class="field">
            <div class="control has-text-centered">
                <button type="submit" name="submit" class="button is-link">Submit</button>
            </div>
        </div>

        </br>

        <p class="help is-info">Not registered? <a href="?page=landing&action=register"> Create an account !</a></p>
        <p class="passforgot"><a href="?page=forgot">Forgot Password ?</a></p>
    </form>

</div>


