<?php
?>
<link rel="stylesheet" href="/css/signpage.css"/>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>

<div class="card-content form">
    <h1 class="titlelogin"> Register </h1>
    <form id="login-form" class="login-form" method="post">
        <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="5 to 25 caracters" name="username" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
            </div>
            <p class="help is-danger"><?php if (isset($_GET['info']) && ($_GET['info'] == "username")) { echo $_GET['msg'];}?></p>
        </div>

        <div class="field">
            <label class="label">Password</label>
            <p class="control has-icons-left">
                <input class="input is-success" type="password" placeholder="8 to 25 caracters" name="password" required>
                <span class="icon is-small is-left">
          <i class="fas fa-lock"></i>
        </span>
            </p>
        </div>

        <div class="field">
            <p class="control has-icons-left">
                <input class="input is-success" type="password" placeholder="Confirm Password" name="confirm_password" required>
                <span class="icon is-small is-left">
          <i class="fas fa-lock"></i>
        </span>
            </p>
            <p class="help is-danger"><?php if (isset($_GET['info']) && ($_GET['info'] == "password")) { echo $_GET['msg'];}?></p>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="email" placeholder="Enter a valid Email" name="usermail" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>

            </div>
            <p class="help is-danger"><?php if (isset($_GET['info']) && ($_GET['info'] == "mail")) { echo $_GET['msg'];}?></p>
        </div>

        <div class="field">
            <div class="control has-text-centered">
                <button type="submit" name="submit" class="button is-link">Submit</button>
            </div>
        </div>

    </form>

</div>
<!--<script src="/js/register.js"></script>-->

